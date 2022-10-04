


<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="icon" type="image/png" sizes="32x32" href="../Splash%20Page/favicon-32x32.png">
   <title>Login Incorrect</title>
</head>

<body>


<?php
include 'config.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   // username and password sent from form 

   $myusername = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['username']));
   $mypassword = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['password']));
   $mypassword = hash("sha512", $mypassword);
   $mypassword = substr($mypassword, 0, 100);
   $sql = "SELECT * FROM tbusers WHERE password = '$mypassword' AND email = '$myusername'";
   $result = mysqli_query($conn, $sql);
   $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
   if ($row != null) {
      $active = $row['active'];

      $count = mysqli_num_rows($result);

      // If result matched $myusername and $mypassword, table row must be 1 row

      if ($count == 1) {
         session_start();
         $_SESSION["loggedin"] = true;
         $_SESSION["username"] = $myusername;
         header("location: home.php");
      } 
   }
}?>
<div class="alert alert-danger mt-3" role="alert">You have entered invalid credentials </div>

<form action="../Profile/test.php" method="POST" enctype="multipart/form-data">
   <input type="hidden" value="$_SESSION[username]" name="username">
</form>
</body>

</html>
