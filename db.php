<?php
    include 'vars.php';
    include 'functions.php';
    include 'indexHeader.php';
?>


<body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">Arsenio Colon</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">

                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Content -->
    <div class="container">

        <div class="row">
            <div class="jumbotron col-md-12">
                <?php echo "<h1>". $webPageName . "</h1>" ?>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4 col-sm-4 col-xs-4">

            <form method="post">
            <input type="submit" name="submit" value="Insert Months">
            <?php echo $result; ?> 
            </form>

            <?php if(isset($_POST['submit']))
			{
                dbInput();
            }
            ?>


            </div>
            <div class="col-md-4 col-sm-4 col-xs-4">
                <h3>Assignments for Web Programming II</h3>
                <?php assignmentsLoop(); ?>

            </div>

            <div class="col-md-4 col-sm-4 col-xs-4">
                <h3>Picture</h3>
                <img class="img-thumbnail" src="images/pic.jpg" alt="A picture of myself">

            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <h2>My Projects</h2>
            </div>
            <div class="col-md-12">
                <h3>FizzBuzz</h3>
            </div>
            <div class="col-md-5">
                <img class="img-thumbnail portphoto" src="images/fizzbuzz.jpg" alt="fizzbuzz project">
            </div>
            <div class="col-md-7">
                <p>This program is one of the most asked 'test' programs for web development interviews! It covers the basics of any programming language: if and for loops, code blocks, and conditional statements. It uses a conditional called a modulus to
                    calculate the remainder of a number, and provide either a number, 'fizz' if the number is divisible by 3, 'buzz' if a number is divisible by 5, or 'fizzbuzz' if a number is divisible by both 3 and 5. It's not visually spectacular,
                    but still important to know about. This branch is the same program, but using a function and prompting the user for a number to FizzBuzz.</p>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <h3>Hot or Cold Game</h3>
            </div>
            <div class="col-md-5">
                <img class="img-thumbnail portphoto" src="images/hot_or_cold.jpg" alt="hot or cold project">
            </div>
            <div class="col-md-7">
                <p>Forked HTML and CSS content to emulate getting files from other developers. Worked independently on the Javascript portion to get the game working. This project helped me learn how to use functions a bit better and complimented all the
                    other Javascript(loops/else if) that I have been learning over the past couple of weeks. I had trouble figuring out a way to get a number to compare to tell if the user was hot or cold, but ended up using the Math.abs() function to
                    get the absolute value of the user's number and the random number.</p>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <h3>ListMaker</h3>
            </div>
            <div class="col-md-5">
                <img class="img-thumbnail portphoto" src="images/listmaker.jpg" alt="listmaker project">
            </div>
            <div class="col-md-7">
                <p>Created a list application using jQuery and Javascript with some basic visual features. The script appends items when they are added from the textbox, and crosses out items by adding a class when they are done. Also provided practice using
                    Javascript's 'this' object when referenced from a function. Part of Thinkful's FEWD course.</p>

            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <h3>Streetfighter jQuery Project</h3>
            </div>
            <div class="col-md-5">
                <img class="img-thumbnail portphoto" src="images/streetfighter.jpg" alt="streetfighter project">
            </div>
            <div class="col-md-7">
                <p>This project involved using show(), hide(), and animate() jQuery functions, as well as the on() and animate() functions to create a script that makes Ryu (A Street Fighter character) move when hovered over. He also does different actions
                    if you click on him (HADOUKEN!) and when you press the X key (arguably the coolest pose he can do). Part of Thinkful's FEWD course.</p>
            </div>
        </div>

        <!-- /.row -->

    </div>
    <!-- /.container -->

    <!-- jQuery Version 1.11.1 -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    <!-- My script -->
    <script src="js/script.js"></script>



</body>

</html>
