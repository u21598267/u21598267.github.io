<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">
</head>

<body>
    <?php
    session_start();
    include "config.php";
    $_POST['email'] = htmlspecialchars($_POST['email']);
    $_POST['name'] = htmlspecialchars($_POST['name']);
    $_POST['date'] = htmlspecialchars($_POST['date']);

    //IMAGE UPDATE

    $targetDir = "../Login && Register/uploads/";
    $filename = basename($_FILES['file']['name']);
    $targetFilePath = $targetDir . $filename;
    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
    move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath);
    //*************************** */
    $sql = "UPDATE tbusers SET email='" . $_POST['email'] . "' ,name='" . $_POST['name'] . " ',birthday='" . $_POST['date'] . "' ,filename='" . $filename . "'WHERE email='" . $_SESSION['username']  . "'";
    
    $sql2 = "UPDATE tbevents SET user_id='" . $_POST['email'] ."' WHERE user_id='" . $_SESSION['username']  . "'";

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $_SESSION['username'] =  $_POST['email'];
    $_SESSION['name'] = $_POST['name'];

    if ($conn->query($sql) === TRUE && $conn->query($sql2) === TRUE) {
        echo '<div class="alert alert-primary mt-3 w-100 text-center" role="alert">
    <img src="../../IMAGES/EventfullText.svg" class="w-25"/><br/><b>Your profile has been updated. It is looking snazzzyyy.
                  </b></div>';
    } else {
        echo '<div class="alert alert-danger mt-3 w-50 text-center" role="alert">
    <img src="../../IMAGES/EventfullText.svg class="w-25" />We could not add your awesommmmme new details. Please try again later.
                  </div>';
    }

    $conn->close();
    ?>
</body>

</html>