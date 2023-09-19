<?php
require_once("../PhpConnections/connection.php");

class Subjects
{
    function insertSubject($subjectName)
    {
        $conn = connect();

        // $created_At = date("Y-m-d H:i:s");
        // $modified_At = date("Y-m-d H:i:s");
        // $Is_Deleted = 0;

        $sql = "INSERT INTO `subjects` (`Name`) VALUES " . "( :name )";

        try {
            //code...
            $stmt = $conn->prepare($sql);
        $stmt->bindValue(":name", $subjectName);
       
       

        $stmt->execute();

        $num_rows = $stmt->rowCount();

     
        //$result = $stmt->fetchAll();
        if ($num_rows  > 0) {
            $msg = "New Subject Has Been Created.";
          $msgType = "success";
          ?>
         <div class="alert alert-<?php echo $msgType; ?> alert-dismissible fade show" role="alert">
                    <?php echo $msg; ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
       <?php   
        }else {
            $msg = "Subject  was not created succesfully" ;
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

    function dropdownSubject(){
        $conn = connect();
        $user_query  = $conn->prepare("SELECT id, Name FROM subjects");
        $user_query->execute();


        while($row = $user_query->fetch(PDO::FETCH_ASSOC)){
            $name_id = $row['id'];
           $subject_name = $row['Name'];

            echo '<option value=" '. $name_id .'" >'.$subject_name.'</option>';
   }
    }

    public function getSubject($subject_id){
        $conn = connect(); 
        $user_query  = $conn->prepare("SELECT Name FROM subjects where id = :id");
        $user_query->bindValue(":id", $subject_id);
        $user_query->execute(); 
        $results = $user_query->fetch(PDO::FETCH_ASSOC);
        if ($results) {
            return $results['Name'];
        } else {
            return null; // Return null or handle the case where no result is found
        }
    }

    
}
