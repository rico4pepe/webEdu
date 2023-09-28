<?php
require_once("../PhpConnections/connection.php");

class BusTimeTable {
    function bustimetable($datee, $driver, $routes, $bus, $facilitator, $days){
        $conn = connect();

        $sql = "INSERT INTO `bus_timetable` (`datee`, `driver`,`routes`,`bus`,`facilitator`, `day`) VALUES " . "(:dt,:dr, :rt,:bs,:fc, :dy)";

        
        try
        {
            $user_query = $conn->prepare($sql); 
    
                       $user_query->bindParam(":dt", $datee);
                       $user_query->bindParam(":dr",  $driver);
                     $user_query->bindParam(":rt", $routes);
                     
                     $user_query->bindParam(":bs", $bus);
                     $user_query->bindParam(":fc", $facilitator);
                     $user_query->bindParam(":dy",  $days);
                    $user_query->execute();
    
                    $num_rows = $user_query->rowCount();

                    //$result = $stmt->fetchAll();
    if ($num_rows  > 0) {
        $msg = "Bus Time Table succesfully created .";
      $msgType = "success";
      ?>
     <div class="alert alert-<?php echo $msgType; ?> alert-dismissible fade show" role="alert">
                <?php echo $msg; ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
   <?php   
    }else {
        $msg = "Bus Time Table  was not created succesfully" ;
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
}

?>