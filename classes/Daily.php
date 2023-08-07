<?php
require_once("./MyPhpConnections/connection.php");

Class Daily{

    //private $all_user = [];

    private $Day;
    private $Hour;
    
    private $Subjects;

    private $conn;
    
   function Daily(){
    $conn = connect();
    $Daily_query  = $conn->prepare("SELECT * FROM `Days_DB`");
    $Daily_query->execute();
    while($row = $Daily_query->fetch(PDO::FETCH_ASSOC)){
      $Dailys = $row['Name'] ;
      $DailysId = $row['ID'];
      
      echo '<option value=" '.$DailysId.'" >'.$Dailys.'</option>';

    }
}

function tableDaily(){
  $conn = connect();
  $Daily_query  = $conn->prepare("SELECT * FROM `Days_DB`");
  $Daily_query->execute();
  while($row = $Daily_query->fetch(PDO::FETCH_ASSOC)){
    $Dailys = $row['Name'] ;
    
    
    echo '<option value=" '.$Dailys.'" >'.$Dailys.'</option>';

  }
}


}


?>