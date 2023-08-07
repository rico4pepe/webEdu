<?php
require_once("../PhpConnections/connection.php");
class Randomizer{

    
   function  generate_random_password($length = 10) {
    $alphabets = range('A','Z');
    $numbers = range('0','9');
    $additional_characters = array('_','.', '*', '}', '{', '^');
    $final_array = array_merge($numbers, $alphabets, $additional_characters);
         
    $password = '';
  
    while($length--) {
      $key = array_rand($final_array);
      $password .= $final_array[$key];
    }
  
    return $password;
  }

   function generate_uniqueId($length = 10) {
    $alphabets = range('A','Z');
    $numbers = range('0','9');
    //$additional_characters = array('_','.', '*', '}', '{', '^');
    $final_array = array_merge($numbers, $alphabets);
         
    $uniqueKey = '';
  
    while($length--) {
      $key = array_rand($final_array);
      $uniqueKey .= $final_array[$key];
    }
  
    return $uniqueKey;
  }

  function generate_staffid(){
    $conn = connect();
    $users_query  = $conn->query("SELECT company_name FROM `company_info`");
$users_row = $users_query ->fetch((PDO::FETCH_ASSOC));
$company_name = $users_row['company_name'];
$company_abbrv = substr($company_name, 0, 3);
$random_value = $this->generate_random_password(5);

$staffUniqueKey = $company_abbrv ."". date("Y"). "/" . date("m") . "/" .date("d") . "/" . $random_value;

return $staffUniqueKey;

}

}


?>