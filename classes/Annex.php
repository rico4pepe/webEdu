<?php
require_once("../PhpConnections/connection.php");

class Annex
{
    function insertAnnex($annexName)
    {
        $conn = connect();

        // $created_At = date("Y-m-d H:i:s");
        // $modified_At = date("Y-m-d H:i:s");
        // $Is_Deleted = 0;

        $sql = "INSERT INTO `annex` (`annex_name`) VALUES " . "( :anname )";

        try {
            //code...
            $stmt = $conn->prepare($sql);
        $stmt->bindValue(":anname", $annexName);
       
       

        $stmt->execute();

        $num_rows = $stmt->rowCount();

     
        //$result = $stmt->fetchAll();
        if ($num_rows  > 0) {
            $msg = "New Annex Has Been Created.";
          $msgType = "success";
          ?>
         <div class="alert alert-<?php echo $msgType; ?> alert-dismissible fade show" role="alert">
                    <?php echo $msg; ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
       <?php   
        }else {
            $msg = "Annex  was not created succesfully" ;
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

    function updateAnnex($annex_name, $annex_id){
        $conn = connect();
        $sql = "UPDATE annex SET annex_name=:aname  WHERE id=:id";
        try {
            //code...
            $stmt = $conn->prepare($sql);
            $stmt->bindValue(":aname", $annex_name);
          

            $stmt->bindValue(":id", $annex_id);
            if($stmt->execute()){
                $msg = "Annex has Been Updated.";
                $msgType = "success";
            
            ?>

            <div class="alert alert-<?php echo $msgType; ?> alert-dismissible fade show" role="alert">
                    <?php echo $msg; ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>

       <?php   
        }else {
            $msg = "Annex was not succesfully updated " ;
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
    function dropdownAnnex(){
        $conn = connect();
        $user_query  = $conn->prepare("SELECT id, annex_name FROM annex");
        $user_query->execute();


        while($row = $user_query->fetch(PDO::FETCH_ASSOC)){
            $annex_id = $row['id'];
           $annex_name = $row['annex_name'];

            echo '<option value=" '. $annex_id .'" >'.$annex_name.'</option>';
   }
    }
}
