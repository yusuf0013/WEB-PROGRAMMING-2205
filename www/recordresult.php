<!DOCTYPE HTML>
<html>
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width,initial-scale=1">
   <link rel="stylesheet" type="text/css" href="../bootstrap-5.0.0-beta3-dist/css/bootstrap.min.css" />
   <link rel="stylesheet" type="text/css" href="../bootstrap-5.0.0-beta3-dist/css/bootstrap.css" />
   <title>Record Result</title>
<style>
body{
  background-color : whitesmoke;
}
label {
     font-weight:bold;
     font-size:17px;
     color:black;
 }
 .required{
color:red;
 }
 .link{
   text-decoration : none;
   color : black;
 }
</style>
</head>
<body>
<?php include 'header.php';
require 'connection.php'; 
$regnumber = $grade =  $course = $coursescore = $lecturerId = $semester = "";
$numberofcourse = $numberofstudent = "";
$courseunit = $gradepoint = $totalpoint = 0; 
$checkcourse = false;
function validate_input($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    $data = filter_var($data,FILTER_SANITIZE_STRING);
    return $data;
  }
 function calculate_grade($score){
      $grade = "";
      $gradepoint = 0;
      if($score >= 70){
        $grade = 'A';
      } 
      else if($score >= 60){
        $grade = 'B';
      } 
      else if($score >= 50){
        $grade = 'C';
      } 
      else if($score >= 45){
        $grade = 'D';
      } 
      else if($score >= 40 && $score < 45 ){
        $grade = 'E';
      } 
      else if($score >= 0 && $score < 40 ){
        $grade = 'F';
      }
      else{
        $grade = 'F'; 
      }
     return $grade;    
  }
  function getpoints($grade){
    $gradepoint = 0;
    if($grade === "A"){
        $gradepoint = 5;
    } 
    else if($grade === "B"){
        $gradepoint = 4;
    } 
    else if($grade === "C"){
        $gradepoint = 3;
    } 
    else if($grade === "D"){
        $gradepoint = 2;
    } 
    else if($grade === "E"){
        $gradepoint = 1;
    } 
    else if($grade === "F"){
        $gradepoint = 0;
    }
    else{
        $gradepoint = 0;
    }
   return $gradepoint;   
  }
  $lecturerId = validate_input($_POST["email"]);
  $numberofstudent = validate_input($_POST["numberofstudents"]);
  $numberofcourse = validate_input($_POST["numberofcourses"]);
  $semester = validate_input($_POST["semester"]);
  $totalunits = validate_input($_POST["totalunits"]);
$i = $j = 0;
 while($i < $numberofstudent){
  $regnumber  = validate_input($_POST["regnumber$i"]);
  for($j=0;$j<$numberofcourse;$j++){
    $coursescore = validate_input($_POST["score$j"]);
    $grade = calculate_grade($coursescore);
    $course  = validate_input($_POST["course$j"]);
    $courseunit = validate_input($_POST["courseunit$j"]);
    $gradepoint = getpoints($grade);
    $totalpoint = $courseunit * $gradepoint;
$sql = "INSERT INTO  results(Regno,Score,Grade,Course,Courseunit,Gradepoint,Tgradepoint,Semester,LecturerId)
VALUES ('$regnumber','$coursescore','$grade','$course','$courseunit','$gradepoint','$totalpoint','$semester','$lecturerId')";
if($connection->query($sql) === TRUE){
      $checkcourse = true;
    }
   } 
    $i++;
} 
 if($checkcourse != TRUE){
    echo   "<div class='row mb-3 mt-5'><div class='col-4'></div><div class='alert alert-danger' role='alert'>We are sorry something was went wronged</div><div class='col-4'></div></div>";
    echo $connection->error;   
 }
 $display = false;
 $regno = "";
 $totalgradepoint = $gpa = 0.0;
 $i = 1;
   $query = "SELECT * FROM results WHERE LecturerId = '$lecturerId'";
    $result = $connection->query($query);
    if($result->num_rows > 0){ 
      while($row = $result->fetch_assoc()){
        if($semester == $row['Semester']){
        $regno = $row['Regno'];
        $totalgradepoint = $totalgradepoint + floatval($row['Tgradepoint']);
        if($i%$numberofcourse == 0){
        $gpa = $totalgradepoint / $totalunits;
        $gpa = number_format($gpa,2);
        echo $gpa."<br>";
        $sqlquery = "INSERT INTO  gpa(Regno,Totalunits,Totalpoints,Gp,Semester,LecturerId)
        VALUES ('$regno','$totalunits','$totalgradepoint','$gpa',$semester,'$lecturerId')";
        $connection->query($sqlquery);
         $totalgradepoint = 0.0;
        }
        $i++;
      }
      $display = true;
      } 
    } 
    if ($display === true){
      ?>
        <div class="row mt-3">
    <div class="col-4"></div>
     <div class="col-4 mt-5">
       <a href="view.php" class="link">
              <h4 class="btn btn-success w-100">View Result<h4>
               </a>
          </div>
          <div class="row mt-3">
    <div class="col-4"></div>
     <div class="col-4 mt-5">
       <a href="index.php" class="link">
              <h4 class="btn btn-success w-100">Back<h4>
               </a>
          </div>
  <?php 
    }
?>
 
</body>
</html>