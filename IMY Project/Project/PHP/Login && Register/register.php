<?php
// See all errors and warnings
error_reporting(E_ALL);
ini_set('error_reporting', E_ALL);


include_once "config.php";

$name = htmlspecialchars($_POST["fname"]);
$surname = htmlspecialchars($_POST["lname"]);
$email = htmlspecialchars($_POST["email"]);
$date = htmlspecialchars($_POST["date"]);
$pass = htmlspecialchars($_POST["pass"]);
$pass = hash("sha512", $pass);
$contact = htmlspecialchars($_POST["contact"]);

$targetDir = "uploads/";
$filename = basename($_FILES['file']['name']);
$targetFilePath = $targetDir . $filename;
$fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath);
$query = "INSERT INTO tbusers (name, surname, email, birthday, password, filename,contact) VALUES ('$name', '$surname', '$email', '$date', '$pass','$filename','$contact')";

$res = mysqli_query($conn, $query) == TRUE;

?>

<!DOCTYPE html>
<html>

<head>
	<title>IMY 220 - Assignment 2</title>
	<meta charset="utf-8" />
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">
</head>

<body>
	<div class="container">
		<?php
		if ($res)
			echo '<div class="alert alert-primary mt-3" role="alert">
  						The account has been created
  					</div>';
		else
			echo '<div class="alert alert-danger mt-3" role="alert">
  						The account could not be created
  					</div>';
		?>
	</div>
</body>

</html>