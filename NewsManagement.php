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
                echo " <li><a href='index.php'>Home</a></li>";
                echo " <li><a href='MyNews.php'>My News</a></li>";
                echo " <li><a href='Logout.php'>Logout</a></li>";
            } else {
                header("Location: index.php");
                exit();
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
        <div class="recent" style="margin-top: -50px; margin-bottom: 100px;">
            <!-- begin post -->
            <div class="o post">
                <form action="NMscript.php" method="post">
                    <input type="submit" name="add" value="ADD"
                           style="background: green; color: white; width: 100%; height: 50px;"/>
                    <input type="text" placeholder="Title" style="text-align: center" name="title">
                    <textarea rows="15" placeholder="Content" style="text-align: left; width: 98.5%;resize: none;overflow-y:scroll; "
                              name="content" ></textarea>
                </form>
                <?php
                if (isset($_GET['error'])) {
                    if ($_GET['error'] == "emptyfields") {
                        echo "<h4 style='text-align: center; color: red;'>Fill fields!!</h4>";
                    } elseif ($_GET['error'] == "invalidtitle") {
                        echo "<h4 style='text-align: center; color: red;'>Invalid title.</h4>";
                    } elseif ($_GET['error'] == "titletaken") {
                        echo "<h4 style='text-align: center; color: red;'>Title taken before.</h4>";
                    } elseif ($_GET['error'] == "sqlerror") {
                        echo "<h4 style='text-align: center; color: red;'>Database error!!</h4>";
                    }
                } elseif (isset($_GET['add'])) {
                    echo "<h4 style='text-align: center; color: green;'>Added successfully!!</h4>";
                }
                ?>
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
