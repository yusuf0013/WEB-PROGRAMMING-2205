<!DOCTYPE HTML>
<html>
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width,initial-scale=1">
   <link rel="stylesheet" type="text/css" href="../bootstrap-5.0.0-beta3-dist/css/bootstrap.min.css" />
   <link rel="stylesheet" type="text/css" href="../bootstrap-5.0.0-beta3-dist/css/bootstrap.css" />
   <title>Result Sheet</title>
<style>
body{
  background-color : whitesmoke;
}
.card{
    box-shadow: 3px 3px 3px 3px grey;
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
$coursecodes = $coursetitles = $courseunits = $userId = $numberofcourses = $numberofstudent =  " ";
$checkcourse = false;
$errormsg  = "";
function validate_input($data){
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  $data = filter_var($data,FILTER_SANITIZE_STRING);
  return $data;
}
$email = validate_input($_POST["email"]);
$semester = validate_input($_POST["semester"]);
$userId  =  $email;
$numberofcourses  = validate_input($_POST["numberofcourses"]);
$numberofstudent  = validate_input($_POST["numberofstudent"]);
 $sql = $connection->prepare("INSERT INTO courses(CourseCode,CourseTitle,CourseUnit,Semester,UserId)
 VALUES (?,?,?,?,?)");
$i = 0;
while($i < $numberofcourses){
     $coursecodes  = validate_input($_POST["coursecode$i"]);
     $coursetitles  = validate_input($_POST["coursetitle$i"]);
     $courseunits   = validate_input($_POST["courseunit$i"]);
    $sql->bind_param("sssss",$coursecodes,$coursetitles,$courseunits,$semester,$userId);
    if($sql->execute() === TRUE ){
      $checkcourse = true;
     }
    $i++;
} 
 if( $checkcourse != TRUE){
    $errormsg =  "<div class='row mb-3 mt-5'><div class='col-4'></div><div class='alert alert-danger' role='alert'>We are sorry something was went wronged</div><div class='col-4'></div></div>";   
 }
  ?>
  <div class="container-fluid mt-10">
   <?php  echo $errormsg;
   ?> 
    <div class="row mt-10">
    <div class="col-4"></div>
     <div class="col-4 mt-5">
       <form action="viewresultsheet.php" method="POST">
          <input type="hidden" name="email" value = "<?php echo $email;?>">
          <input type="hidden" name="numberofcourses" value = "<?php echo $numberofcourses;?>">
          <input type="hidden" name="numberofstudent" value = "<?php echo $numberofstudent;?>">
             <input  type="submit" name="btnresultsheet" class="btn btn-success w-100" value="Result Sheet">
            </form>
          </div>
     </div>
     <div class="row mt-3">
    <div class="col-4"></div>
     <div class="col-4 mt-5">
       <a href="index.php" class="link">
              <h4 class="btn btn-success w-100">Back<h4>
               </a>
          </div>
 </div>
</body>
</html>