<?php
        class  AssignClass{
            public function insertAssignClass($staff_id, $class_id, $arm_id, $annex_id, $session_id, $term_id ){
                $conn = connect();

                // $created_At = date("Y-m-d H:i:s");
                // $modified_At = date("Y-m-d H:i:s");
                // $Is_Deleted = 0;
                $check_staff_isStamp = "SELECT staff_id from staff_class where staff_id = :sm";
                $check_staff_isStamp_query = $conn->prepare($check_staff_isStamp);
        $check_staff_isStamp_query->bindValue(":sm", $staff_id);
        $check_staff_isStamp_query->execute();
        $num_rows1 = $check_staff_isStamp_query->rowCount();
        if($num_rows1  > 0){
            $msg = "Staff have been assigned a class already exist.";
            $msgType = "warning";
  
            ?>
          <div class="alert alert-<?php echo $msgType; ?> alert-dismissible fade show" role="alert">
                      <?php echo $msg; ?>
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
              
             
  
         <?php
      
        }else{

                $sql = "INSERT INTO `staff_class` (`staff_id`, `class_id`,`arm_id`, `annex_id`, `session_id`, `term_id`) VALUES " . "( :si, :ci, :ai, :an, :sd, :td )";
                try {
                    //code...
                    $stmt = $conn->prepare($sql);
                $stmt->bindValue(":si", $staff_id);
                $stmt->bindValue(":ci", $class_id);
                $stmt->bindValue(":ai", $arm_id);
                $stmt->bindValue(":an", $annex_id);
                $stmt->bindValue(":sd", $session_id);
                $stmt->bindValue(":td", $term_id);
            
               
               
        
                $stmt->execute();
        
                $num_rows = $stmt->rowCount();
        
             
                //$result = $stmt->fetchAll();
                if ($num_rows  > 0) {
                    $msg = "Staff Have been successfully assigned to a class.";
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
                
            }

            public function getClassTeacher($staff_id, $session_id, $term_id){
                $conn = connect();
                $user_query  = $conn->prepare("SELECT staff_id, class_id, arm_id FROM staff_class where  staff_id = :si AND session_id = :sd AND term_id = :td");
                $user_query->bindValue(":si", $staff_id);
                $user_query->bindValue(":sd", $session_id);
                $user_query->bindValue(":td", $term_id);
                $user_query->execute();
                $row = $user_query->fetch(PDO::FETCH_ASSOC);
                return $row;
            }
        }

?>