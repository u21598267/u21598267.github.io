<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../../CSS/Connect Friends/friends.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Find Friends</title>
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
<body class="container  bg text-center">
<img src="../../IMAGES/EventfullText.svg" class="w-25" />
    <form action='friends.php' class="mt-5" method='POST' enctype='multipart/form-data'>
        <input type="text" placeholder="Enter Username..." name="account" />
        <input type="submit" value="Submit" style="background-color: orangered;font-weight:bold;" class='btn mr-1 '>
        <input type="button" onclick="window.location.href='../Login && Register/home.php';" style="background-color: orangered;font-weight:bold;" class='btn mr-1 ' value="Home Page" />

    </form>

</body>

</html>

<?php

session_start();
include "config.php";
$_SESSION['account'] = $_POST['account'] ; 
if ($_SESSION['account'] == null) {
    echo $_SESSION['account'] ; 
}

$sql = "SELECT * FROM tbusers WHERE (email LIKE '%" . $_SESSION['account'] . "%')";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row

    while ($row = mysqli_fetch_assoc($result)) {
        $sql2 = "SELECT * FROM friends WHERE acc_friend='" . $row['email'] . "' ";
        $result2 = mysqli_query($conn, $sql2);

        if (mysqli_num_rows($result2) == 0) {
            echo "<form action='addFriend.php' class='mt-5' method='POST' enctype='multipart/form-data'><div class='text-center card float-left border border-dark p-1 ml-5 mt-3 col-3' style='width: 30%;' >
 <h2 class='card-header'> <img class='card-img-top ' alt='Card image cap' src='../Login && Register/uploads/" . $row['filename']  . " '/>" . $row["name"] . " "  . $row['surname'] . "<div class='card-body' style='font-size:15px'> <p>" . $row['email'] . "</p><button class='btn btn-primary' type='submit'>Add Friend</button><input type='hidden' name='ini_name' value='" . $_SESSION['username'] . "'/><input type='hidden' name='acc_name' value='" . $row['email'] . "'/></div></form>";
        } else {
$_SESSION['temp'] = $_SESSION['username'] ; 
$_SESSION['acc_friend'] = $row['email'];
            echo "<form action='removeFriend.php' class='mt-5' method='POST' enctype='multipart/form-data'><div class='text-center card float-left border border-dark p-1 ml-5 mt-3 col-3' style='width: 30%;' >
                <h2 class='card-header'> <img class='card-img-top ' alt='Card image cap' src='../Login && Register/uploads/" . $row['filename']  . " '/>" . $row["name"] . " "  . $row['surname'] . "</h2><div class='card-body' style='font-size:25px'> <p>" . $row['email'] . "</p><button class='btn btn-success mr-1' type='submit'>Friends!</button><input type='hidden'  name='ini_name' value='" . $_SESSION['username'] . "'/><input type='hidden' name='acc_name' value='" . $row['email'] . "
                '/><a href='../Profile/user_profile.php';' class='btn btn-outline-primary mt-1' >View Profile</a></div></form>
                <form action='../MessageFriend/chat.php' class='mt-5' method='POST' enctype='multipart/form-data'><input type='hidden' name='ini_name' value='" . $_SESSION['username'] . "'/><input type='hidden' name='acc_name' value='" . $row['email'] . "'/><input type='submit' class='btn btn-primary mt-1' value='Slide into those DMs' name='submit'/></form>";
        }
    }
} else {
    echo "<h1>No users found</h1>";
}

?>
