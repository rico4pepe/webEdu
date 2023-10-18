<?php
require_once("../PhpConnections/connection.php");
require_once("../utilites/ValidateMail.php");
require_once("../utilites/Sanitize.php");
require_once("AuditLog.php");


//Think of solving url issues


class Staff
{
    function insertUser($sUniqueId, $first_name, $last_name, 
    $phone_No, $address, $staff_role, $targetFile, $email, $pass, 
    $sex, $degree, $annex_id, $discipline,   $degree_date)
    {
        $conn = connect();

        $created_At = date("Y-m-d H:i:s");
        $modified_At = date("Y-m-d H:i:s");
        $Is_Deleted = 0;
        $check_email_exist = "SELECT Email from staff_db where Email = :em";
        $check_email_exist_query = $conn->prepare($check_email_exist);
        $check_email_exist_query->bindValue(":em", $email);
        $check_email_exist_query->execute();
        $num_rows1 = $check_email_exist_query->rowCount();
        if($num_rows1  > 0){
            $msg = "Email already exist.";
            $msgType = "warning";
  
            ?>
          <div class="alert alert-<?php echo $msgType; ?> alert-dismissible fade show" role="alert">
                      <?php echo $msg; ?>
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
  
         <?php
        }else{

        


        $sql = "INSERT INTO `staff_db` (`staff_uniqueKey`,`First_Name`, `Sur_Name`, `phone_number`, `Address`, `role`, `imageUrl`,`Email`,  `password`,  `sex`, `degree`, `annex_id`,  `discipline`,  `degree_date` ) VALUES " . "( :suiq, :fname, :lname, :pnum, :add, :stf_role, :img_url, :email, :pass, :sx, :dg, :ai, :disc, :ddate)";

        try {
            //code...
            $stmt = $conn->prepare($sql); 
        $stmt->bindValue(":fname", $first_name);
        $stmt->bindValue(":lname", $last_name);
        $stmt->bindValue(":pnum", $phone_No);

        $stmt->bindValue(":add", $address);
        $stmt->bindValue(":stf_role", $staff_role);
        $stmt->bindValue(":img_url", $targetFile);
        $stmt->bindValue(":email", $email);
         

        //Password Hashing 
        $stmt->bindValue(":pass", $pass);
        //End Password Hashing

        $stmt->bindValue(":sx", $sex);
        $stmt->bindValue(":dg", $degree);
        $stmt->bindValue(":ai", $annex_id);
        $stmt->bindValue(":disc", $discipline);
        $stmt->bindValue(":suiq", $sUniqueId);
        $stmt->bindValue(":ddate", $degree_date);
      

        $stmt->execute();

        $num_rows = $stmt->rowCount();
        if ($num_rows  > 0) {
            $sql = "INSERT INTO `staff_degree` (`staff_uniqueKey`, `qualification`, `degree_date`) VALUES " . "( :sid, :ql, :dd)";
            $stmt = $conn->prepare($sql); 
            $stmt->bindValue(":sid", $sUniqueId);
            $stmt->bindValue(":ql", $degree);
            $stmt->bindValue(":dd", $degree_date);
            $stmt->execute();
            $num_rows2 = $stmt->rowCount();
            if($num_rows2 > 0){
            
            $msg = "Staff has been registered.";
          $msgType = "success";

          ?>
        <div class="alert alert-<?php echo $msgType; ?> alert-dismissible fade show" role="alert">
                    <?php echo $msg; ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>

       <?php   
        }}else {
            $msg = "Staff was not succesfully registered";
            $msgType = "warning";
            ?>
             <div class="alert alert-<?php echo $msgType; ?> alert-dismissible fade show" role="alert">
                    <?php echo $msg; ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
         <?php   
          }

       
        } catch (Exception $ex) {
            //throw $th;
            echo $ex->getMessage();
        }
    }
}


    function dropdownFacilitator(){
        $conn = connect();
        $user_query  = $conn->prepare("SELECT staff_ID, First_Name, Sur_Name FROM staff_db where role = 4");
        $user_query->execute();


        while($row = $user_query->fetch(PDO::FETCH_ASSOC)){
            $role_id = $row['staff_ID'];
           $role_name = $row['First_Name'] . " " . $row['Sur_Name'];

            echo '<option value=" '. $role_id .'" >'.$role_name.'</option>';
   }
    }

