<!DOCTYPE HTML>
<html>
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width,initial-scale=1">
   <link rel="stylesheet" type="text/css" href="../bootstrap-5.0.0-beta3-dist/css/bootstrap.min.css" />
   <link rel="stylesheet" type="text/css" href="../bootstrap-5.0.0-beta3-dist/css/bootstrap.css" />
    <title>View</title>
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
<?php include 'header.php';?>
<div class="container-fluid mt-10">
<div class="row mx-0 mt-10">
<div class="col-5"></div>
 <div class="col-4 mt-5">
   <div class="card col-6" style="width: 18rem;align:center"  >
         <a href="grade.php" class="link"> <h4 class="card-title text-center mt-2">View Grades<h4> </a>
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
           <a  href="gpa.php" class="link"><h4 class="card-title text-center">View  GPA <h4></a>
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
           <a href="index.php" class="link"><h4 class="card-title text-center">Back<h4></a>
          </div>
          </a>
      </div>
      <div class="col-4"></div>
     </div>
 </div>
 <div class="modal fade" id="viewgrade" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-success">
        <h4 class="modal-title" id="ModalLabel">View Grade and Print</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="POST" action = "viewresult.php">
          <div class="mb-3">
            <label for="email" class="col-form-label">Email <span class="required" >*</span></label>
            <input type="text" class="form-control" name="email" id="email"  required autofocus>
          </div>
          <div class="mb-3">
            <label for="semester" class="col-form-label">Semester <span class="required" >*</span></label>
            <input type="number" class="form-control" name="semester" id="semester" min="1" max="2" required autofocus>
          </div>
          <div class="mb-3">
          <input  type="submit" name="btncomputeresult" class="btn btn-success" value="Submit">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="viewpoint" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-success">
        <h4 class="modal-title" id="ModalLabel">View Grade Point and Print</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="POST" action = "viewpoint.php">
          <div class="mb-3">
            <label for="email" class="col-form-label">Email <span class="required" >*</span></label>
            <input type="text" class="form-control" name="email" id="email"  required autofocus>
          </div>
          <div class="mb-3">
            <label for="semester" class="col-form-label">Semester <span class="required" >*</span></label>
            <input type="number" class="form-control" name="semester" id="semester" min="1" max="2" required autofocus>
          </div>
          <div class="mb-3">
          <input  type="submit" name="btncomputeresult" class="btn btn-success" value="Submit">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<script src="/www/bootstrap-5.0.0-beta3-dist/js/bootstrap.js"></script>
</body>
</html>