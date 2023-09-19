<?php
class AuditLog{

    public function audit_login($action, $unique_key){
        $conn = connect();
        $sql = "INSERT INTO `audit_log` (`action`,`user_id` ) VALUES " . "( :ac, :uk)";
        
        try {
            //code...
            
            $stmt = $conn->prepare($sql); 
        $stmt->bindValue(":ac", $action);
        $stmt->bindValue(":ud", $unique_key);


        $stmt->execute();

        } catch (Exception $ex) {
            //throw $th;
            echo $ex->getMessage();
        }
    }
}