<?php

require_once("../PhpConnections/connection.php");
require_once('../classes/Exam.php');



        // if($_POST['page'] == 'viewexam'){
        //     if($_POST['action'] == 'loadquestion') {
        //             if($_POST['class_id'] == '' && $_POST['subject_id'] == ''){

        //             }
        //     }
        // }

        if ($_SERVER['REQUEST_METHOD'] === 'POST'){
                $conn = connect();
                $classId = $_POST['class_id'];
                $subjectId = $_POST['subject_id'];
                $sql = "select * from question_answer  where subject_id = :sd and class_id = :cd";
                $stmt = $conn->prepare($sql); 
                $stmt->bindValue(":sd", $subjectId, PDO::PARAM_STR);
                $stmt->bindValue(":cd", $classId, PDO::PARAM_STR);
                $stmt->execute();
                $questions = $stmt->fetchAll(PDO::FETCH_ASSOC);

               if($questions){
                foreach ($questions as &$question) {
                        // $question['options'] = "<input type='radio' name='answer' value='A'>A. {$question['option_a']}<br>";
                        // $question['options'] .= "<input type='radio' name='answer' value='B'>B. {$question['option_b']}<br>";
                        // $question['options'] .= "<input type='radio' name='answer' value='C'>C. {$question['option_c']}<br>";
                        // $question['options'] .= "<input type='radio' name='answer' value='D'>D. {$question['option_d']}<br>";
                        // $question['options'] .= "<input type='radio' name='answer' value='E'>E. {$question['option_e']}<br>";
            
                        $options = array(
                                 $question['option_a'],
                                 $question['option_b'],
                                 $question['option_c'],
                                 $question['option_d'],
                                 $question['option_e']
                            );
                      
                        $question['options'] = implode(';', $options);
                          // Include the correct_option as well
                        $question['correct_option'] = $question['correct_question'];
                        
                      // $question['correct_option'] = $options[$question['correct_question']];
                     

                       
                       
                    }
                    echo json_encode($questions);
               }else{
                echo "No questions found.";
               }


        }

?>