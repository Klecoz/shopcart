<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Shopping Cart with Login</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <header>
        <nav>
            <div class="main-wrapper">
                <ul>
                    <li><a href="shopcart.php">Home</a></li>
                </ul>
                <div class="nav-login">
                    <?php
                        //If user is in a session, see logout button. Otherwise See login.
                        if (isset($_SESSION['u_id'])){
                            echo '<form action="includes/logout.php" method="POST">
                            <button type="submit" name="submit" value="submit">Logout</button>
                        </form>';
                        } else {
                            echo '<form action="includes/login.php" method="POST">
                            <input type="text" name="uid" placeholder="Username">
                            <input type="password" name="pwd" placeholder="password">
                            <button type="submit" name="submit" value="submit">Login</button>
                        </form>
                        <a href="signup.php">Sign Up</a>';
                        }
                    ?>
                    

                    
                </div>
            </div>
        </nav>
    </header>