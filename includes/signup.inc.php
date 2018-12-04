<?php

if (isset($_POST['submit'])) {
    include_once 'dbh.inc.php';

    $first = mysqli_real_escape_string($conn, $_POST['first']);
    $first = mysqli_real_escape_string($conn, $_POST['last']);   
    $first = mysqli_real_escape_string($conn, $_POST['email']);   
    $first = mysqli_real_escape_string($conn, $_POST['uid']);
    $first = mysqli_real_escape_string($conn, $_POST['pwd']);
    
    
    //error handlders
    //check for empty fields
    if (empty($first) || empty($last) || empty($email) || empty($uid) || empty($pwd)) {

        header("Location: ../signup.php?signup=empty");
        exit();

    } else {
        // check if input characters are valid
        if (!preg_match("/^[a-zA-Z]*$/", $first) || !preg_match("/^[a-zA-Z]*$", $last)) {
            header("Location: ../signup.php?signup=invalid");
        exit();
        }
        else {
            // check if email is valid
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                header("Location: ../signup.php?signup=email");
        exit();
            } else {
                $sql = "SELECT * FROM users where user_uid='$uid'";
                $result = mysqli_query($conn, $sql);
                $resultCheck = mysqli_num_rows($result);

                if ($resultCheck > 0) {
                    header("Location: ../signup.php?signup=usertaken");
        exit(); 
                } else {
                    // hashhing password
                    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
                    // instert the user into the database
                    $sql = "INSERT INTO users (user_first, user_last, user_email, user_uid, user_pwd) VALUES ('$first', '$last',
                    '$email', '$uid', '$hashedPwd');";
                    mysqli_query($conn, $sql);
                    header("Location: ../signup.php?signup=success");
                    exit();
                }
            }
        }
    }



} else {
    header("Location: ../signup.php");
    exit();
}