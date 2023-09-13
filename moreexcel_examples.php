<?php 
require 'vendor/autoload.php';
require_once("PhpConnections/connection.php");

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

//Create an instance of Active worksheet
$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

$table_name = "learners_bds";
$sql = "DESCRIBE $table_name";

$conn = connect();
//$result = $conn->query($sql);
$result  = $conn->query($sql);
$result->execute();
$column_names = array();
while($row = $result->fetch(PDO::FETCH_ASSOC)){
    
    $column_names[] = $row["Field"];
  }

  echo "<br />";

  print_r($column_names);


//Set Headers
//$headers = ["header 1", "header 2", "header 2"];
//$sheet->fromArray([$column_names],NULL, 'A1');

// //Create a Writer
// $writer = new Xlsx($spreadsheet);

// //Define the outputfile
// $ouputfile = 'student.xlsx';

// // Save the Excel file to the local disk
// $writer->save($ouputfile);
// // Set headers for file download
// header('Content-Type: application/octet-stream');
// header('Content-Disposition: attachment;filename="' . basename($ouputfile) . '"');
// header('Cache-Control: max-age=0');

// // Send the file to the user's browser
// readfile($ouputfile);

// // Delete the temporary Excel file
// unlink($ouputfile);




// $activeWorksheet->setCellValue('A1', 'Hello World !');


// echo "SpreadSheet things";
// $writer = new Xlsx($spreadsheet);
// $writer->save('hello_world.xlsx');


?>