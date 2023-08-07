<?php
require_once("../PhpConnections/connection.php");

class Categories
{
    function insertCategories($category_Name, $description, $imageUrl, $imgName)
    {
        $conn = connect();

        // $created_At = date("Y-m-d H:i:s");
        // $modified_At = date("Y-m-d H:i:s");
        // $Is_Deleted = 0;

       
        
        $sql = "INSERT INTO `categories` (`category_Name`,`description`,`imageUrl`, `imgName`) VALUES " . "( :Cname,:desc,:img, :iname )";

      

        try {
            //code...
            $stmt = $conn->prepare($sql);
        $stmt->bindValue(":Cname", $category_Name);
        $stmt->bindValue(":desc", $description);
        $stmt->bindValue(":img", $imageUrl);
        $stmt->bindValue(":iname", $imgName);
       
       

        $stmt->execute();

        $num_rows = $stmt->rowCount();

     
        //$result = $stmt->fetchAll();
        if ($num_rows  > 0) {
            $msg = "New category Has Been Created.";
          $msgType = "success";
          ?>
          <div class="alert alert-<?php echo $msgType; ?> alert-dismissible fade show" role="alert">
                    <?php echo $msg; ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
       <?php   
        }else {
            $msg = "Category was not created succesfully" ;
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

    function updateCategories($category_Name, $description, $imageUrl, $imgName, $category_id){
        $conn = connect();
        $sql = "UPDATE categories SET category_Name=:Cname, description=:desc, imageUrl=:img, imgName=:iname WHERE categories_id=:id";
        try {
            //code...
            $stmt = $conn->prepare($sql);
            $stmt->bindValue(":Cname", $category_Name);
            $stmt->bindValue(":desc", $description);
            $stmt->bindValue(":img", $imageUrl);
            $stmt->bindValue(":iname", $imgName);

            $stmt->bindValue(":id", $category_id);
            if($stmt->execute()){
                $msg = "Category Has Been Updated.";
                $msgType = "success";
            
            ?>

            <div class="alert alert-<?php echo $msgType; ?> alert-dismissible fade show" role="alert">
                    <?php echo $msg; ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>

       <?php   
        }else {
            $msg = "Category was not succesfully updated " ;
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

    function dropdownCategories(){
        $conn = connect();
        $user_query  = $conn->prepare("SELECT categories_id, category_name FROM categories");
        $user_query->execute();
       
            while($row = $user_query->fetch(PDO::FETCH_ASSOC)){
                     $cat_id = $row['categories_id'];
                    $cat_name = $row['category_name'];
    
                     echo '<option value=" '. $cat_id .'" >'.$cat_name.'</option>';
            }
    }
}
