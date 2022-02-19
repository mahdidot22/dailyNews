<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>DailyNews</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <link rel="stylesheet" type="text/css" href="style.css"/>
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
            <?php
            if (isset($_SESSION['username'])) {
                echo " <li><a href='NewsManagement.php'>News Management</a></li>";
                echo " <li><a href='Logout.php'>Logout</a></li>";
            } else {
                echo "<li><a href='Sign_up.php'>Sign up</a></li>";
                echo " <li><a href='Login.php'>Login</a></li>";
            }
            ?>
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

        <!-- begin recent posts -->
        <div class="recent" style="margin-top: -50px; margin-bottom: 100px; width: 100%;">
            <!-- begin post -->
            <div class="o post" style="width: 100%;">
                <form method="post" action="indexScript.php">
                    <?php
                    include "indexScript.php";
                    ?>
                </form>
                <div class="break"></div>
            </div>
            <br>
            <!-- end post -->
        </div>
        <!-- end recent posts -->
    </div>
    <!-- END content -->
</div>
<!-- END wrapper -->
<!-- BEGIN footer -->
<div id="footer">
    <p class="l">Copyright &copy; 2020 - Web2 Lap Final Project &middot; All Rights Reserved | by: Mahdi D. O. Taha </p>
</div>
<!-- END footer -->
</body>
</html>
