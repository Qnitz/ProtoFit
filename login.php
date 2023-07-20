<?php
include "db.php";

session_start();

if(!empty($_POST["loginMail"])) {
        $query  = "SELECT * FROM tbl_220_users_test WHERE email='" 
        . $_POST["loginMail"] 
        . "' and password = '"
        . $_POST["loginPass"]
        ."'";
        $result = mysqli_query($connection,$query);
        $row = mysqli_fetch_array($result);

        if (is_array($row)) {
            $_SESSION['user_data'] = $row;
            echo "Auth success!\n";
            header('Location: ' . URL . 'eventlist.php');
        }
        else {
            $message = "Auth failure...";
        }
}
if (!empty($_GET["loginMail"])) {
    $query  = "SELECT * FROM tbl_220_users_test WHERE email='" 
    . $_GET["loginMail"] 
    . "' and password = '"
    . $_GET["loginPass"]
    ."'";
    $result = mysqli_query($connection,$query);
    $row = mysqli_fetch_array($result);

    if (is_array($row)) {
        $_SESSION['user_data'] = $row;
        echo "Auth success!\n";
        header('Location: ' . URL . 'eventlist.php');
    }
    else {
        $message = "Auth failure. Incorrect Email or Password.";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
                <title>ProtoFit - Login</title>
                <meta name="viewport" content="width=device-width, initial-scale=1">
                <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
                <link rel="stylesheet" href="css/style.css">
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
                <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous">
                </script>
                <script src="js/scripts-login.js"></script>
                <link rel="preconnect" href="https://fonts.googleapis.com">
                <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
                <link href="https://fonts.googleapis.com/css2?family=Grape+Nuts&family=Roboto&family=VT323&display=swap"rel="stylesheet">
                <link href="https://fonts.googleapis.com/css2?family=VT32&display=swap"rel="stylesheet"> 
</head>
<body>
    <div class="container">
        <h1>Login</h1>
    <form action="login.php" method="post" id="frm">
        <div class="form-group">
            <label for="loginMail">Email: </label>
            <input type="text" class="form-control" name="loginMail" id="loginMail" 
            aria-describedby="emailHelp" placeholder="Enter email">
        </div>
        <div class="form-group">
            <label for="loginPass">Password: </label>
            <input type="text" class="form-control" name="loginPass" id="loginPass" 
            placeholder="Enter Password">
        </div><br>
        <button type="submit" class="btn btn-primary mb-2">Log Me In</button>
        <button type="submit" class="btn btn-secondary mb-2" onclick="submitAsGuest()">Enter as Guest</button>
        <div class="error-message"><?php if(isset($message)) { echo $message; } ?></div> 
    </form><br>
    <button class="btn btn-primary" onclick="location.href='./user_fetch.php';">Previous logins</button>
    </div>
</body>
</html>
