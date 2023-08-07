<?php
require_once("../PhpConnections/connection.php");

class Products
{

    // Please remember to remove $Stock_Purchase from this class and its methods including the Ui calling it
    function insertProducts($categories_id, $product_name, $description, $imageUrl, $imgName, $type, $Unit_Price, $Stock_Qty, $Stock_Purchase)
    {
        $conn = connect();

        // $created_At = date("Y-m-d H:i:s");
        // $modified_At = date("Y-m-d H:i:s");
        // $Is_Deleted = 0;

       
        
        $sql = "INSERT INTO `products_table` (`categories_id`,`product_name`,`description`,`imageUrl`,`imgName`,`type`, `Unit_Price`, `Stock_Qty`,`Stock_Purchase`) VALUES " . "(:cid, :pname,:desc,:img, :imgname,:typ,:uprice,:sqty,:spch)";

        

        try {
            //code...
            $stmt = $conn->prepare($sql);
            $stmt->bindValue(":cid", $categories_id);
        $stmt->bindValue(":pname", $product_name);
        $stmt->bindValue(":desc", $description);
        $stmt->bindValue(":img", $imageUrl);
        $stmt->bindValue(":imgname", $imgName);

        $stmt->bindValue(":typ", $type);
        $stmt->bindValue(":uprice", $Unit_Price);
        $stmt->bindValue(":sqty", $Stock_Qty);
        $stmt->bindValue(":spch", $Stock_Purchase);
        
       
       

        $stmt->execute();

        $num_rows = $stmt->rowCount();

     
        //$result = $stmt->fetchAll();
        if ($num_rows  > 0) {
            $msg = "New Product Has Been Created.";
          $msgType = "success";
          ?>
          <div class="alert alert-<?php echo $msgType; ?> alert-dismissible fade show" role="alert">
                    <?php echo $msg; ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
       <?php   
        }else {
            $msg = "Product was not created succesfully" ;
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

    function updateProducts($categories_id,$product_name, $description, $imageUrl, $imgName, $type, $Unit_Price, $Stock_Qty, $Stock_Purchase, $product_id){
        $conn = connect();

        $sql = "UPDATE products_table SET categories_id=:cid, product_name=:pname, description=:desc, imageUrl=:img, imgName=:iname, type =:typ, Unit_Price =:uprice,
        Stock_Qty =:sqty, Stock_Purchase =:spch  WHERE id=:id";

        try {
            //code...
            $stmt = $conn->prepare($sql);
            $stmt->bindValue(":cid", $categories_id);
            $stmt->bindValue(":pname", $product_name);
            $stmt->bindValue(":pname", $product_name);
            $stmt->bindValue(":desc", $description);
            $stmt->bindValue(":img", $imageUrl);
            $stmt->bindValue(":iname", $imgName);

            $stmt->bindValue(":typ", $type);
            $stmt->bindValue(":uprice", $Unit_Price);
            $stmt->bindValue(":sqty", $Stock_Qty);

            $stmt->bindValue(":spch", $Stock_Purchase);
            $stmt->bindValue(":sqty", $Stock_Qty);

            $stmt->bindValue(":id", $product_id);

            $stmt->execute();

            $num_rows = $stmt->rowCount();

            if ($num_rows  > 0) {
                $msg = " Product Has Been Updated.";
              $msgType = "success";
              ?>
              <div class="alert alert-<?php echo $msgType; ?> alert-dismissible fade show" role="alert">
                        <?php echo $msg; ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
           <?php   
            }else {
                $msg = "Product was not succesfully updated" ;
                $msgType = "warning";
                ?>
                  <div class="alert alert-<?php echo $msgType; ?> alert-dismissible fade show" role="alert">
                        <?php echo $msg; ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
             <?php   
              }
        }  catch (Exception $ex) {
            //throw $th;
            echo $ex->getMessage();
        }

    }

    function dropdownProducts(){
        $conn = connect();
        $user_query  = $conn->prepare("SELECT id, product_name FROM products_table");
        $user_query->execute();


        while($row = $user_query->fetch(PDO::FETCH_ASSOC)){
            $product_id = $row['id'];
           $product_name = $row['product_name'];

            echo '<option value=" '. $product_id .'" >'.$product_name.'</option>';
   }
    }

    function getPriceByProductId($productId){
        $conn = connect();
        
        $users_query  = $conn->query("SELECT  Unit_Price FROM products_table where id = '$productId'");
        $users_row = $users_query->fetch((PDO::FETCH_ASSOC));
        $product_price = $users_row['Unit_Price'];
        return $product_price;
   }
    }

