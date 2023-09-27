<?php
require_once("../PhpConnections/connection.php");

class Role
{
    function insertRole($roleName)
    {
        $conn = connect();

        // $created_At = date("Y-m-d H:i:s");
        // $modified_At = date("Y-m-d H:i:s");
        // $Is_Deleted = 0;

        $sql = "INSERT INTO `roles` (`name`) VALUES " . "( :rname )";

        try {
            //code...
            $stmt = $conn->prepare($sql);
        $stmt->bindValue(":rname", $roleName);
       
       

        $stmt->execute();

        $num_rows = $stmt->rowCount();

     
        //$result = $stmt->fetchAll();
        if ($num_rows  > 0) {
            $msg = "New Role Has Been Created.";
          $msgType = "success";
          ?>
         <div class="alert alert-<?php echo $msgType; ?> alert-dismissible fade show" role="alert">
                    <?php echo $msg; ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
       <?php   
        }else {
            $msg = "Role  was not created succesfully" ;
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

    function dropdownRoles(){
        $conn = connect();
        $user_query  = $conn->prepare("SELECT id, name FROM roles");
        $user_query->execute();


        while($row = $user_query->fetch(PDO::FETCH_ASSOC)){
            $role_id = $row['id'];
           $role_name = $row['name'];

            echo '<option value=" '. $role_id .'" >'.$role_name.'</option>';
   }
    }

    function lessonNoteDropdownRole($annex){
        $conn = connect();
        $role = 3;
        $sql = "SELECT staff_db.role, roles.name FROM staff_db JOIN roles ON roles.id = staff_db.role WHERE staff_db.annex_id = :sid AND staff_db.role = :srl";
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(":sid", $annex);
        $stmt->bindValue(":srl", $role);
        $stmt->execute();

        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            $role_id = $row['role'];
           $role_name = $row['name'];

            echo '<option value=" '. $role_id .'" >'.$role_name.'</option>';
   }

    }
}
