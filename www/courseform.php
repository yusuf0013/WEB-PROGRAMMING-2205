<!DOCTYPE HTML>
<html>
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width,initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../bootstrap-5.0.0-beta3-dist/css/bootstrap.min.css" />
   <link rel="stylesheet" type="text/css" href="../bootstrap-5.0.0-beta3-dist/css/bootstrap.css" />
   <title>Compute Result</title>
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
</style>
</head>
<body>
<?php include 'header.php';
require 'connection.php';
 $email =   $numberofstudents = $numberofcourses =  " ";
 $checkuser =  false;
function validate_input($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    $data = filter_var($data,FILTER_SANITIZE_STRING);
    return $data;
  }
  $numberofstudents  = validate_input($_POST["numberofstudents"]);
  $numberofcourses  = validate_input($_POST["numberofcourses"]);
  $email = validate_input($_POST["email"]);
  $userId = $email;
  $stmt = $connection->prepare("INSERT INTO users(Email,Nocourses,Nostudents)
  VALUES (?,?,?)");
   $stmt->bind_param("sss",$email,$numberofcourses,$numberofstudents);
   if( $stmt->execute() === TRUE){
   $checkuser = true;
   }
    ?>
  <div class="container-fluid">
  <form  method="POST" action = "resultsheet.php">
          <div class="row mt-5 mb-3">
               <div class="col-4">
                  <label for="courses" class="col-form-label">Course Code <span class="required" >*</span></label>
               </div>
                <div class="col-4">
                <label for="courses" class="col-form-label">Course Title <span class="required" >*</span></label>
                 </div>
               <div class="col-4">
               <label for="courses" class="col-form-label">Course Credit Unit <span class="required" >*</span></label>
               </div>
            </div>
  <?php
  $i = 0;
  while($i < $numberofcourses){
      ?>
           <div class="row mb-2">
               <div class="col-4">
                 <input type="text" class="form-control" name="<?php echo "coursecode$i"; ?>" id="coursecode"  required autofocus>
               </div>
                <div class="col-4">
                <input type="text" class="form-control" name="<?php echo "coursetitle$i"; ?>" id="coursetitle" required autofocus>
                 </div>
               <div class="col-2">
               <input type="number" class="form-control" name="<?php echo "courseunit$i"; ?>" id="courseunit" min="1" max="10" required autofocus>
               </div>
            </div>  
        <?php
        $i++;
  } 
  ?>
  <div class="row">
  <div class="col-4">
  <label for="semester"class="col-form-label">Semester<span class="required" >*</span></label>
  <input type="number" name="semester" class="form-control">
  </div>
    <div class="col-4"></div>
    <div class="col-4"></div>
    </div>
   <input type="hidden" name="numberofcourses" value = "<?php echo $numberofcourses;?>">
   <input type="hidden" name="numberofstudent" value = "<?php echo $numberofstudents;?>">
   <input type="hidden" name="email" value = "<?php echo $email;?>">
     <div class="row mt-3">
      <div class="col-5"></div>
       <div class="col-4  ">
          <input  type="submit" name="btncomputeresult" class="btn btn-success w-25" value="Submit">
           <a href= "index.php" class="btn btn-success w-25">Back</a>
          </div>
          <div class="col-3"></div>
        </div>
   </form>
   </div>
</body>
</html>