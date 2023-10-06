<?php
require_once(__DIR__ . "/../PhpConnections/connection.php");


Class AcademicSession{


    public function __constructor()
    {
        // contructor
    }


  

    function dropDown_academicYear()
    {

        $conn = connect();
        $user_query  = $conn->prepare("SELECT * FROM session_table");
        $user_query->execute();
    
         while($row = $user_query->fetch(PDO::FETCH_ASSOC))
         {
                  $academic_year = $row['Session_year'] ;
                  $academic_yearId = $row['id'] ;
             
 
                  echo '<option value=" '. $academic_yearId.'" >'.$academic_year.'</option>';
         }
     }


     function dropDown_academicTerm()
     {

        $conn = connect();
        $user_query  = $conn->prepare("SELECT * FROM school_term");
        $user_query->execute();
    
         while($row = $user_query->fetch(PDO::FETCH_ASSOC))
         {
                  $academic_term = $row['term_name'] ;
                  $academic_termId = $row['term_id'] ;
             
 
                  echo '<option value=" '. $academic_termId.'" >'.$academic_term.'</option>';
         }
     }


     function activateSessionTerm($academic_year, $term)
    {
        $conn = connect();

        $academic_query  = $conn->query("SELECT COUNT(id) AS total FROM `academic_session`");
        $academic_row = $academic_query->fetch((PDO::FETCH_ASSOC));
        $academic_count  = $academic_row['total'];

        //$sql = "INSERT INTO `academic_session` (`session_id`, `term_id`) VALUES " . "( :sessname, :tname )";

        try {
            //code...

         

            if($academic_count == 0){
                $sql = "INSERT INTO `academic_session` (`session_id`, `term_id`) VALUES " . "( :sessname, :tname )";
                $stmt = $conn->prepare($sql);
                $stmt->bindValue(":sessname", $academic_year);
                $stmt->bindValue(":tname", $term);
                $stmt->execute();

                $num_rows = $stmt->rowCount();
                
        //$result = $stmt->fetchAll();
        if ($num_rows  > 0) {
            $msg = "Current Session and Term Has Been Created For the First Time.";
          $msgType = "success";
          ?>
          <div class="alert alert-<?php echo $msgType; ?> alert-dismissible fade show" role="alert">
                    <?php echo $msg; ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
       <?php   
        }else {
            $msg = "Unable to activate Current Session and Term" ;
            $msgType = "warning";
            ?>
              <div class="alert alert-<?php echo $msgType; ?> alert-dismissible fade show" role="alert">
                    <?php echo $msg; ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
         <?php   
          }
               
            }else{
            
                $academic_query  = $conn->query("SELECT id AS academicId FROM `academic_session`");
                $academic_row = $academic_query->fetch((PDO::FETCH_ASSOC));
                $academic_id  = $academic_row['academicId'];

                
               

                $stmt = $conn->prepare("UPDATE academic_session SET session_id=:as, term_id=:ua WHERE id=:id");
                $stmt->bindParam(":as", $academic_year);
                $stmt->bindParam(":ua", $term);
                $stmt->bindParam(":id", $academic_id );
                $stmt->execute();

                $num_rows = $stmt->rowCount();

                if ($num_rows  > 0) {
                    $msg = "Current Session and Term Has Been Updated and Activated.";
                  $msgType = "success";
                  ?>
                  <div class="alert alert-<?php echo $msgType; ?> alert-dismissible fade show" role="alert">
                    <?php echo $msg; ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
               <?php   
                }else {
                    $msg = "Unable to Update and  activate Current Session and Term " ;
                    $msgType = "warning";
                    ?>
                      <div class="alert alert-<?php echo $msgType; ?> alert-dismissible fade show" role="alert">
                    <?php echo $msg; ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
                 <?php   
                  }


            }

       
        } catch (Exception $ex) {
            //throw $th;
            echo $ex->getMessage();
        }
        
    }


    function getActiveSessionTerm (){
        $conn = connect();
        $user_query  = $conn->prepare("SELECT academic_session.id as session_id, academic_session.term_id, school_term.term_name, session_table.Session_year FROM `academic_session` JOIN school_term on 
        school_term.term_id = academic_session.term_id JOIN session_table on session_table.id = academic_session.session_id");
        $user_query->execute();
        $row = $user_query->fetch(PDO::FETCH_ASSOC);
        return $row;
    }  

}
