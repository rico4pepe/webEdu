<?php
require_once("../PhpConnections/connection.php");

class Session
{
    function insertSession($session_year)
    {
        $conn = connect();

        // $created_At = date("Y-m-d H:i:s");
        // $modified_At = date("Y-m-d H:i:s");
        // $Is_Deleted = 0;

        $sql = "INSERT INTO `session_table` (`Session_year`) VALUES " . "( :syear )";

        try {
            //code...
            $stmt = $conn->prepare($sql);
        $stmt->bindValue(":syear", $session_year);
       
       

        $stmt->execute();

        $num_rows = $stmt->rowCount();

     
        //$result = $stmt->fetchAll();
        if ($num_rows  > 0) {
            $msg = "New Session Has Been Created.";
          $msgType = "success";
          ?>
          <div class="alert alert-<?php echo $msgType; ?> alert-dismissible fade show" role="alert">
                    <?php echo $msg; ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
       <?php   
        }else {
            $msg = "Session was not created succesfully" ;
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

    
    function dropdownSession(){
        $conn = connect();
        $user_query  = $conn->prepare("SELECT id, Session_year FROM session_table");
        $user_query->execute();


        while($row = $user_query->fetch(PDO::FETCH_ASSOC)){
            $session_id = $row['id'];
           $session_name = $row['Session_year'];

            echo '<option value=" '. $session_id .'" >'.$session_name.'</option>';
   }
    }
}
