<?php
// See all errors and warnings
error_reporting(E_ALL);
ini_set('error_reporting', E_ALL);


include_once "config.php";

$one = htmlspecialchars($_POST["ini_name"]);
$two = htmlspecialchars($_POST["acc_name"]);

$query = "INSERT INTO friends (ini_friend,acc_friend) VALUES ('$one', '$two')";

if($res = mysqli_query($conn, $query) == TRUE){
    $query = "INSERT INTO friends (ini_friend,acc_friend) VALUES ('$two', '$one')";
    mysqli_query($conn, $query);

    echo '<div class="alert alert-primary mt-3 w-100 text-center" role="alert">
    <img src="../../IMAGES/EventfullText.svg" class="w-25"/><br/><b>Friend succesfully added. Let us get the party started.
                  </b></div>';
}
echo '<a href="../Login && Register/home.php" class="btn" style="background-color: orangered;color:white">Back To Home Page</a>
'
?>

<!DOCTYPE html>
<html>

<head>
	<title>Friends</title>
	<meta charset="utf-8" />
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">
</head>

<body>
	
</body>

</html>