<?php
session_start() ; 
error_reporting(E_ALL);
ini_set('error_reporting', E_ALL);

$_SESSION['eventName'] = $_POST['eventName'] ; 
$_SESSION["eventDescription"] = $_POST['eventDescription']  ; 
 $_SESSION["eventDates"] = $_POST['eventDates'] ;

//IMAGE UPDATE

$targetDir = "../Login && Register/uploads/";
$filename = basename($_FILES['file']['name']);
$targetFilePath = $targetDir . $filename;
$fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath);
//*************************** */

include_once "config.php";

$user_id = htmlspecialchars($_SESSION["username"]);
$name = htmlspecialchars($_SESSION["eventName"]);
$description = htmlspecialchars($_SESSION["eventDescription"]);
$date = htmlspecialchars($_SESSION["eventDates"]);

$query = "INSERT INTO tbevents (user_id, name,description, date,filename) VALUES ('$user_id', '$name', '$description', '$date','$filename');";

$res = mysqli_query($conn, $query) == TRUE;
?>

<!DOCTYPE html>
<html>
<head>
    <title>Event Confirmation</title>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">
</head>
<body>
<div class="text-center">
    <?php
    if($res)
        echo '<div class="alert alert-primary mt-3 w-100 text-center" role="alert">
        <img src="../../IMAGES/EventfullText.svg" class="w-25"/><br/><b>The event has been created
  					</b></div>';
    else
        echo '<div class="alert alert-danger mt-3 w-50 text-center" role="alert">
        <img src="../../IMAGES/EventfullText.svg class="w-25" />The event could not be created
  					</div>';
    ?>
</div>
</body>
</html>