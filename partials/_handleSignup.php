<?php

$successAlert = false;
$passwordMismatch = false;
$emailExists = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include '_dbconnect.php';

    $signupEmail = $_POST["signupEmail"];
    $signupPassword = $_POST["password"];
    $confirmPass = $_POST["confirmPass"];


    //check if email exists
    $sql = "SELECT * FROM `users` WHERE `user_email` = '$signupEmail'";
    $result = mysqli_query($conn, $sql);
    $rows = mysqli_num_rows($result);

    if ( $rows > 0) {
        //if user exists, simply show alert and reject sign up.
        $emailExists = true;
        echo 'User already exists. <a href="/forum/index.php">Back Home</a>';

    
    } else if (($signupPassword == $confirmPass) && ($rows == 0)) {
        $hash = password_hash($signupPassword, PASSWORD_DEFAULT);
        $sql ="INSERT INTO `users` (`user_email`, `user_pass`) VALUES ('$signupEmail', '$hash');";
        $result = mysqli_query($conn, $sql);
        $successAlert = true;
        
    }  else {
        echo "password mismatch";
    }
}