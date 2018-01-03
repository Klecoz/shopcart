<?php

session_start();

if (isset($_POST['submit'])) {
    
    include 'dbh.php';

    $uid = mysqli_real_escape_string($conn, $_POST['uid']);
    $pwd = mysqli_real_escape_string($conn, $_POST['pwd']);

    //Error handlers
    //Check if inputs are empty
    if (empty($uid) || empty($pwd)) {
        header("Location: ../shopcart.php?login=empty");
        exit();
    } else {
        //Queries table and sees if it finds any rows.
        $sql = "SELECT * FROM users WHERE user_uid='$uid'";
        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);
        if ($resultCheck < 1) {
            header("Location: ../shopcart.php?login=NoUserError");
            exit();
        } else {
            if ($row = mysqli_fetch_assoc($result)) {
                //De-hash password from DB
                $hashedPwdCheck = password_verify($pwd, $row['user_pwd']);
                if ($hashedPwdCheck == false) {
                    //checks if password is correct.
                    header("Location: ../shopcart.php?login=passerror");
                    exit();
                } elseif ($hashedPwdCheck == true) {
                    //Log in the user here and create session
                    $_SESSION['u_id'] = $row[user_id];
                    $_SESSION['u_first'] = $row[user_first];
                    $_SESSION['u_last'] = $row[user_last];
                    $_SESSION['u_email'] = $row[user_email];
                    $_SESSION['u_uid'] = $row[user_uid];
                    $_SESSION['u_admin'] = $row[isAdmin];
                    header("Location: ../shopcart.php?login=success");
                    exit();
                }
            }
        }
    }

} else {
    header("Location: ../shopcart.php?login=NoPosterror");
    exit();

}