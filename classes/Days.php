<?php
require_once("../PhpConnections/connection.php");

class Days
{
   

   
    function dropdownDays(){
        $conn = connect();
        $user_query  = $conn->prepare("SELECT ID, NAME FROM days_db");
        $user_query->execute();


        while($row = $user_query->fetch(PDO::FETCH_ASSOC)){
            $day_id = $row['ID'];
           $day_name = $row['NAME'];

            echo '<option value=" '. $day_id .'" >'.$day_name.'</option>';
   }
    }
}
