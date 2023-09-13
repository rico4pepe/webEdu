<?php
require_once("../PhpConnections/connection.php");

Class Facilitators{

    //private $all_user = [];

    private $Day;
    private $Hour;
    
    private $Subjects;

    private $conn;


   function facilitators(){

       $conn = connect();
    $user_query  = $conn->prepare("SELECT * FROM staff_db");
    $user_query->execute();
   
        while($row = $user_query->fetch(PDO::FETCH_ASSOC)){
                 $users = $row['First_Name'] . " " . $row['Sur_Name'];
                 $userId = $row['staff_ID'];

                 echo '<option value=" '.$userId.'" >'.$users.'</option>';
        }
    }

    function dropDown_faciltators(){

        $conn = connect();
     $user_query  = $conn->prepare("SELECT * FROM staff_db");
     $user_query->execute();
    
         while($row = $user_query->fetch(PDO::FETCH_ASSOC)){
                  $users = $row['First_Name'] . " " . $row['Sur_Name'];
             
 
                  echo '<option value=" '. $users .'" >'.$users.'</option>';
         }
     }
 

    

    

    


// function Dailys(){
//     $conn = connect();
//     $Daily_query  = $conn->prepare("SELECT * FROM `Days_DB`");
//     $Daily_query->execute();
//     while($row = $Daily_query->fetch(PDO::FETCH_ASSOC)){
//       $Dailys = $row['Name'] ;
//       $DailysId = $row['ID'];
      
//       echo '<option value=" '.$DailysId.'" >'.$Dailys.'</option>';

//     }
// }

//     function Customers(){

//         $conn = connect();
//         $user_query1  = $conn->query("SELECT COUNT(*) as all_customer FROM users WHERE is_permission = '4'");
//         $user_row1 = $user_query1->fetch((PDO::FETCH_ASSOC));
//         $this->all_customer  = $user_row1['all_customer'];

//         return $this->all_customer;

//      }

//      function Category(){

//         $conn = connect();
//         $user_query2  = $conn->query("SELECT COUNT(*) as all_category FROM `Categorys`");
//         $user_row2 = $user_query2->fetch((PDO::FETCH_ASSOC));
//         $this->category  = $user_row2['all_category'];
//         return $this->category;

//      }

//      function Product(){

//       $conn = connect();
//       $user_query2  = $conn->query("SELECT COUNT(*) as all_product FROM `Products`");
//       $user_row2 = $user_query2->fetch((PDO::FETCH_ASSOC));
//       $this->products  = $user_row2['all_product'];
//       return $this->products;

//    }

//    function Transaction(){

//       $conn = connect();
//       $user_query2  = $conn->query("SELECT COUNT(*) as all_transaction FROM `transactions`");
//       $user_row2 = $user_query2->fetch((PDO::FETCH_ASSOC));
//       $this->transaction  = $user_row2['all_transaction'];
//       return $this->transaction;

//    }

//    function Elearning(){
//       $conn = connect();
//       $user_query2  = $conn->query("SELECT COUNT(*) as all_learn FROM `elearnings`");
//       $user_row2 = $user_query2->fetch((PDO::FETCH_ASSOC));
//       $this->learning  = $user_row2['all_learn'];

//       return $this->learning;

//    }
   
//     function Permission($user_role){

//       $conn = connect();
//       $user_query2  = $conn->query("SELECT * FROM `user_permission` where user_role = $user_role");
//       $user_row2 = $user_query2->fetch((PDO::FETCH_ASSOC));
//       $this->create  = array("create" =>$user_row2['generate']);
//       $this->edit  = array ("edit" => $user_row2['edit']);
//       $this->read  =  array ("view" => $user_row2['view']);
//       $this->delete  =  array ("delete" => $user_row2['remove']);
//       array_push($this->rolesArray, $this->create, $this->edit, $this->read, $this->delete);
      
//       return $this->rolesArray; 

//    }

}
