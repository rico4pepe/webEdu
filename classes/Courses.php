<?php
require_once("./MyPhpConnections/connection.php");

Class Courses{

    //private $all_user = [];

    private $Day;
    private $Hour;
    
    private $Subjects;

    private $conn;

    function dropDownCourses(){
      $conn = connect();
      $Course_query  = $conn->prepare("SELECT * FROM `Subjects`");
      $Course_query->execute();
      while($row = $Course_query->fetch(PDO::FETCH_ASSOC)){
        $Courses = $row['Name'] ;
        $CoursesId = $row['ID'];
        
        echo '<option value=" '.$CoursesId.'" >'.$Courses.'</option>';

}
    }

    function tableCourses(){
      $conn = connect();
      $Course_query  = $conn->prepare("SELECT * FROM `Subjects`");
      $Course_query->execute();
      while($row = $Course_query->fetch(PDO::FETCH_ASSOC)){
        $Courses = $row['Name'] ;
       
        
        echo '<option value=" '.$Courses.'" >'.$Courses.'</option>';

}
    }



}


?>