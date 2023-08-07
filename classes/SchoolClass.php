<?php
require_once("../PhpConnections/connection.php");

class SchoolClass
{
    function insertClass($className)
    {
        $conn = connect();

        // $created_At = date("Y-m-d H:i:s");
        // $modified_At = date("Y-m-d H:i:s");
        // $Is_Deleted = 0;

        $sql = "INSERT INTO `school_class` (`class_name`) VALUES " . "( :cname )";

        try {
            //code...
            $stmt = $conn->prepare($sql);
        $stmt->bindValue(":cname", $className);
       
       

        $stmt->execute();

        $num_rows = $stmt->rowCount();

     
        //$result = $stmt->fetchAll();
        if ($num_rows  > 0) {
            $msg = "New Class Has Been Created.";
          $msgType = "success";
          ?>
          <div class="alert alert-dismissable alert-<?php echo $msgType; ?>">
              <button data-dismiss="alert" class="close" type="button">x</button>
              <p><?php echo $msg; ?></p>
            </div>
       <?php   
        }else {
            $msg = "Class was not created succesfully" ;
            $msgType = "warning";
            ?>
              <div class="alert alert-dismissable alert-<?php echo $msgType; ?>">
              <button data-dismiss="alert" class="close" type="button">x</button>
              <p><?php echo $msg; ?></p>
            </div>
         <?php   
          }

       
        } catch (Exception $ex) {
            //throw $th;
            echo $ex->getMessage();
        }
        
    }

    function updateClass($class_name, $class_id){
        $conn = connect();
        $sql = "UPDATE school_class SET class_name=:aname  WHERE id=:id";
        try {
            //code...
            $stmt = $conn->prepare($sql);
            $stmt->bindValue(":aname", $class_name);
          

            $stmt->bindValue(":id", $class_id);
            if($stmt->execute()){
                $msg = "Class has Been Updated.";
                $msgType = "success";
            
            ?>

            <div class="alert alert-<?php echo $msgType; ?> alert-dismissible fade show" role="alert">
                    <?php echo $msg; ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>

       <?php   
        }else {
            $msg = "Class was not succesfully updated " ;
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

    function dropdownClass(){
        $conn = connect();
        $user_query  = $conn->prepare("SELECT id, class_name FROM school_class");
        $user_query->execute();


        while($row = $user_query->fetch(PDO::FETCH_ASSOC)){
            $class_id = $row['id'];
           $class_name = $row['class_name'];

            echo '<option value=" '. $class_id .'" >'.$class_name.'</option>';
   }
    }
}
