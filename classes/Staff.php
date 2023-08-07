<?php
require_once("../PhpConnections/connection.php");

class Staff
{
    function insertUser($sUniqueId, $first_name, $last_name, $phone_No, $address, $staff_role, $myImag, $email, $pass, $sex, $degree, $annex_id, $discipline,   $degree_date)
    {
        $conn = connect();

        $created_At = date("Y-m-d H:i:s");
        $modified_At = date("Y-m-d H:i:s");
        $Is_Deleted = 0;

        $sql = "INSERT INTO `staff_db` (`staff_uniqueKey`,`First_Name`, `Sur_Name`, `phone_number`, `Address`, `role`, `imageUrl`,`Email`,  `password`,  `sex`, `degree`, `annex_id`,  `discipline`,  `degree_date` ) VALUES " . "( :suiq, :fname, :lname, :pnum, :add, :stf_role, :img_url, :email, :pass, :sx, :dg, :ai, :disc, :ddate)";

        try {
            //code...
            $stmt = $conn->prepare($sql); 
        $stmt->bindValue(":fname", $first_name);
        $stmt->bindValue(":lname", $last_name);
        $stmt->bindValue(":pnum", $phone_No);

        $stmt->bindValue(":add", $address);
        $stmt->bindValue(":stf_role", $staff_role);
        $stmt->bindValue(":img_url", $myImag);
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


    function dropdownFacilitator(){
        $conn = connect();
        $user_query  = $conn->prepare("SELECT staff_ID, First_Name, Sur_Name FROM staff_db where role = 5");
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
    
}
