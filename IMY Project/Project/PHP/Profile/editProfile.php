<?php
session_start();
include "config.php";
$sql = "SELECT * FROM tbusers WHERE email='$_SESSION[username]'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $_SESSION['date'] = $row["birthday"];
        $_SESSION['name'] = $row["name"];
        $_SESSION['surname'] = $row["surname"];
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
                <div class="col-md-4 mb-3">
                    <div class="card border border-dark" style="opacity:98%;">
                        <div class="card-header border-bottom border-dark"><img src="../../IMAGES/user_profile_banner.png" alt="" style="max-height:60px"></div>
                        <div class="card-body">
                            <div class="d-flex flex-column align-items-center text-center">
                                <img src="<?php echo $imageURL ?>" style="max-width:90%;max-height:90%" alt="" />
                                <div class="mt-3">
                                    <?php echo "<h4>" . $_SESSION['username'] . "</h4>
                                    <p class='text-secondary mb-1'>Full Stack Developer</p>
                                    <p class='text-muted font-size-sm'>" . $_SESSION['date'] . "</p>"; ?>
                                    <button class="btn btn-primary">Follow</button>
                                    <button class="btn btn-outline-primary">Message</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="col-md-8">
                    <div class="card mb-3 border border-dark" style="opacity:95%;background-color:#F0F8FF">
                        <div class="card-body">
                            <form action="updateFields.php" method="POST" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-sm-3 ">
                                        <h6 class='mb-0'>Full Name</h6>
                                    </div>
                                    <div class="col-sm-9">
                                        <input type="text" name="name" class="form-control float-right mr-3 w-50" style="border-top:none;border-left:1px solid #0000FF;border-right:1px solid #0000FF;border-bottom:1px solid #0000FF;background-color:white" value="<?php echo $_SESSION['name'] ?>">
                                    </div>

                                </div>
                        </div>
                        <hr style="border: 1px solid black;max-height:0px;background-color:black">
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Email</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <input type="text" name="email" class="form-control float-right mr-3 w-50" style="width:50%;border-top:none;border-left:1px solid #0000FF;border-right:1px solid #0000FF;border-bottom:1px solid #0000FF;background-color:white" value="<?php echo $_SESSION['username'] ?>">
                            </div>
                        </div>
                        <hr style="border: 1px solid orangered;max-height:0px;background-color:orangered">
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Phone</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <input type="text" name="contact" class="form-control float-right mr-3 w-50" style="width:50%;border-top:none;border-left:1px solid #0000FF;border-right:1px solid #0000FF;border-bottom:1px solid #0000FF;background-color:white;color:black" value="<?php echo $_SESSION['contact'] ?>">
                            </div>
                        </div>
                        <hr style="border: 1px solid black;max-height:0px;background-color:black">
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mt-2">Birthday</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                            <input type="date" id="regBirthDate" class="form-control float-right mr-3 w-50" name="date" value="<?php echo $_SESSION['contact'] ?>">
                              
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

                        <hr style="border: 1px solid orangered;max-height:0px;background-color:orangered">
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Profile Photo</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                            <input class="form-control float-right mr-3" type="file" name="file" value="" style="width: 50%"/>
                            </div>
                        </div>

                        <hr style="border: 1px solid black;max-height:0px;background-color:black">
                        <div class="row">
                       
                            <div class="col-sm-12 d-flex justify-content-center">
                                <button type="submit" class="form-control btn-primary w-50 m-3 ">Save</button>
                                <input type="button" onclick="window.location.href='user_profile.php';" class="btn w-50 offset-4 h-55 mt-3 mb-3 mr-2" style="background-color: orangered;color:white" value="Back To Profile" />
                                <input type="button" onclick="window.location.href='../Login && Register/logout.php';" class="btn w-50 h-55 mt-3 mb-3 mr-2" style="background-color: orangered;color:white" value="LogOut" />
                            </div>

                        </div>
                    </div>
                </div>






            </div>
        </div>

    </div>
    </div>

</body>

</html>