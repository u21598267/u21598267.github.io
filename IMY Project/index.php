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
<style>
    body,
    html {
        height: 100%;
        margin: 0;
    }

    .bg {
        /* The image used */
        background-image: url("Project/IMAGES/EventfullText.svg");

        /* Full height */
        height: 100%;

        /* Center and scale the image nicely */
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
    }
</style>

<body class="bg">
    <div class="container mt-5">

        <div class="row" style="opacity:95%">

            <div class="col-4 mt-5 text-center card" style="border-radius: 15px;background-color:white" id="Register/Login">

                <div class="ml-2 py-3" style="width: 85%;">
                    <header class="text-center">

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
                            <text text-anchor="middle" x="50" y="14" font-size="8" fill="url(#wave)" fill-opacity="1">EventFull</text>

                        </svg>
                    </header>

                </div>



                <h2 style="font-size: 30px;">Login</h2>
                <br />

                <p>Please fill in your credentials to login.</p>
                <p>Not Signed Up? Click Register Below</p>
                <?php
                if (!empty($login_err)) {
                    echo '<div class="alert alert-danger">' . $login_err . '</div>';
                }
                ?>
                <br />
                <form action="Project/PHP/Login%20&&%20Register/login.php" method="post">
                    <div class="form-group text-center">
                        <input type="text" name="username" class="form-control" style="border-top:none;border-left:none;border-right:none;border-bottom:0.5px solid #0000FF" placeholder="Username">
                    </div>
                    <br />

                    <div class="form-group text-center">

                        <input type="password" name="password" class="form-control" style="border-top:none;border-left:none;border-right:none;border-bottom:0.5px solid #0000FF" placeholder="Password">
                    </div>

                    <div class="form-group">
                        <input type="submit" class="btn " value="Sign In" style="background-color: #0000FF;color:white;width:80%;border-radius: 15px">
                    </div>
                    <input class="btn mb-3" value="Register" type="submit" style="background-color: orangered;color:white;width:80%;border-radius: 15px" id="form">
                </form>

            </div>


            <div class="col-8 card mt-5 text-center" style="background-color: white; border-radius:15px">
            <div class="card-body text-center">
                <div class="row ">
                    <img src="Project/IMAGES/EventfullText.svg" class="d-inline-block" style="max-height:100px;max-width:100px;" />
                </div>
                <div class="row mt-5">
                    <article class="container">
                        <p>

                            The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.

                            Where can I get some?
                            There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.

                            5
                            paragraphs
                            words
                            bytes
                            lists
                            Start with 'Lorem
                            ipsum dolor sit amet...'

                        </p>
                    </article>
                </div>
                </div>
            </div>

        </div>

    </div>

</body>
<script>
    var x = document.getElementById('Register/Login');
    document.getElementById('form').addEventListener('click', changeFunc);
    document.getElementById('form2').addEventListener('click', changeFunc2);

    function changeFunc() {
        x.innerHTML = "";
        x.innerHTML = `
        <div class="ml-2 py-3" style="width: 85%">
                    <header class="text-center">

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
                            <text text-anchor="middle" x="50" y="14" font-size="8" fill="url(#wave)" fill-opacity="1">EventFull</text>

                        </svg>
                    </header>

                </div>
<h2 style='font-size: 30px'>Register</h2>
<br />

<p>Please fill in your credentials to register.</p>

<?php
if (!empty($login_err)) {
    echo '<div class="alert alert-danger">' . $login_err . '</div>';
}
?>

<form action="Project/PHP/Login%20&&%20Register/register.php" method="POST" enctype="multipart/form-data">

    <fieldset>
        <div class="row">
      
            <div class="col-12 col-lg-6">
                <label for="regName">First Name:</label>
                <input type="text" id="regName" class="form-control" placeholder="John" name="fname" value='Jonel'>
            </div>
            <div class="col-12 col-lg-6">
                <label for="regSurname">Last Name:</label>
                <input type="text" id="regSurname" class="form-control" placeholder="Doe" name="lname" value='Albuquerque'>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-12 col-lg-6">
                <label for="regEmail">Email Address:</label>
                <input type="email" id="regEmail" class="form-control" placeholder="john.doe@gmail.com" name="email" value='jonel2022@gmail.com'>
            </div>
            <div class="col-12 col-lg-6">
                <label for="regBirthDate">Date of Birth:</label>
                <input type="date" id="regBirthDate" class="form-control" name="date">
            </div>
            
        </div>
        <div class="row mt-3">
            <div class="col-12 col-lg-6">
                <label for="regEmail">Create Password:</label>
                <input type="password" id="pass1" class="form-control" placeholder="******" name="pass" value='1234'>
            </div>
            <div class="col-12 col-lg-6">
                <label for="regEmail">Confirm Password:</label>
                <input type="password" id="pass2" class="form-control" placeholder="******" value='1234'>
            </div>
            
        </div>
        <div class="row mt-3">
        
            <div class="col-12 col-lg-6">
                <input class="form-control" type="file" name="file" value="" />
            </div>

            <div class="col-12 col-lg-6">
                <label for="contact">Contact Number:</label>
                <input type="number" id="contact" class="form-control" name="contact" placeholder="+27()" value='0797150948'>
            </div>
            <div class="col-12 col-lg-6">
                <input type="submit"  class="form-control" value='Register'>
            </div>
        </div>
    </fieldset>
</form>`
    }
</script>

</html>