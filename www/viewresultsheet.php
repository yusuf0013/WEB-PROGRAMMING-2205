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
function validate_input($data){
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  $data = filter_var($data,FILTER_SANITIZE_STRING);
  return $data;
}
$email = $numberofcourses = $numberofstudent = "";
$email = validate_input($_POST["email"]);
$numberofcourses  = validate_input($_POST["numberofcourses"]);
$numberofstudent  = validate_input($_POST["numberofstudent"]);
?>
<form method="POST" action = "sheet.php" class="mt-5">
      
<div class="row">
          <div class="col-4"></div>
          <div class=" col-4 mb-3">
          <label for="school" class="col-form-label">School Name<span class="required" >*</span></label>
            <input type="text" class="form-control" name="schoolname" id="schoolname"  required autofocus>
          </div>
          <div class="col-4"></div>
          </div>
       <div class="row">
          <div class="col-4"></div>
          <div class=" col-4 mb-3">
          <label for="level" class="col-form-label">Level<span class="required" >*</span></label>
            <input type="number" class="form-control" name="level" id="level"  min = "1" max ="7" required autofocus>
          </div>
          <div class="col-4"></div>
          </div>
          <div class="row">
          <div class="col-4"></div>
          <div class=" col-4 mb-3">
          <label for="semester" class="col-form-label">Semester <span class="required" >*</span></label>
            <input type="number" class="form-control" name="semester" id="semester" min="1" max="2" required autofocus>
          </div>
          <div class="col-4"></div>
          </div>
          <input type="hidden" name="email" value = "<?php echo $email;?>">
          <input type="hidden" name="numberofcourses" value = "<?php echo $numberofcourses;?>">
          <input type="hidden" name="numberofstudent" value = "<?php echo $numberofstudent;?>">
          <div class="row">
          <div class="col-4"></div>
          <div class=" col-4 mb-3">
          <input  type="submit" name="btnresultsheet" class="btn btn-success" value="Submit">
          </div>
          <div class="col-4"></div>
          </div>
        </form>
</body>
</html>