<?php

if (isset($_POST['submit'])) {
    //Destroys the session and takes user back to main page.
    session_start();
    session_unset();
    session_destroy();
    header("Location: ../shopcart.php");
    exit();
}
