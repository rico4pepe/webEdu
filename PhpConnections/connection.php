<?php

require_once('Constant.php');

 ini_set( 'display_errors', 1 );
     error_reporting( E_ALL );


    function connect(){

      
        try{ 
            $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD);
            $conn-> setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
        
        }catch(PDOException  $ex){
            die( "Connection failed: " . $ex-> getMessage() );
            }
    
            return $conn;
     }

    
  


?>