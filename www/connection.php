<?php   
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "results";
$connection = new mysqli($servername, $username, $password, $dbname);
if ($connection->connect_error) {
    die("Connection failed !");
} 
    ?>