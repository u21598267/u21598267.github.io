<?php

 
/* Attempt to connect to MySQL database */
$conn = mysqli_connect("localhost","u21598267", "bzeuxprx", "u21598267");
 
// Check connection
if($conn === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>