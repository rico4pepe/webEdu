<?php
        class  AssignSubject{
            public function insertAssignSubject($staff_id, $class_ids, $subject_id, $annex_id, $session_id, $term_id ){
                $conn = connect();

                // $created_At = date("Y-m-d H:i:s");
                // $modified_At = date("Y-m-d H:i:s");
                // $Is_Deleted = 0;
                

                $sql = "INSERT INTO `staff_subject` (`staff_id`, `class_id`, `subject_id`,`annex_id`, `session_id`, `term_id`) VALUES " . "( :si, :ci, :sd, :ai, :sd, :td )";
                try {
                    //code...
                    foreach ($class_ids as $class_id) {
                    $stmt = $conn->prepare($sql);
                $stmt->bindValue(":si", $staff_id);
                $stmt->bindValue(":ci", $class_id);
                $stmt->bindValue(":ai", $subject_id);
                $stmt->bindValue(":an", $annex_id);
                $stmt->bindValue(":sd", $session_id);
                $stmt->bindValue(":td", $term_id);
                $stmt->execute();
                $num_rows = $stmt->rowCount();
                    }

                   
               
               
             
                //$result = $stmt->fetchAll();
                if ($num_rows  > 0) {
                    $msg = "Staff Have been successfully assigned to a class subject.";
                  $msgType = "success";
                  ?>
                  <div class="alert alert-<?php echo $msgType; ?> alert-dismissible fade show" role="alert">
                            <?php echo $msg; ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
               <?php   
                }else {
                    $msg = "Arm was not created succesfully" ;
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

            public function getStaffAndSubject($staff_id){
                $conn = connect();
                $user_query  = $conn->prepare("SELECT staff_db.First_Name, staff_db.Sur_Name, school_class.class_name, subjects.Name, annex.annex_name, staff_subject.staff_subject_id FROM `staff_db` JOIN staff_subject ON staff_db.staff_ID = staff_subject.staff_id JOIN school_class ON school_class.id = staff_subject.class_id JOIN subjects ON subjects.id = staff_subject.subject_id JOIN annex ON annex.id = staff_subject.annex_id where staff_db.staff_ID = :si");
                $user_query->bindValue(":si", $staff_id);
    
                $user_query->execute();
                $row = $user_query->fetchAll(PDO::FETCH_ASSOC);
                return $row;
            }

            public function getStaffAndSubjectById($staff_subject_id, $term_id, $session_id){
                $conn = connect();
                $user_query  = $conn->prepare("SELECT staff_db.staff_ID, staff_db.First_Name, staff_db.Sur_Name, school_class.id, school_class.class_name, subjects.id, subjects.Name, annex.id, annex.annex_name, staff_subject.staff_subject_id FROM `staff_db` JOIN staff_subject ON staff_db.staff_ID = staff_subject.staff_id JOIN school_class ON school_class.id = staff_subject.class_id JOIN subjects ON subjects.id = staff_subject.subject_id 
                JOIN annex ON annex.id = staff_subject.annex_id where staff_subject.staff_subject_id = :ss AND staff_subject.term_id = :ti AND staff_subject.session_id = :si ");
                $user_query->bindValue(":ss", $staff_subject_id);
                $user_query->bindValue(":ti", $term_id);
                $user_query->bindValue(":si", $session_id);

                $user_query->execute();
                $row = $user_query->fetch(PDO::FETCH_ASSOC);
                return $row;

            }

            public function updateStaffSubject($staff_subject_id, $staff_id, $class_id, $subject_id, $annex_id, $term_id, $session_id){
                $conn = connect();
                $user_query  = $conn->prepare("UPDATE staff_subject set staff_id = :sd , class_id = :cd, subject_id = :sjd, annex_id = :ai where staff_subject_id = :ss AND term_id = :ti AND session_id = :si ");

                
                $user_query->bindValue(":sd", $staff_id);
                $user_query->bindValue(":cd", $class_id);
                $user_query->bindValue(":sjd", $subject_id);
                $user_query->bindValue(":ai", $annex_id);

                $user_query->bindValue(":ss", $staff_subject_id);
                $user_query->bindValue(":ti", $term_id);
                $user_query->bindValue(":si", $session_id);

                if($user_query->execute()){
                    header("Location: " . $_SERVER['REQUEST_URI']);
                    exit();

                }
            }






        }

?>