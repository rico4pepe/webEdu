<?php 

if (! empty($_POST["product_id"])) {

   
    
    $product_id = $_POST["product_id"];

  
    
    require_once('../classes/Products.php');
    $productPrice = new Products();
    $prodPric = $productPrice->getPriceByProductId($product_id);

    echo "Hello  <br />";

    echo  $prodPric;

    $prodPriceArray = array();

     array_push($prodPriceArray, $prodPric);

   
     print_r($prodPriceArray);

    echo '<input type="text" class="form-control form-control-solid text-end" id= "price" name="price[]" placeholder="0.00" value="'.$prodPric.'" data-kt-element="price" disabled />';

    
}
?>

