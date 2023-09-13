<?php
require_once("../PhpConnections/connection.php");
//require_once('./');
Class Courses{

    //private $all_user = [];

    private $Day;
    private $Hour;
    
    private $Subjects;

    private $conn;

    function dropDownCourses(){
      $conn = connect();
      $Course_query  = $conn->prepare("SELECT * FROM `subjects`");
      $Course_query->execute();
      while($row = $Course_query->fetch(PDO::FETCH_ASSOC)){
        $Courses = $row['Name'] ;
        $CoursesId = $row['id'];

        
        
        echo '<option value=" '.$CoursesId.'" >'.htmlspecialchars($Courses).'</option>';

}
    }

    function tableCourses(){
      $conn = connect();
      $Course_query  = $conn->prepare("SELECT * FROM `subjects`");
      $Course_query->execute();
      while($row = $Course_query->fetch(PDO::FETCH_ASSOC)){
        $Courses = $row['Name'] ;
       
        
        echo '<option value=" '.$Courses.'" >'.$Courses.'</option>';

}
    }



}




?>