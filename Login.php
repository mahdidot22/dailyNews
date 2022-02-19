<!DOCTYPE html>
<html>
<head>
    <title>DailyNews</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <link rel="stylesheet" type="text/css" href="style.css" />
    <script type="text/javascript" src="js/jquery-1.3.2.min.js"></script>
    <script type="text/javascript" src="js/jquery.cycle.all.min.js"></script>
</head>
<body>
<!-- BEGIN wrapper -->
<div id="wrapper">
    <!-- BEGIN header -->
    <div id="header">
        <!-- begin pages -->
        <ul class="pages">
            <li><a href="index.php">Home</a></li>
            <li><a href="Sign_up.php">Sign up</a></li>
        </ul>
        <!-- end pages -->

        <div class="break"></div>
        <!-- begin logo -->
        <div class="logo">
            <h1><a href="index.php">Daily News</a></h1>
            <p>Keep it on touch</p>
        </div>
        <!-- end logo -->

    </div>
    <!-- END header -->
    <!-- BEGIN content -->
    <div id="content">
        <form action="loginscript.php" method="post">

            <div class="container">
                <label for="uemail"><b>Email</b></label>
                <input type="text" placeholder="example@example.com" name="email" >

                <label for="psw"><b>Password</b></label>
                <input type="password" placeholder="*********" name="psw" >

                <button name="login" type="submit">Login</button>

            </div>

        </form>

        <?php
        if (isset($_GET['error'])) {
            if ($_GET['error'] == "emptyfields") {
                echo "<h4 style='text-align: center; color: red;'>Fill fields!!</h4>";
            } elseif ($_GET['error'] == "wrongpassword") {
                echo "<h4 style='text-align: center; color: red;'>Invalid password.</h4>";
            } elseif ($_GET['error'] == "nouser") {
                echo "<h4 style='text-align: center; color: red;'>User dose not exist.</h4>";
            } elseif ($_GET['error'] == "sqlerror") {
                echo "<h4 style='text-align: center; color: red;'>Database error!!</h4>";
            }
        } elseif (isset($_GET['login'])) {
            echo "<h4 style='text-align: center; color: green;'>Login successful!!</h4>";
        }
        ?>

    </div>
    <!-- END content -->
</div>
<!-- END wrapper -->
<!-- BEGIN footer -->
<div id="footer">
    <p class="l">Copyright &copy; 2020 - Web2 Lap Final Project &middot; All Rights Reserved | by: Mahdi D. O. Taha  </p>
</div>
<!-- END footer -->
</body>
</html>