    function dropdownDriver(){
        $conn = connect();
        $user_query  = $conn->prepare("SELECT staff_ID, First_Name, Sur_Name FROM staff_db where role = 6");
        $user_query->execute();


        while($row = $user_query->fetch(PDO::FETCH_ASSOC)){
            $role_id = $row['staff_ID'];
           $role_name = $row['First_Name'] . " " . $row['Sur_Name'];

            echo '<option value=" '. $role_id .'" >'.$role_name.'</option>';
   }
    }


    function login($username, $password){
        session_start();
            $check_mail = new ValidateMail();

            $login_audit = new AuditLog();
            $conn = connect();
            
            
            if($check_mail->checkmail($username)){

            $created_At = date("Y-m-d H:i:s");
            $modified_At = date("Y-m-d H:i:s");
            $Is_Deleted = 0;
                $username = Sanitize::sanitizeEmail($username);
				$query = "SELECT * FROM staff_db WHERE Email = :em AND staff_uniqueKey = :uk ";
				$res = $conn->prepare($query);
				$res->bindValue(":em", $username, PDO::PARAM_STR);
				$res->bindValue(":uk", $password, PDO::PARAM_STR);
				$res->execute();
                $num_rows = $res->rowCount();
                $action = "Logged in";
                if($num_rows > 0){
                    $row = $res->fetch(PDO::FETCH_ASSOC);

                    $login_audit->audit_login($action, $password);
                
                    $_SESSION['id']=$row['staff_ID'];
                    $usserole = $row['role'];
                    if($usserole == 1){
                        header("location:../Dashboard.php");
                    }else{
                        header("location:../userManagement/viewStaff.php");
                    }                
                }
              
            }else{

                $query = "SELECT * FROM  learners_bd WHERE student_unique_id = :uk";
				$res = $conn->prepare($query);
               
                
				$res->bindValue(":uk", $username, PDO::PARAM_STR);
				// $res->bindValue(":pa", $password, PDO::PARAM_STR);
				$res->execute();
                $num_rows = $res->rowCount();

                if($num_rows > 0){
                $row = $res->fetch(PDO::FETCH_ASSOC);
                //print_r($row);
           
                $storedPasswordHash = $row['password'];
                        if (password_verify($password, $storedPasswordHash)) {
                            // Password is correct
                            $_SESSION['id'] = $row['ID'];
                        
                            
                            header("location:../student/viewStudent.php");
                        } 
                }
            }
    }

    function get_staff_Name($user_id){
        $conn = connect();
        $query = "SELECT * FROM staff_db WHERE staff_ID = :sd";
        $res = $conn->prepare($query);
        $res->bindValue(":sd", $user_id, PDO::PARAM_STR);
        $res->execute();
      $row = $res->fetch(PDO::FETCH_ASSOC);
      
      if ($row) {
        return $row['First_Name'];
    } else {
        return null; // Return null or handle the case where no result is found
    }
           
    
    }

    function staff_classroom($class_id, $arm_id, $annex_id, $session_id, $term_id){
        $conn = connect();
        $query = "SELECT ID, student_unique_id, First_Name, Second_Name, SurName, Sex, imageUrl, Guidance_Email FROM `learners_bd`
         WHERE  class_id = :ci AND arm_id = :ai AND annex_id = :ad AND session_id = :si AND term_id = :td";
        $res = $conn->prepare($query);
        $res->bindValue(":ci", $class_id, PDO::PARAM_STR);
        $res->bindValue(":ai", $arm_id, PDO::PARAM_STR);
        $res->bindValue(":ad", $annex_id, PDO::PARAM_STR);
        $res->bindValue(":si", $session_id, PDO::PARAM_STR);
        $res->bindValue(":td", $term_id, PDO::PARAM_STR);
        $res->execute();
      $row = $res->fetchAll(PDO::FETCH_ASSOC);
      return $row;
    }
    
}
