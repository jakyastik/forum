<?php

$emailExists = false; 
$accountCreated = false; 
$passwordMismatch = false; 

if (isset($_POST['submit_login']) && ($_SERVER["REQUEST_METHOD"] == "POST")) {
    include '_dbconnect.php';

    $loginEmail = $_POST['loginEmail'];
    $loginPass = $_POST['loginPass'];

    $sql = "SELECT * FROM `users` WHERE `user_email` = '$loginEmail'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $userId = $row['user_id'];
    $verify = password_verify($loginPass, $row['user_pass']);
    

    if ($verify) {
        session_start();
        $_SESSION['loggedIn'] = true;
        $_SESSION['userEmail'] = $loginEmail;
        $_SESSION['userId'] = $userId;
        echo "Logged In with '.$loginEmail.'";        
    } else {
        echo "incorrect data. try again";
    }

    header('Location: /forum/index.php?login=true');
    
}

    