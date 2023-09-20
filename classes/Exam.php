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
        $user_id = '25';

        $sql = "INSERT INTO `question_answer` (`question_text`,`option_a`, `option_b`, `option_c`, `option_d`, `option_e`, `correct_question`,`class_id`,  `subject_id`, `user_id`) VALUES " . "( :qt, :oa, :ob, :oc, :od, :oe, :cq, :ci, :si, :ui)";

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
        $stmt->bindValue(":ui", $user_id, PDO::PARAM_STR);


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

    // public function selectExam($user_id){
    //     $conn = connect();
    //     try {
    //         //code...
    //         $sql = "select * from exam  where id = :ud";
    //         $stmt = $conn->prepare($sql); 
    //         $stmt->bindValue(":ud", $user_id, PDO::PARAM_STR);
    //         $stmt->execute();
    //     } catch (Exception $ex) {
    //         //throw $th;
    //         echo $ex->getMessage();
    //     }
           

            
    // }


    public function displayExamQuest($subject_id,  $class_id){
        $conn = connect();
           try {
                //code...
                $sql = "select * from question_answer  where subject_id = :sd and class_id = :cd";
                $stmt = $conn->prepare($sql); 
                $stmt->bindValue(":sd", $subject_id, PDO::PARAM_STR);
                $stmt->bindValue(":cd", $class_id, PDO::PARAM_STR);
                $stmt->execute();
                $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
                return $results;
            } catch (Exception $ex) {
                //throw $th;
                echo $ex->getMessage();
            }
    }

    public function generateLink($exam_link, $subject_id,  $class_id,  $start_time, $end_time)
    {
        $conn = connect();
        $check_link_exist_query = "SELECT exams_link from exam_link where subject_id = :sjd AND 
        class_id = :cld";
        $check_link_exist_stmt = $conn->prepare($check_link_exist_query);
        $check_link_exist_stmt->bindValue(":sjd", $subject_id, PDO::PARAM_STR);
        $check_link_exist_stmt->bindValue(":cld", $class_id, PDO::PARAM_STR);
        $check_link_exist_stmt->execute();
        $num_rows = $check_link_exist_stmt->rowCount();
        if($num_rows > 0)
        {
            $msg = "Exam Link already exist";
            $msgType = "warning";
            ?>
            <div class="alert alert-<?php echo $msgType; ?> alert-dismissible fade show" role="alert">
                        <?php echo $msg; ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
    
           <?php 
           }else
           {
            $sql = "INSERT INTO `exam_link` (`exam_link`,`subject_id`, `class_id`,  `start_time`, `end_time`) VALUES " . "( :el, :si, :ci, :ti, :si, :st, :et)";
            try {
                //code...
                $stmt = $conn->prepare($sql); 
            $stmt->bindValue(":qt", $exam_link, PDO::PARAM_STR);
            $stmt->bindValue(":oa", $subject_id, PDO::PARAM_STR);
            $stmt->bindValue(":ob", $class_id, PDO::PARAM_STR);
    
            // $stmt->bindValue(":oc", $term_id, PDO::PARAM_STR);
            // $stmt->bindValue(":od", $session_id, PDO::PARAM_STR);
            $stmt->bindValue(":oe", $start_time, PDO::PARAM_STR);
            $stmt->bindValue(":ci", $end_time, PDO::PARAM_STR);
            // $stmt->bindValue(":si", $publish, PDO::PARAM_STR);
            // $stmt->bindValue(":ui", $status, PDO::PARAM_STR);
    
    
            $stmt->execute();
    
            $num_rows = $stmt->rowCount();
            if ($num_rows  > 0) {
            
                $msg = "Exam Link was generated sucessfully";
              $msgType = "success";
    
              ?>
            <div class="alert alert-<?php echo $msgType; ?> alert-dismissible fade show" role="alert">
                        <?php echo $msg; ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
    
           <?php   
            }else {
                $msg = "Exam Link was not generated";
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

    public function insertExamScore($exam_id, $score, $student_id, $subject_id, $class_id)
    {

        $conn = connect();
        $created_At = date("Y-m-d H:i:s");
        $modified_At = date("Y-m-d H:i:s");
        $Is_Deleted = 0;

        $sql = "INSERT INTO `exam_score` (`exam_id`,`score`,`student_id`, `subject_id`, `class_id`) VALUES " . "( :ed, :sc, :sd, :si, :ci)";

        $stmt = $conn->prepare($sql); 
        $stmt->bindValue(":ed", $exam_id, PDO::PARAM_STR);
        $stmt->bindValue(":sc", $student_id, PDO::PARAM_STR);
        $stmt->bindValue(":sd", $score, PDO::PARAM_STR);
        $stmt->bindValue(":si", $subject_id, PDO::PARAM_STR);

        $stmt->bindValue(":ci", $class_id, PDO::PARAM_STR);
    }



public function validateLink($student_id, $subject_id, $class_id){
    $conn = connect();
    $check_user_exist_query = "SELECT student_id from exam_score where student_id = :sid AND subject_id = :sjd
    AND class_id = :cld";
    $exam_stmt = $conn->prepare($check_user_exist_query);
    $exam_stmt->bindValue(":sid", $student_id);
    $exam_stmt->bindValue(":sjd", $subject_id);
    $exam_stmt->bindValue(":cld", $class_id);

    $exam_stmt->execute();
    $num_rows = $exam_stmt->rowCount();
    if ($num_rows  > 0) {
        
        $msg = "Seems you have taken the exam already";
      $msgType = "failure";

      ?>
    <div class="alert alert-<?php echo $msgType; ?> alert-dismissible fade show" role="alert">
                <?php echo $msg; ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>

   <?php   
        //header("Location: .$newURL.php");
        die();
    }
}
    


public function fetchDropdownSubjectByUser($user_id){
    $conn = connect();
        try {
            //code...
            $sql = "SELECT DISTINCT question_answer.subject_id, subjects.Name FROM `question_answer` JOIN subjects ON 
            question_answer.subject_id = subjects.id WHERE user_id = :id";
            $stmt = $conn->prepare($sql); 
            $stmt->bindValue(":id", $user_id, PDO::PARAM_STR);
            $stmt->execute();
            
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            $name_id = $row['subject_id'];
           $subject_name = $row['Name'];

            echo '<option value=" '. $name_id .'" >'.$subject_name.'</option>';
   }
        } catch (Exception $ex) {
            //throw $th;
            echo $ex->getMessage();
        }    
}


public function fetchDropdownClassByUser($user_id){
    $conn = connect();
        try {
            //code...
            $sql = "SELECT DISTINCT question_answer.class_id, school_class.class_name FROM `question_answer` JOIN school_class ON 
            question_answer.class_id = school_class.id WHERE user_id = :id";
            $stmt = $conn->prepare($sql); 
            $stmt->bindValue(":id", $user_id, PDO::PARAM_STR);
            $stmt->execute();
            
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            $name_id = $row['class_id'];
           $subject_name = $row['class_name'];

            echo '<option value=" '. $name_id .'" >'.$subject_name.'</option>';
   }
        } catch (Exception $ex) {
            //throw $th;
            echo $ex->getMessage();
        }    
}
public function fetchExamByUser($user_id){
    $conn = connect();
        try {
            //code...
            $sql = "select * from exam  where id = :ud";
            $stmt = $conn->prepare($sql); 
            $stmt->bindValue(":ud", $user_id, PDO::PARAM_STR);
            $stmt->execute();
        } catch (Exception $ex) {
            //throw $th;
            echo $ex->getMessage();
        }    
}

    
    
}
