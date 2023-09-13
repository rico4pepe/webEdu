<?php
require_once("../PhpConnections/connection.php");

class Exam
{
   public function insertExam($question, $option_a, $option_b, $option_c, $option_d, $option_e, $correct_option, $classes, $subject)
    {
        $conn = connect();

        $created_At = date("Y-m-d H:i:s");
        $modified_At = date("Y-m-d H:i:s");
        $Is_Deleted = 0;

        $sql = "INSERT INTO `question_answer` (`question_text`,`option_a`, `option_b`, `option_c`, `option_d`, `option_e`, `correct_question`,`class_id`,  `subject_id`) VALUES " . "( :qt, :oa, :ob, :oc, :od, :oe, :cq, :ci, :si)";

        try {
            //code...
            $stmt = $conn->prepare($sql); 
        $stmt->bindValue(":qt", $question, PDO::PARAM_STR);
        $stmt->bindValue(":oa", $option_a, PDO::PARAM_STR);
        $stmt->bindValue(":ob", $option_b, PDO::PARAM_STR);

        $stmt->bindValue(":oc", $option_c, PDO::PARAM_STR);
        $stmt->bindValue(":od", $option_d, PDO::PARAM_STR);
        $stmt->bindValue(":oe", $option_e, PDO::PARAM_STR);
        $stmt->bindValue(":cq", $correct_option);
        $stmt->bindValue(":ci", $classes, PDO::PARAM_STR);
        $stmt->bindValue(":si", $subject, PDO::PARAM_STR);


        $stmt->execute();

        $num_rows = $stmt->rowCount();
        if ($num_rows  > 0) {
        
            $msg = "Question has been entered";
          $msgType = "success";

          ?>
        <div class="alert alert-<?php echo $msgType; ?> alert-dismissible fade show" role="alert">
                    <?php echo $msg; ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>

       <?php   
        }else {
            $msg = "Staff was not succesfully registered";
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
