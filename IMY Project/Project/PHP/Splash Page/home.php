<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Bungee%20Shade">
    <link rel="stylesheet" type="text/css" href="../CSS/SplashPage/splash.css" />
</head>

<body>
    <h1 class="my-5">Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Welcome to our site.</h1>
    <p>
        <a href="logout.php" class="btn btn-danger ml-3">Logout</a>
    </p>
    <div class="container ">
        <div class="card bg-dark" style="background: 70%">
            <div class="card-body">
                <form action='login.php' method='POST' enctype='multipart/form-data'>
                    <div class='form-group'>

                        <label for='eventName' style="font-family: Bungee Shade;font-size:25px;color:white">Event Name:</label><br>
                        <input type='text' class='form-control  bg-light border' name='eventName' /><br>

                        <label for='eventDescription' style="font-family: Bungee Shade;font-size:25px;color:white">Event Description:</label><br>
                        <input type='text' class='form-control  bg-light border' name='eventDescription' /><br>

                        <label for='eventDate' style="font-family: Bungee Shade;font-size:25px; color:white">Event date:</label><br>
                        <input type='date' class='form-control bg-light border' name='eventDate' /><br>
                        
                        <label for='sunmit' style="font-family: Bungee Shade;font-size:25px; color:white">Event Poster:</label><br>
                        <input type='file' class='form-control  bg-light border' name='picToUpload[]' id='picToUpload' multiple='multiple' /><br />
                        <input type='submit' class='btn btn-primary' value='Upload event' name='submit' />

                     

                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>