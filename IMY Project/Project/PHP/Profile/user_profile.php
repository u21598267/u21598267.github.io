<?php
session_start();
$sql = "SELECT * FROM tbusers WHERE email='$_SESSION[username]'";
if (isset($_SESSION['acc_friend'])) {
    $_SESSION['username'] = $_SESSION['acc_friend'];
}
if ($_SESSION == null) {
    $_SESSION['username'] = $_POST['username'];
}

include "config.php";
$sql = "SELECT * FROM tbusers WHERE email='$_SESSION[username]'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $_SESSION['date'] = $row["birthday"];
        $_SESSION['name'] = $row["name"];
        //  $surname = $row["surname"];
        $filename = $row["filename"];
        $imageURL = '../Login%20&&%20Register/uploads/' . $row["filename"];
        $_SESSION['contact'] = $row['contact'];
        $user_id = $row['user_id'];
    }
}
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../CSS/user_profile.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">
    <title>User Profile</title>
</head>
<style>
    body,
    html {
        height: 100%;
        margin: 0;
    }

    .bg {
        /* The image used */
        background-image: url("../../IMAGES/EventfullText.svg");

        /* Full height */
        height: 100%;

        /* Center and scale the image nicely */
        background-position: center;
        background-size: cover;
    }
</style>

<body class="bg text-center">

    <div class="container" style="display:flex;justify-content: center;align-items: center;text-align: center;min-height: 100vh;">

        <div class="main-body">



            <div class="row gutters-sm">
                <div class="col-md-4 mb-0">
                    <div class="card border border-dark" style="opacity:98%;">
                        <div class="card-header border-bottom border-dark"><img src="../../IMAGES/user_profile_banner.png" alt="" style="max-height:60px"></div>
                        <div class="card-body">
                            <div class="d-flex flex-column align-items-center text-center">
                                <img src="<?php echo $imageURL ?>" style="max-width:90%;max-height:90%" alt="" />
                                <div class="mt-3">
                                    <?php echo "<h4>" . $_SESSION['username'] . "</h4>
                                    <p class='text-secondary mb-1'>Full Stack Developer</p>
                                    <p class='text-muted font-size-sm'>" . $_SESSION['date'] . "</p>"; ?>
                                    <form action="../ConnectFriends/removeFriend.php" method="POST">
                                     
                                        <input type="hidden" name='ini_name' value='<?php echo $_SESSION['temp'];?>' />
                                        <input type="hidden" name="acc_name" value='<?php echo $_SESSION['username'];?>' />
                                        <button class="btn btn-success" type="submit">Friends</button>
                                    </form>
                                    <button class="btn btn-outline-primary">Message</button>

                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-md-8">
                    <div class="card mb-3 border border-dark" style="opacity:95%;background-color:#F0F8FF">
                        <div class="card-body" p-0>
                            <div class="row p-0 ">
                                <div class="col-sm-3 ">
                                    <h6 class='mb-0'>Full Name</h6>
                                </div>
                                <?php echo "  <div class='col-sm-9 ' style='color:#2F4F4F'>" . $_SESSION['name'] ?>
                            </div>
                        </div>
                        <hr style="border: 1px solid black;max-height:0px;background-color:black">
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Email</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <?php echo $_SESSION['username']; ?>
                            </div>
                        </div>
                        <hr style="border: 1px solid orangered;max-height:0px;background-color:orangered">
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Phone</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <?php echo  $_SESSION['contact']  ?>
                            </div>
                        </div>
                        <hr style="border: 1px solid black;max-height:0px;background-color:black">
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Birthday</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <?php echo $_SESSION['date'] ?>
                            </div>
                        </div>
                        <hr style="border: 1px solid orangered;max-height:0px;background-color:orangered">
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">User ID</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <?php echo $user_id ?>
                            </div>
                        </div>
                        <hr style="border: 1px solid black;max-height:0px;background-color:black">
                        <div class="row">
                            <div class="col-sm-12 w-100">
                                <form action="editProfile.php" method="post">
                                    <input type="hidden" name="username" id="hiddenField" value="<?php echo $_SESSION['username'] ?>" />
                                    <?php if (!isset($_SESSION['acc_friend']))
                                        echo '<a class="btn btn-primary" type="submit" target="__blank" href="editProfile.php">Edit</a>
                                    
                                    <a href="../Login && Register/logout.php" class="btn" style="background-color: orangered;color:white">Logout</a>'
                                    ?>
                                    <a href="../Login && Register/home.php" class="btn" style="background-color: orangered;color:white">Back To Home Page</a>

                            </div>
                        </div>
                    </div>
                </div>





            </div>
        </div>

    </div>

    </div>
    <div class="col-12 text-center">
        <h2>Your Eventful feed :)</h2>
    </div>
    <?php
    $sql = "SELECT * FROM tbevents WHERE user_id='$_SESSION[username]' ORDER BY date DESC";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        // output data of each row

        while ($row = mysqli_fetch_assoc($result)) {

            echo "<div class='text-center card float-left border border-dark p-4 ml-5 mt-3 col-3' style='width: 25%;' >
 <h2 class='card-header'> " .  $row["event_id"] .  "
                        <h2 style='font-size:30px'>" . $row["name"] .  "</h2>
  <img class='card-img-top ' alt='Card image cap' src='../Login && Register/uploads/" . $row['filename'] . " '/>
  <div class='card-body'>
   <div style='font-size: 16px;font-weight: 30px'><b>Description</b> <br/>"  . $row['description'] . "   <br/> <p class='font-weight-bold'>Date: " . $row['date'] . "</p></div>

                </div>
</div>";
        }
    } else {
        echo "<h1>No Events just yet, but don't worry, your time here will be Eventfull</h1>";
    }
   


if(isset($_SESSION['acc_friend']))
{
    $sql3 = "SELECT * FROM friends WHERE ini_friend='$_SESSION[acc_friend]'";

    $result3 = mysqli_query($conn, $sql3);
echo "<h2>Friends</h2>";
    if (mysqli_num_rows($result3) > 0) {
        // output data of each row

        while ($row = mysqli_fetch_assoc($result3)) {

            echo "<div class='text-center card card-body float-left border border-dark ml-5 mt-3 col-5' style='width: 50%;height:15%' >
<h2 class='card-header mb-5'> " .  $row["acc_friend"] .  "</h2>
   
</div>";
        }
    }
}
    if (isset($_SESSION['acc_friend'])) {
        $_SESSION['username'] = $_SESSION['temp'];
        $_SESSION['acc_friend'] = null;
    }
    ?>
</body>

</html>
<!--
<a class="btn btn-primary" target="__blank" href="https://www.bootdey.com/snippets/view/profile-edit-data-and-skills">Edit</a>
                            