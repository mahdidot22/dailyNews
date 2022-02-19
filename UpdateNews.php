<?php
session_start();
if (isset($_REQUEST['edit'])) {
    require 'db.php';
    $eid = $_REQUEST['edit'];

    $qeury = mysqli_query($conn, "select * from add_news where id=$eid");
    $row = mysqli_fetch_array($qeury);
}
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
                <form action="" method="post">
                    <input type='submit' name='save' value='Update'
                           style='background: orange; color: white; width: 100%; height: 50px;'><br><br>
                    <textarea type='text' name='newTITLE' placeholder='Title'
                              style='text-align: left; width: 96.5%;
                    resize: none; text-align:center; font-size:medium;
                    padding:10px; height: 20px;' required><?php echo $row['title']; ?> </textarea><br><br>
                    <textarea rows='15' placeholder='Content'
                              style='text-align: left; width: 98.5%;resize: none;overflow-y:scroll; '
                              name='newCONTENT' required><?php echo $row['content']; ?></textarea>
                </form>

                <?php
                if (isset($_REQUEST['save'])) {
                    require 'db.php';
                    $title = $_POST['newTITLE'];
                    $content = $_POST['newCONTENT'];
                    mysqli_query($conn, "update add_news set title='$title', content='$content' where id='$eid'");
                    header("Location: MyNews.php");
                    exit();
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
    <p class="l">Copyright &copy; 2020 - Web2 Lap Final Project &middot; All Rights Reserved | by: Mahdi D. O.
        Taha </p>
</div>
<!-- END footer -->
</body>
</html>