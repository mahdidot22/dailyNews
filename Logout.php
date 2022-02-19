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
            session_unset();
            session_destroy();
            echo " <li><a href='index.php'>Home</a></li>";
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
</div>
<!-- BEGIN content -->
<div id="content">
    <p style="text-align: center; font-size: medium; margin-left: 120px;">You are logged out!!</p>
</div>
<!-- END content -->
<!-- END wrapper -->
<!-- BEGIN footer -->
<div id="footer">
    <p class="l">Copyright &copy; 2020 - Web2 Lap Final Project &middot; All Rights Reserved | by: Mahdi D. O. Taha </p>
</div>
<!-- END footer -->
</body>
</html>