
<?php

require_once("PhpConnections/connection.php");
require_once 'vendor/autoload.php';


$faker = Faker\Factory::create();

$conn = connect();



for ($i = 0; $i < 200; $i++) {
    // get a random digit, but always a new one, to avoid duplicates
    $payment_date= $faker->date();
   // $payment_dueDate = $faker->dateTimeBetween($startDate = '-30 years', $endDate = 'now');
    $whomTo = $faker->address();
    $description = $faker->text();


    $product_price = $faker->randomDigit();


    //$sql = "INSERT INTO `invoicepayment` (payment_date,  whomTo, description, product_price) VALUES " . "( :pd, :wt, :de, :pp)";
   

    
    try {
        //code...
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':pd', $payment_date);
        $stmt->bindValue(':wt', $whomTo);
        $stmt->bindValue(':de', $description);
        $stmt->bindValue(":pp", $product_price);
        $stmt->execute();
        $num_rows = $stmt->rowCount();
        if ($num_rows > 0) {
            echo "Query Succesful";
        }
    } catch (Exception $ex) {
        //throw $th;
        echo $ex->getMessage();
    }

}

?>