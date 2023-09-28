<?php
require_once("../PhpConnections/connection.php");

Class schoolTimetable{

    //private $all_user = [];

  

    function insertTimeTable($class_id, $subject_id,$day_id,  $facilitator_id, $stime, $etime, $doexam){
        $class_id = trim($class_id);
        $subject_id  = trim( $subject_id);
        $day_id = trim($day_id);
        $facilitator_id     = trim($facilitator_id);
        $stime    = trim($stime);
        $etime    = trim($etime);
        $doexam    = trim($doexam);

        $conn = connect();

        $sql = "INSERT INTO `SchoolTimetable` (`school_class_id`, `Days`,`Subjects`,`facilitator`,`Start_Time`,`End_Time`,`exam_date`) VALUES " . "(:cid,:did, :sid,:fid,:stm, :etm, :doe)";
        

       
  
       
            try
            {
                $user_query = $conn->prepare($sql); 
        
                           $user_query->bindParam(":cid", $class_id);
                           $user_query->bindParam(":did",  $day_id);
                         $user_query->bindParam(":sid", $subject_id);
                         
                         $user_query->bindParam(":fid", $facilitator_id);
                         $user_query->bindParam(":stm", $stime);
                         $user_query->bindParam(":etm",  $etime);
                         $user_query->bindParam(":doe",   $doexam );
                        $user_query->execute();
        
                        $num_rows = $user_query->rowCount();

                        //$result = $stmt->fetchAll();
        if ($num_rows  > 0) {
            $msg = "A table has been succesfully created .";
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

            }catch (Exception $ex) {
                //throw $th;
                echo $ex->getMessage();
            }



      

    }


    function SelectTimeTable($newDay , $newSubjects , $Facilitator_ID , $newStarDate , $newEndDate ){
        echo "Hello first apperance....... $newDay , $newSubjects , $Facilitator_ID , $newStarDate , $newEndDate";
        $Days = trim($newDay);
        $Subjects  =  trim($newSubjects);
        $facilitator = $Facilitator_ID;
        $Start_Time    = $newEndDate;
        $End_Time    = $newStarDate;

        $conn = connect();


        echo "<br />Hello 2....... $newDay <br />";
        
        echo "SELECT   Days_DB.Name as Day, Facilitator_BD.First_Name, Facilitator_BD.Sur_Name,Subjects.Name, SchoolTimetable.Start_Time, SchoolTimetable.End_Time from SchoolTimetable
        JOIN Days_DB ON  SchoolTimetable.Days  = Days_DB.ID
        JOIN Facilitator_BD ON SchoolTimetable.facilitator = Facilitator_BD.Faciltator_ID
        JOIN Subjects ON SchoolTimetable.Subjects = Subjects.ID
       where Days_DB.Name = '   $Days'  and Subjects.Name = '$Subjects'
        ORDER BY Days_DB.Name,SchoolTimetable.Start_Time ";


echo "<br />Hello 3....... $newDay <br />";

        $sql_stmt = "SELECT   Days_DB.Name as Day, Facilitator_BD.First_Name, Facilitator_BD.Sur_Name,Subjects.Name, SchoolTimetable.Start_Time, SchoolTimetable.End_Time from SchoolTimetable
        JOIN Days_DB ON  SchoolTimetable.Days  = Days_DB.ID
        JOIN Facilitator_BD ON SchoolTimetable.facilitator = Facilitator_BD.Faciltator_ID
        JOIN Subjects ON SchoolTimetable.Subjects = Subjects.ID
       where Days_DB.Name = $Days  and Subjects.Name = $Subjects
        ORDER BY Days_DB.Name,SchoolTimetable.Start_Time; ";

        $user_query  = $conn->prepare($sql_stmt); 
       

            $user_query->execute();
    }

}
?>