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
    $sqlExists = "SELECT * FROM `users` WHERE `user_email` = '$signupEmail'";
    $result = mysqli_query($conn, $sqlExists);
    echo $result;
    $rows = mysqli_num_rows($result);
    echo $row;

    // if ( $row > 0) {
    //     //if user exists, simply show alert and reject sign up.
    //     $emailExists = true;
    
    // } else if ($signupPassword == $confirmPass) {
    //     $hash = password_hash($signupPassword, 'password_default');
    //     //if email doesn't exist, insert new email and pass to database.
    //     $sql ="INSERT INTO `users` (`user_email`, `user_pass`, `timestamp`) VALUES ( '$signupEmail', '$hash', current_timestamp());";
    //     $result = mysqli_query($conn, $sql);
    //     $successAlert = true;
    //     header ("Location: /forum/index.php?signupsuccess=true");

        
    // }  else {
    //     echo "Confirm Password";
    // }
}