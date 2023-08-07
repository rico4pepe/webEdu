<?php
require_once("../PhpConnections/connection.php");

class learners
{
    function insertLearner($first_name, $Second_name, $SurName, $Sex, $Date_of_birth, $Guidance_Email, $Guidance_phone_No, $address, $State_Of_origin, $Blood_Group, $Geno_Type, $Guidance_Occupation, $myImag)
    {
        $conn = connect();

        $created_At = date("Y-m-d H:i:s");
        $modified_At = date("Y-m-d H:i:s");
        $Is_Deleted = 0;

        $sql = "INSERT INTO `learners_bd` (`First_Name`, `Second_name`, `SurName`, `Sex`, `Date_of_birth`, `Guidance_Email`,`Guidance_phone_No`,`address`, `State_Of_origin`,`Blood_Group`,`Geno_Type`,`Guidance_Occupation`, `imageUrl`) 
        VALUES " . "( :fname, :Scname, :Sname, :Sex, :D_O_B, :GD_email, :GD_Phone_No, :add, :State_Of_org, :Bld_Grp, :Geno_Type, :GD_Occptn, :img_url)";

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
        $stmt->bindValue(":img_url", $myImag);

        //Password Hashing
        // $stmt->bindValue(":pass", $pass);
        //End Password Hashing

        $stmt->execute();
    }
}
