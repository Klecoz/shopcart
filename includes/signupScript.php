<?php


if (isset($_POST['submit'])) {

    include_once 'dbh.php';

    //turns any input into strings so you don't insert bad SQL into tables
    $first = mysqli_real_escape_string($conn,$_POST['first']);
    $last = mysqli_real_escape_string($conn,$_POST['last']);
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $uid = mysqli_real_escape_string($conn,$_POST['uid']);
    $pwd = mysqli_real_escape_string($conn,$_POST['pwd']);

    //Error handlers
    //Check for empty fields
    if (empty($first) && empty($last) && empty($email) && empty($uid) && empty($pwd))  {
        header("Location: ../signup.php?signup=emptyFields");
        exit();
    } else {
        //check if input characters are valid NO CHARACTERS
        if (preg_match('/^[A-Z\'\-]+$/', $first) || preg_match('/^[A-Z\'\-]+$/', $last)){
            header("Location: ../signup.php?signup=invalidCharacters");
            exit();
        } else {
            //Check if email is valid
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                header("Location: ../signup.php?signup=invalidEmail");
                exit();
            } else {
                //checks if username is taken
                $sql = "SELECT * FROM users WHERE user-uid='$uid'";
                $result = mysqli_query($conn, $sql);
                $resultCheck = mysqli_num_rows($result);
                
                if ($resultCheck > 0) {
                    header("Location: ../signup.php?signup=usertaken");
                    exit();  
                } else {
                    //Hashing the password
                    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
                    //Insert the user into the database
                    $sql = "INSERT INTO users (user_first, user_last, user_email, user_uid, user_pwd) VALUES ('$first', '$last', '$email', '$uid', '$hashedPwd', 0);";
                    mysqli_query($conn, $sql);
                    header("Location: ../signup.php?signup=success");
                    exit();  
                } //end if 1
            } //end if 2
      
        } 
    
}

} else {
    header("Location: ../signup.php");
    echo "Error";
    exit();
}
