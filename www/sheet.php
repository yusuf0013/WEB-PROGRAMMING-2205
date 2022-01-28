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
$schoolname = $semester =  $userId = $email = $level = $numberofcourses = $numberofstudent =  " ";
$totalunits = 0;
function validate_input($data){
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  $data = filter_var($data,FILTER_SANITIZE_STRING);
  return $data;
}
$semester  = validate_input($_POST["semester"]);
$level  = validate_input($_POST["level"]);
$email  = validate_input($_POST["email"]);
$schoolname  = validate_input($_POST["schoolname"]);
$numberofcourses  = validate_input($_POST["numberofcourses"]);
$numberofstudent  = validate_input($_POST["numberofstudent"]);
 $userId  =  $email;

 $sql = $connection->prepare("INSERT INTO schoolinformation(Schoolname,Semester,Level,UserId)
 VALUES (?,?,?,?)");
 $sql->bind_param("ssss",$schoolname,$semester,$level,$userId);
  if($sql->execute() === TRUE ){
  }
  else{
    echo "<div class='row mt-5'><div class='col-4'></div><div class=' col-4 alert alert-danger' role='alert'>Successfully</div><div class='col-4'></div></div>";
  }
  
    echo " <div class='row mt-5 mb-5'>
    <div class='col-4 mt-5'></div>
    <div class='col-4'>
    <h1>$schoolname</h1>
    <h2>Result Level $level Semester $semester</h2>
    </div>
  <div class='col-4'></div></div>";
  $sql = "SELECT * FROM courses WHERE userId = '$email'";
  $result = $connection->query($sql);
  if($result->num_rows > 0){ 
  ?>
   <div class='container-fluid mt-10'><div class='row mt-10 '>
   <form method="post" action="recordresult.php">
   <table class="table table-responsive table-bordered mt-10">
                  <tr class="mb-3  mt-10">
                    <th class="col-1">SN</th>
                    <th class="col-2">Reg Number</th>
  <?php
  $k = 0;
    while($row = $result->fetch_assoc()){
     if($semester == $row['Semester']){
             echo "<th class='col-2'>$row[CourseCode]</th>";
             echo "<input type='hidden'name='course$k' value='$row[CourseCode]'>";
             echo "<input type='hidden'name='courseunit$k' value='$row[CourseUnit]'>";
             $totalunits = $totalunits + $row['CourseUnit'];
              $k++;
      }
    }
    echo "</tr>";
   }
   else{
       echo "No  data in the database";
       echo "<a href='index.php' class='btn btn primary'>Back to Home </a> ";
   }
   $i = $j = 0;
   $sn = 1;
  while($i <$numberofstudent ){
    echo "<tr><td>$sn</td><td><input type='text' name='regnumber$i' required>";
    for($j=0;$j<$numberofcourses;$j++){
     echo "<td class='col-1'><input type='number' min='0' max='100' name='score$j' required></td>";
    } 
    echo "</tr>";
    $i++;
    $sn++;
  }
  echo "<table>
     <div class='row mb-3'>
    <div class='col-4'></div>
    <div class='col-4'>
    <input type='hidden' name='email' value='$email'>
    <input type='hidden' name='semester' value='$semester'>
    <input type='hidden' name='numberofstudents' value='$numberofstudent'>
    <input type='hidden' name='numberofcourses' value='$numberofcourses'>
    <input type='hidden' name='totalunits' value='$totalunits'>
    <input type='submit' class='btn btn-primary mt-3' value='Compute Result'>
    </div>
    <div class='col-4'>
    <a href='index.php' class='btn btn-primary mt-3'>Home</a></div>
    </div>
  </form>
  <div> ";
  ?>
  <script src="/www/bootstrap-5.0.0-beta3-dist/js/bootstrap.js"></script>
</body>
</html>