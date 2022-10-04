<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Splash Page</title>


    <link rel="icon" type="image/png" sizes="32x32" href="Project/PHP/Splash%20Page/favicon-32x32.png">


    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Silkscreen">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="Project/CSS/SplashPage/splash.css" />
</head>

<body class="page-holder bg-cover">
    <div class=" ml-5 py-3" style="width: 85%">
        <header class="text-center text-white ">

            <svg viewbox="0 0 100 20">
                <defs>
                    <linearGradient id="gradient">
                        <stop color="#000" />
                    </linearGradient>
                    <pattern id="wave" x="0" y="-0.5" width="80%" height="80%" patternUnits="userSpaceOnUse">
                        <path id="wavePath" d="M-40 9 Q-30 7 -20 9 T0 9 T20 9 T40 9 T60 9 T80 9 T100 9 T120 9 V20 H-40z" mask="url(#mask)" fill="url(#gradient)">
                            <animateTransform attributeName="transform" begin="0s" dur="1.5s" type="translate" from="0,0" to="40,0" repeatCount="indefinite" />
                        </path>
                    </pattern>
                </defs>
                <text text-anchor="middle" x="50" y="14" font-size="8" fill="url(#wave)" fill-opacity="1">WhiteBoard ClickDown</text>

            </svg>
        </header>

    </div>

    <div class="row">
        <div class="col-lg-4">
            <div class="card mt-2 ml-5 mr-4 p-3" style="border-radius:15px ;opacity: 70%;background-color: black;">

                <h2 class="card-header">Login</h2>
                <br />

                <p class="card-body" style="font-family: 'Silkscreen';color:azure;font-size: 25px;">Please fill in your credentials to login.</p>

                <?php
                if (!empty($login_err)) {
                    echo '<div class="alert alert-danger">' . $login_err . '</div>';
                }
                ?>

                <form action="Project/PHP/Login%20&&%20Register/login.php" method="post">
                    <div class="form-group">
                        <label style="color: white;font-size: 25px;">Username</label>
                        <input type="text" name="username" class="form-control">
                    </div>
                    <div class="form-group">
                        <label style="color: white;font-size: 25px;">Password</label>
                        <input type="password" name="password" class="form-control">
                    </div> <br />
                    <div class="form-group">
                        <input type="submit" class="btn " value="Sign In" style="background-color: #0000FF;color:white;width:100%">
                    </div>
                </form>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card mt-3 mr-5 ml-4 p-5" style="border-radius:15px ;">

                <h2 class="card-header ">Register</h2>
                <br />

                <p class="card-body" style="font-family: 'Silkscreen';">Please fill in your credentials to register.</p>

                <?php
                if (!empty($login_err)) {
                    echo '<div class="alert alert-danger">' . $login_err . '</div>';
                }
                ?>

                <form action="Project/PHP/Login%20&&%20Register/register.php" method="POST">
                    <fieldset>
                        <div class="row">
                            <div class="col-12 col-lg-6">
                                <label for="regName">First Name:</label>
                                <input type="text" id="regName" class="form-control" placeholder="John" name="fname">
                            </div>
                            <div class="col-12 col-lg-6">
                                <label for="regSurname">Last Name:</label>
                                <input type="text" id="regSurname" class="form-control" placeholder="Doe" name="lname">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-12 col-lg-6">
                                <label for="regEmail">Email Address:</label>
                                <input type="email" id="regEmail" class="form-control" placeholder="john.doe@gmail.com" name="email">
                            </div>
                            <div class="col-12 col-lg-6">
                                <label for="regBirthDate">Date of Birth:</label>
                                <input type="date" id="regBirthDate" class="form-control" name="date">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-12 col-lg-6">
                                <label for="regEmail">Create Password:</label>
                                <input type="password" id="pass1" class="form-control" placeholder="******" name="pass">
                            </div>
                            <div class="col-12 col-lg-6">
                                <label for="regEmail">Confirm Password:</label>
                                <input type="password" id="pass2" class="form-control" placeholder="******">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-12">
                                <button type="submit" class="btn btn-dark" style="width: 100%">Register </button>
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card mt-3 mr-5 ml-4 p-5" style="border-radius:15px ;">

                <h2 class="card-header ">Register</h2>
                <br />

                <p class="card-body" style="font-family: 'Silkscreen';">Please fill in your credentials to register.</p>

                <?php
                if (!empty($login_err)) {
                    echo '<div class="alert alert-danger">' . $login_err . '</div>';
                }
                ?>

                <form action="Project/PHP/Login%20&&%20Register/register.php" method="POST">
                    <fieldset>
                        <div class="row">
                            <div class="col-12 col-lg-6">
                                <label for="regName">First Name:</label>
                                <input type="text" id="regName" class="form-control" placeholder="John" name="fname">
                            </div>
                            <div class="col-12 col-lg-6">
                                <label for="regSurname">Last Name:</label>
                                <input type="text" id="regSurname" class="form-control" placeholder="Doe" name="lname">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-12 col-lg-6">
                                <label for="regEmail">Email Address:</label>
                                <input type="email" id="regEmail" class="form-control" placeholder="john.doe@gmail.com" name="email">
                            </div>
                            <div class="col-12 col-lg-6">
                                <label for="regBirthDate">Date of Birth:</label>
                                <input type="date" id="regBirthDate" class="form-control" name="date">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-12 col-lg-6">
                                <label for="regEmail">Create Password:</label>
                                <input type="password" id="pass1" class="form-control" placeholder="******" name="pass">
                            </div>
                            <div class="col-12 col-lg-6">
                                <label for="regEmail">Confirm Password:</label>
                                <input type="password" id="pass2" class="form-control" placeholder="******">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-12">
                                <button type="submit" class="btn btn-dark" style="width: 100%">Register </button>
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>


</body>

</html>