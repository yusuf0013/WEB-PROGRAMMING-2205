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

<div class="row">
<div class="col-4"></div>
<div class="col-4">
<form class ="mt-5">
          <div class="mb-3">
            <label for="courses" class="col-form-label">This web apps Student Grading System  was design
             and developed by YUSUF UMAR ABDULLAHI (UG19ICT1192)
             <table class="table table-responsive  mt-2">
                  <!-- <tr>
                    <th>SN</th>
                    <th>Name</th>
                    <th>Registration Number</th>
                 </tr> -->
                 <!-- <tbody>
                 <tr>
                 <td>1.</td>
                 <td>YUSUF UMAR ABDULLAHI</td>
                 <td>UG19ICT1192</td>
                 </tr>
                 
                 </tr>
                 </tbody>
                 </table> -->
             </label>
             <p>
          <a href="index.php"  class= "btn btn-success link">Back</a>
        </form>
        </div>
        <div class="col-4"></div>
        </div>
        </body>
</html>