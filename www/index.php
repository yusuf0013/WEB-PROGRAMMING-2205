<!DOCTYPE HTML>
<html>
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width,initial-scale=1">
   <link rel="stylesheet" type="text/css" href="../bootstrap-5.0.0-beta3-dist/css/bootstrap.min.css" />
   <link rel="stylesheet" type="text/css" href="../bootstrap-5.0.0-beta3-dist/css/bootstrap.css" />
  
 <title>Home</title>
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
 $errormsg =   $numberofstudents = $numberofcourses = $password =   " ";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
function validate_input($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    $data = filter_var($data,FILTER_SANITIZE_STRING);
    return $data;
  }
  $numberofstudents  = validate_input($_POST["numberofstudents"]);
  $numberofcourses  = validate_input($_POST["numberofcourses"]);
  $password = validate_input($_POST["password"]);
  
}
 ?>
 <div class="container-fluid mt-10">
    <div class="row mx-0 mt-10">
    <div class="col-5"></div>
     <div class="col-4 mt-5">
       <div class="card col-6" style="width: 18rem;align:center" >
             <a href="user.php" class="link"> <h4 class="card-title text-center mt-2">Compute Result<h4> </a>
          </div>
    </div>
    <div class="col-4"></div>
   </div>


    <div class="row mx-0">
    <div class="col-5"></div>
     <div class="col-4 mt-5">
     <a>
     <div class="card col-6" style="width: 18rem;align:center" >
           <div class="card-body">
           <a href="view.php" class="link"><h4 class="card-title text-center">View Result<h4></a>
          </div>
          </a>
      </div>
      <div class="col-4"></div>
     </div>


     <div class="row mx-0">
    <div class="col-5"></div>
     <div class="col-4 mt-5">
     <a>
     <div class="card col-6" style="width: 18rem;align:center" >
           <div class="card-body">
           <a href="view.php" class="link"><h4 class="card-title text-center">Print Result<h4></a>
          </div>
          </a>
      </div>
      <div class="col-4"></div>
     </div>
 </div>
<div class="row mx-0">
    <div class="col-5"></div>
     <div class="col-4 mt-5">
     <a>
     <div class="card col-6" style="width: 18rem;align:center" >
      <div class="card-body">
           <a href="about.php" class="link"  ><h4 class="card-title text-center">About<h4></a>
          </div>
          </a>
      </div>
      <div class="col-4"></div>
     </div>
 </div>
</body>
</html>