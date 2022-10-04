<?php
// Initialize the session
session_start();
include "config.php";
// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: ../../../index.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="icon" type="image/png" sizes="32x32" href="../Splash%20Page/favicon-32x32.png">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Bungee%20Shade">
    <link rel="stylesheet" type="text/css" href="../../CSS/SplashPage/splash.css" />
    <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
</head>
<style>
    body,
    html {
        height: 100%;
        margin: 0;
    }

    .bg {
        /* The image used */


        /* Full height */
        height: 100%;

        /* Center and scale the image nicely */
        background-position: center;
        background-size: cover;
    }
</style>

<body class="bg text-center">
    <form action='../Profile/user_profile.php' method='POST' enctype='multipart/form-data'>
        <input type="hidden" name="username" value="<?php echo (isset($_SESSION["username"])) ? $_SESSION["username"] : ''; ?>">
        <input type='submit' class='btn btn-primary mt-3' value='User Profile' name='submit'>
        <input type="button" onclick="window.location.href='../Global Page/globalFeed.php';" class='btn btn-primary mt-3' style="color:black;font-weight:bold" value="Explore" />

    </form>
    <form action='../ConnectFriends/friends.php' method='POST' enctype='multipart/form-data'>
        <input type="submit" name='account' style="background-color: orangered;font-weight:bold;" class='btn mt-3 mr-1 ' value="Connect with Friends" />

    </form>



    <img src="../../IMAGES/EventfullText.svg" class="w-25" />
    <h2>Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?>.</b> Here are all your events</h1>

        <div class="container text-center">
            <div class="row">

                <?php
                $sql0 = "SELECT * FROM friends WHERE ini_friend='$_SESSION[username]'";
                $result2 = mysqli_query($conn, $sql0);
                if (mysqli_num_rows($result2) > 0) {
                    // output data of each row

                    while ($row0 = mysqli_fetch_assoc($result2)) {
                        $sql = "SELECT * FROM tbevents WHERE user_id='$_SESSION[username]' OR user_id='" .$row0['acc_friend']. "' ORDER BY date DESC";

                        $result = mysqli_query($conn, $sql);

                        if (mysqli_num_rows($result) > 0) {
                            // output data of each row

                            while ($row = mysqli_fetch_assoc($result)) {

                                echo "<div class='text-center card float-left border border-dark p-4 ml-5 mt-3 col-3' style='width: 25%;' >
 <h2 class='card-header'> " .  $row["event_id"] .  "
                        <h2 style='font-size:30px'>" . $row["name"] .  "</h2>
  <img class='card-img-top ' alt='Card image cap' src='uploads/" . $row['filename'] . " '/>
  <div class='card-body'>
   <div style='font-size: 16px;font-weight: 30px'><b>Description</b> <br/>"  . $row['description'] . "   <br/> <p class='font-weight-bold'>Date: " . $row['date'] . "</p></div>

                </div>
</div>";
                            }
                        } else {
                            echo "<h1>No Events just yet, but don't worry, your time here will be Eventfull</h1>";
                        }
                    }
                }
                ?>

            </div>
        </div>
        <div class="row">
            <div class="card border m-5 ml-5 mr-5 text-center border-dark w-100">
                <div class="card-header">
                    <h2 style="font-size:30px">Create a New Event</h2>
                </div>
                <div class="card-body">
                    <form action='../Events/events.php' method='POST' enctype='multipart/form-data'>
                        <div class='form-group text-center'>

                            <input type='text' class='form-control text-center' name='eventName' placeholder="Event Name" style="border:0.5px solid #0000FF" /><br />


                            <input type='text' class='form-control text-center' name='eventDescription' placeholder="Event Description" style="border:0.5px solid #0000FF" /><br />


                            <input type='date' class='form-control text-center' name='eventDates' placeholder="Event Date" style="border:0.5px solid #0000FF" /><br />


                            <input type='file' class='form-control text-center p-1' name='file' style="border:0.5px solid #0000FF" /><br />

                            <input type='submit' class='btn btn-primary mt-3' value='Upload event' name='submit' />
                            <p>
                                <a href="logout.php" class="btn btn-danger mt-3">Logout</a>
                            </p>

                        </div>
                    </form>
                </div>
            </div>
        </div>




</body>

</html>
<?php
