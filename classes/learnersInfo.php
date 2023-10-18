<?php
require_once("../PhpConnections/connection.php");

class learners
{
    function insertLearner($first_name, $Second_name, $SurName, $Sex, $Date_of_birth, $Guidance_Email, $Guidance_phone_No, $address, $State_Of_origin, $Blood_Group, $Geno_Type, $Guidance_Occupation, $unique_id, $unique_password,$class_id, $arm_id, $annex_id, $targetFile)
    {
        $conn = connect();

        $created_At = date("Y-m-d H:i:s");
        $modified_At = date("Y-m-d H:i:s");
        $Is_Deleted = 0;

        $sql = "INSERT INTO `learners_bd` (`First_Name`, `Second_name`, `SurName`, `Sex`, `Date_of_birth`, `Guidance_Email`,`Guidance_phone_No`,`address`, `State_Of_origin`,`Blood_Group`,`Geno_Type`,`Guidance_Occupation`,`student_unique_id`, `password`,`class_id`, `arm_id`, `annex_id`, `imageUrl`) 
        VALUES " . "( :fname, :Scname, :Sname, :Sex, :D_O_B, :GD_email, :GD_Phone_No, :add, :State_Of_org, :Bld_Grp, :Geno_Type, :GD_Occptn, :ui, :up, :ci, :ai, :annx, :img_url )";
            try {
                //code...
                $stmt = $conn->prepare($sql);
        $stmt->bindValue(":fname", $first_name);
        $stmt->bindValue(":Scname", $Second_name);
        $stmt->bindValue(":Sname", $SurName);

        $stmt->bindValue(":Sex", $Sex);
        $stmt->bindValue(":D_O_B", $Date_of_birth);
        $stmt->bindValue(":GD_email", $Guidance_Email);
        $stmt->bindValue(":GD_Phone_No", $Guidance_phone_No);
        $stmt->bindValue(":add", $address);
        $stmt->bindValue(":State_Of_org", $State_Of_origin);
        $stmt->bindValue(":Bld_Grp", $Blood_Group);
        $stmt->bindValue(":Geno_Type", $Geno_Type);
        $stmt->bindValue(":GD_Occptn", $Guidance_Occupation);
        $stmt->bindValue(":ui", $unique_id);
        $stmt->bindValue(":up", $unique_password);

        $stmt->bindValue(":ci", $class_id);
        $stmt->bindValue(":ai", $arm_id);
        $stmt->bindValue(":annx", $annex_id);

        $stmt->bindValue(":img_url", $targetFile);
        $stmt->execute();
        $num_rows2 = $stmt->rowCount();
        if($num_rows2 > 0){
            
            $msg = "Student has been  registered.";
          $msgType = "success";

          ?>
        <div class="alert alert-<?php echo $msgType; ?> alert-dismissible fade show" role="alert">
                    <?php echo $msg; ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>


       <?php   
        }else {
            $msg = "Student was not succesfully registered";
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
