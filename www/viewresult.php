<!DOCTYPE HTML>
<html>
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width,initial-scale=1">
   <meta name="viewport" content="width=device-width,initial-scale=1">
   <link rel="stylesheet" type="text/css" href="../bootstrap-5.0.0-beta3-dist/css/bootstrap.min.css" />
   <link rel="stylesheet" type="text/css" href="../bootstrap-5.0.0-beta3-dist/css/bootstrap.css" />
   <title>View  Result</title>
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
<?php 
require 'connection.php';
function validate_input($data){
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  $data = filter_var($data,FILTER_SANITIZE_STRING);
  return $data;
}
$email = validate_input($_POST["email"]);
$semester = validate_input($_POST["semester"]);
$sql = "SELECT Email FROM users WHERE Email  = '$email'";
                          $result = $connection->query($sql);
                          $user = $result->fetch_assoc();
                          if($result->num_rows > 0){

?>
<div class="container-fluid">

                    <?php
                          $sql = "SELECT Schoolname,Semester,Level FROM schoolinformation  WHERE userId  = '$email'";
                          $result = $connection->query($sql);
                          $user = $result->fetch_assoc();
                          if($result->num_rows > 0){
                        echo " <div class='row mt-5 mb-0'>
                               <div class='col-4 mt-5'></div>
                               <div class='col-6'>
                               <h1>$user[Schoolname]</h1>
                               <h2>Result Level $user[Level] Semester $user[Semester]</h2>
                               </div>
                              <div class='col-2'></div></div>";
                     }
                  $sql = "SELECT * FROM results";
                  $result = $connection->query($sql);
                 ?>
                <table class="table table-responsive table-bordered mt-0">
                  <tr>
                    <th>SN</th>
                    <th>Regnumber</th>
                    <th>Grade</th>
                    <th>Course</th>
                 </tr>
                <?php 
                $j = 1;
                 if($result->num_rows > 0){ 
                    while($row = $result->fetch_assoc()){
                        if(($row['LecturerId'] ==  $email) && ($row['Semester'] == $semester)){
                       ?>
                      <tr><td>
                         <?php echo $j; ?>
                             </td><td>
                                <?php echo $row["Regno"]; ?>
                                </td><td>
                                <?php echo $row["Grade"]; ?>
                                </td>
                                <td class="Grade">
                                <?php echo $row["Course"]; ?></td>
                                </tr><br>
                               <?php 
                               $j++;
                                 }
                                }
                             }
                            ?>
                     </table>  
                   <div class="row mt-3 mb-3">
                      <div class="col-4"></div>
                      <div class="col-4">                     
                         <input class="btn btn-lg btn-primary btn-block" type="button" name="Print" value = "Print" onclick="Printpage();">
                          <a href="view.php"><input class="btn btn-lg btn-primary btn-block" type="button" name="Back" value = "Back"></a>
                      </div> 
                      <div class="col-4"></div> 
                      </div>
                 </div>
                 <script type="text/javascript">     
                   function Printpage() {   
                    var printContent = document.getElementsByTagName('body')[0];
                    var WinPrint = window.open('', '', 'width=700,height=650');
                    WinPrint.document.write(printContent.innerHTML);
                   WinPrint.document.close();
                  WinPrint.focus();
                   WinPrint.print();
                WinPrint.close();  
            }
       </script>
        <?php 
           }  
           else {
             ?>
             <div class="row mt-3 mb-3">
                         <div class="col-4"></div>
                         <div class="col-4"> 
                          <p>Sorry you don't have result in the database go back to home </p>                     
                            <a href="index.php"><input class="btn btn-lg btn-primary btn-block" type="button" name="Back" value = "Back"></a>
                         </div> 
                         <div class="col-4"></div> 
                    </div>
                    <?php 
           } 
   
         $connection->close();
              ?>
</body>
</html>