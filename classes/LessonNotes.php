<?php
require_once("../PhpConnections/connection.php");

class LessonNotes
{
    function insertLessonNotes($Note_Tittle, $Note_Description, $Class_id, $subject_id, $to_whom_id)
    {
        $conn = connect();

        // $created_At = date("Y-m-d H:i:s");
        // $modified_At = date("Y-m-d H:i:s");
        // $Is_Deleted = 0;

       
        
        $sql = "INSERT INTO `lesson_note` (`Note_Tittle`,`Note_Description`,`Class_id`, `subject_id`, `to_whom_id`) VALUES " . "( :nt,:nd,:ci, :si, :td )";

      

        try {
            //code...
            $stmt = $conn->prepare($sql);
        $stmt->bindValue(":nt", $Note_Tittle);
        $stmt->bindValue(":nd", $Note_Description);
        $stmt->bindValue(":ci", $Class_id);
        $stmt->bindValue(":si", $subject_id);
        $stmt->bindValue(":td", $to_whom_id);
       
       

        $stmt->execute();

        $num_rows = $stmt->rowCount();

     
        //$result = $stmt->fetchAll();
        if ($num_rows  > 0) {
            $msg = "Lesson Note  Has Been Created.";
          $msgType = "success";
          ?>
          <div class="alert alert-<?php echo $msgType; ?> alert-dismissible fade show" role="alert">
                    <?php echo $msg; ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
       <?php   
        }else {
            $msg = "Lesson note was not created succesfully" ;
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

    function updateLessonNote($Note_Tittle, $Note_Description, $Class_id, $subject_id, $to_whom_id, $id){
        $conn = connect();
        $sql = "UPDATE lesson_note SET Note_Tittle=:nt, Note_Description=:nd, Class_id=:ci, subject_id=:si, to_whom_id=:ti, WHERE id=:id";
        try {
            //code...
            $stmt = $conn->prepare($sql);
            $stmt->bindValue(":nt", $Note_Tittle);
            $stmt->bindValue(":nd", $Note_Description);
            $stmt->bindValue(":ci", $Class_id);
            $stmt->bindValue(":si", $subject_id);
            $stmt->bindValue(":ti", $to_whom_id);

            $stmt->bindValue(":id", $id);
            if($stmt->execute()){
                $msg = "Lesson Note Has Been Updated.";
                $msgType = "success";
            
            ?>

            <div class="alert alert-<?php echo $msgType; ?> alert-dismissible fade show" role="alert">
                    <?php echo $msg; ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>

       <?php   
        }else {
            $msg = "Lesson Note was not succesfully updated " ;
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

    // function dropdownCategories(){
    //     $conn = connect();
    //     $user_query  = $conn->prepare("SELECT categories_id, category_name FROM categories");
    //     $user_query->execute();
       
    //         while($row = $user_query->fetch(PDO::FETCH_ASSOC)){
    //                  $cat_id = $row['categories_id'];
    //                 $cat_name = $row['category_name'];
    
    //                  echo '<option value=" '. $cat_id .'" >'.$cat_name.'</option>';
    //         }
    // }
}
