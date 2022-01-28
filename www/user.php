<!DOCTYPE HTML>
<html>
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width,initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../bootstrap-5.0.0-beta3-dist/css/bootstrap.min.css" />
   <link rel="stylesheet" type="text/css" href="../bootstrap-5.0.0-beta3-dist/css/bootstrap.css" />
   <title>user form</title>
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
   color: black;
 }
</style>
</head>
<body>
<?php include 'header.php';
 ?>
 <form method="POST"  class="mt-5" action = "courseform.php">
        <div class="row">
        <div class="col-4"></div>
          <div class=" col-4 mb-3">
            <label for="courses" class="col-form-label">Number of Courses <span class="required" >*</span></label>
            <input type="number" class="form-control" name="numberofcourses" id="numberofcourses" min="1" max="20" required autofocus>
          </div>
          <div class="col-4"></div>
          </div>
          <div class="row">
         
          <div class="col-4"></div>
          <div class=" col-4 mb-3">
            <label for="numberofstudents" class="col-form-label">Number of Students <span class="required" >*</span></label>
            <input type="number" class="form-control" name="numberofstudents" id="numberofstudents" min="1" max="1000000" required autofocus>
          </div>
          <div class="col-4"></div>
          </div>
          <div class="row">
          <div class="col-4"></div>
          <div class=" col-4 mb-3">
            <label for="Email" class="col-form-label">Email <span class="required" >*</span></label>
            <input type="email" class="form-control" name="email" id="email" required  autofocus>
          </div>
          <div class="col-4"></div>
          </div>
          <div class="row">
          <div class="col-4"></div>
          <div class=" col-4 mb-3">
          <input  type="submit" name="btncomputeresult" class="btn btn-success" value="Submit">
          <a href="index.php"  class= "btn btn-success link">Back</a>
          </div>
          <div class="col-4"></div>
          </div>
        </form>
</body>
</html>