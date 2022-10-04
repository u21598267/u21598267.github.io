<?php
session_start();
include "../Profile/config.php";
$user_one;
$user_two;
$_SESSION['user_one'] ; 
$_SESSION['user_two'] ; 
if(!isset($_POST['sendMessage']))
{
//Extract the  users ids to create/search for the table for the messages = USER 1
$sql = "SELECT user_id FROM tbusers WHERE email='" . $_POST['ini_name'] . "'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row

    while ($row = mysqli_fetch_assoc($result)) {
        $user_one = $row['user_id'];
    }
}
//***************************************************************************** */

//Extract the  users ids to create/search for the table for the messages = USER 2
$sql = "SELECT user_id FROM tbusers WHERE email='" . $_POST['acc_name'] . "'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row

    while ($row = mysqli_fetch_assoc($result)) {
        $user_two = $row['user_id'];
    }
}
//***************************************************************************** */
$ini;
$acc;
//Check if a table of messages exists between users. If not then CREATE TABLE.
if ($result = $conn->query("SHOW TABLES LIKE 'CHAT_" . $user_one . $user_two . "'")) {
    $result2 = $conn->query("SHOW TABLES LIKE 'CHAT_" . $user_two . $user_one . "'");
    if ($result->num_rows == 1 || $result2->num_rows == 1) {
        if ($result->num_rows == 1) {
          $_SESSION['user_one'] =  $ini = $user_one;
          $_SESSION['user_two'] = $acc = $user_two;
        } else {
            $_SESSION['user_two'] = $ini = $user_two;
            $_SESSION['user_one'] = $acc = $user_one;
        }
        //iterate values in the table and output all the messages
        $sql = "SELECT * FROM chat_" . $ini . $acc;
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            // output data of each row

            while ($row = mysqli_fetch_assoc($result)) {
                if ($user_one == $row['user_id']) {
                    echo '<div class="row"><div class="alert  col-12 alert-success mt-3 ml-3  text-left float-left" style="max-width:fit-content;max-height:fit-content;border-radius:15px" role="alert">
               <b>' . $row['message'] . ' </b> <p class="footer"> 12:47</div></div>';
                } else  echo '<div class="row ml-5"><div class="alert col-12 alert-dark  text-left float-right" style="max-width:fit-content;max-height:fit-content;border-radius:15px" role="alert">
                <b>' . $row['message'] . ' </b> <p class="footer"> 12:47</div></div>';
            }
        }
    }
} else {
    echo "<div class='alert alert-primary text-center' role='alert'>
        No messages just yet!
      </div>";
    $sql = "CREATE TABLE CHAT_" . $user_one . $user_two . " (
            message VARCHAR(300) NOT NULL,
            message_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP, 
            user_id VARCHAR(999) 
                        )";
    mysqli_query($conn, $sql);
}
}
else{
$message = htmlspecialchars($_POST['message']) ; 
$query = "INSERT INTO chat_" . $_SESSION['user_one']. $_SESSION['user_two']. " (message, message_id, user_id) VALUES ('$message', '12:47', '$_SESSION[user_one]')";

$res = mysqli_query($conn, $query) == TRUE;


//Extract the  users ids to create/search for the table for the messages = USER 1
$sql = "SELECT user_id FROM tbusers WHERE email='" . $_POST['ini_name'] . "'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row

    while ($row = mysqli_fetch_assoc($result)) {
        $user_one = $row['user_id'];
    }
}
//***************************************************************************** */

//Extract the  users ids to create/search for the table for the messages = USER 2
$sql = "SELECT user_id FROM tbusers WHERE email='" . $_POST['acc_name'] . "'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row

    while ($row = mysqli_fetch_assoc($result)) {
        $user_two = $row['user_id'];
    }
}
//***************************************************************************** */
$ini;
$acc;
//Check if a table of messages exists between users. If not then CREATE TABLE.
if ($result = $conn->query("SHOW TABLES LIKE 'CHAT_" . $user_one . $user_two . "'")) {
    $result2 = $conn->query("SHOW TABLES LIKE 'CHAT_" . $user_two . $user_one . "'");
    if ($result->num_rows == 1 || $result2->num_rows == 1) {
        if ($result->num_rows == 1) {
            $ini = $user_one;
            $acc = $user_two;
        } else {
            $ini = $user_two;
            $acc = $user_one;
        }
        //iterate values in the table and output all the messages
        $sql = "SELECT * FROM chat_" . $ini . $acc;
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            // output data of each row

            while ($row = mysqli_fetch_assoc($result)) {
                if ($user_one == $row['user_id']) {
                    echo '<div class="row"><div class="alert  col-12 alert-success mt-3 ml-3  text-left float-left" style="max-width:fit-content;max-height:fit-content;border-radius:15px" role="alert">
               <b>' . $row['message'] . ' </b> <p class="footer"> 12:47</div></div>';
                } else  echo '<div class="row ml-5"><div class="alert col-12 alert-dark  text-left float-right" style="max-width:fit-content;max-height:fit-content;border-radius:15px" role="alert">
                <b>' . $row['message'] . ' </b> <p class="footer"> 12:47</div></div>';
            }
        }
    }
} else {
    echo "<div class='alert alert-primary text-center' role='alert'>
        No messages just yet!
      </div>";
    $sql = "CREATE TABLE CHAT_" . $user_one . $user_two . " (
            message VARCHAR(300) NOT NULL,
            message_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP, 
            user_id VARCHAR(999) 
                        )";
    mysqli_query($conn, $sql);
}
}
$_POST['sendMessage'] = null ; 


//********************************************************* */

?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="icon" type="image/png" sizes="32x32" href="C:\xampp\htdocs\Project\Splash Page\favicon_io\favicon-32x32.png">
    <link rel="icon" href="C:/xampp/htdocs/Project/Splash Page/favicon_io/favicon-32x32.png" type="image/x-icon">
    <title>Chat</title>
</head>

<body class="container text-center">
    <div class="row">
        <form action='friends.php' class="mt-5" method='POST' enctype='multipart/form-data'>
             </form>
    </div>
    <div class="row">
        <form action='chat.php' class="mt-5" method='POST' enctype='multipart/form-data'>
            <button name="sendMessage"  style="width:fit-content;font-weight:bold;" class='text-left btn ml-3 mb-2 btn-success  '>Send Message</button>
            <input type="text" class="text-center mb-3" placeholder="Be Eventfull..." name="message" autofocus style="width:60%">
      
        </form>
    </div>
    <div class="row">
        <input type="button" onclick="window.location.href='../Login && Register/home.php';" style="width:fit-content;font-weight:bold;" class='text-left btn ml-3 btn-primary  ' value="Leave Chat" />
    </div>

</body>

</html>