<?php

require_once("../PhpConnections/connection.php");
        
if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $conn = connect();

    $student_id = $_POST['student_id'];
    $class_id = $_POST['class_id'];
    $subject_id = $_POST['subject_id'];
    $score = $_POST['score'];
    $exam_id = $_POST['exam_id'];



    $sql = "INSERT INTO `exam_score` (`exam_id`,`score`,`student_id`, `subject_id`, `class_id`) VALUES " . "( :ed, :sc, :sd, :si, :ci)";
    
    $stmt = $conn->prepare($sql); 
    $stmt->bindValue(":ed", $exam_id, PDO::PARAM_STR);
    $stmt->bindValue(":sc", $score, PDO::PARAM_STR);
    $stmt->bindValue(":sd", $student_id, PDO::PARAM_STR);
    $stmt->bindValue(":si", $subject_id, PDO::PARAM_STR);

    $stmt->bindValue(":ci", $class_id, PDO::PARAM_STR);
    if ($stmt->execute()) {
        echo "Score saved successfully.";
    } else {
        echo "Error saving score.";
    }
}
?>