<?php
require_once("../PhpConnections/connection.php");

class Term
{
    function insertTerm($term)
    {
        $conn = connect();

        // $created_At = date("Y-m-d H:i:s");
        // $modified_At = date("Y-m-d H:i:s");
        // $Is_Deleted = 0;

        $sql = "INSERT INTO `school_term` (`term_name`) VALUES " . "( :tname )";

        try {
            //code...
            $stmt = $conn->prepare($sql);
        $stmt->bindValue(":tname", $term);
       
       

        $stmt->execute();

        $num_rows = $stmt->rowCount();

     
        //$result = $stmt->fetchAll();
        if ($num_rows  > 0) {
            $msg = "New Term Has Been Created.";
          $msgType = "success";
          ?>
          <div class="alert alert-<?php echo $msgType; ?> alert-dismissible fade show" role="alert">
                    <?php echo $msg; ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
       <?php   
        }else {
            $msg = "Term was not created succesfully" ;
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

    function dropdownTerm(){
        $conn = connect();
        $user_query  = $conn->prepare("SELECT term_id, term_name FROM school_term");
        $user_query->execute();


        while($row = $user_query->fetch(PDO::FETCH_ASSOC)){
            $term_id = $row['term_id'];
           $term_name = $row['term_name'];

            echo '<option value=" '. $term_id .'" >'.$term_name.'</option>';
   }
    }
}
