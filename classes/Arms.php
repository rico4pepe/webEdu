<?php
require_once("../PhpConnections/connection.php");

class Arms
{
    function insertArms($armsName)
    {
        $conn = connect();

        // $created_At = date("Y-m-d H:i:s");
        // $modified_At = date("Y-m-d H:i:s");
        // $Is_Deleted = 0;

        $sql = "INSERT INTO `arms` (`arms_name`) VALUES " . "( :aname )";

        try {
            //code...
            $stmt = $conn->prepare($sql);
        $stmt->bindValue(":aname", $armsName);
       
       

        $stmt->execute();

        $num_rows = $stmt->rowCount();

     
        //$result = $stmt->fetchAll();
        if ($num_rows  > 0) {
            $msg = "New Arm Has Been Created.";
          $msgType = "success";
          ?>
          <div class="alert alert-<?php echo $msgType; ?> alert-dismissible fade show" role="alert">
                    <?php echo $msg; ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
       <?php   
        }else {
            $msg = "Arm was not created succesfully" ;
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

    function updateArm($arm_name, $arm_id){
        $conn = connect();
        $sql = "UPDATE arms SET arms_name=:amname  WHERE arms_id=:id";
        try {
            //code...
            $stmt = $conn->prepare($sql);
            $stmt->bindValue(":amname", $arm_name);
          

            $stmt->bindValue(":id", $arm_id);
            if($stmt->execute()){
                $msg = "Arm has Been Updated.";
                $msgType = "success";
            
            ?>

            <div class="alert alert-<?php echo $msgType; ?> alert-dismissible fade show" role="alert">
                    <?php echo $msg; ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>

       <?php   
        }else {
            $msg = "Arm was not succesfully updated " ;
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

    function dropdownArm(){
        $conn = connect();
        $user_query  = $conn->prepare("SELECT arms_id, arms_name FROM arms");
        $user_query->execute();


        while($row = $user_query->fetch(PDO::FETCH_ASSOC)){
            $arms_id = $row['arms_id'];
           $arms_name = $row['arms_name'];

            echo '<option value=" '. $arms_id .'" >'.$arms_name.'</option>';
   }
    }
}
