<?php

$emailExists = false; 
$accountCreated = false; 
$passwordMismatch = false; 

if (isset($_POST['submit_signup']) && ($_SERVER["REQUEST_METHOD"] == "POST")) {
    include '_dbconnect.php';

    $signupEmail = $_POST["signupEmail"];
    $signupPassword = $_POST["password"];
    $confirmPass = $_POST["confirmPass"];

    //check if email exists
    $sqlExists = "SELECT * FROM `users` WHERE `user_email` = '$signupEmail'";
    $signup_result = mysqli_query($conn, $sqlExists);
    $rows = mysqli_num_rows($signup_result);

    if ( $rows > 0) {
        //means email exists. can't create account. 
        $emailExists = true; 
        header('Location: /forum/index.php?signupsuccess=false&emailexists=true');
        
    } else if (($signupPassword == $confirmPass) && ($rows == 0)) {

        $hash = password_hash($signupPassword, PASSWORD_DEFAULT);
        $sql ="INSERT INTO `users` (`user_email`, `user_pass`) VALUES ('$signupEmail', '$hash');";
        $createAccount = mysqli_query($conn, $sql);
       
        //if account created successfully. 
        $accountCreated = true; 
        header('Location: /forum/index.php?signupsuccess=true');
        
        
    }  else {
        $passwordMismatch = true; 
        header('Location: /forum/index.php?signupsuccess=false&passwordmismatch=true');
    }
}