<?php
session_start();
require 'db.php';

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
                echo " <li><a href='NewsManagement.php'>News Management</a></li>";
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
        <div class="recent" style="margin-top: -50px; margin-bottom: 100px; width: 100%;">
            <!-- begin post -->
            <div class="o post" style="width: 100%;">

                <?php
                if (isset($_SESSION['username'])) {
                    $sql = "select * from add_news where auther =? ";
                    $stmt = mysqli_stmt_init($conn);
                    if (!mysqli_stmt_prepare($stmt, $sql)) {
                        header("Location: MyNews.php?error=sqlerror");
                        exit();
                    } else {
                        mysqli_stmt_bind_param($stmt, "s", $_SESSION['username']);
                        mysqli_stmt_execute($stmt);
                        $result = mysqli_stmt_get_result($stmt);
                        if (mysqli_num_rows($result) <= 0) {
                            echo "<br><p style='color: red; text-align: center;'>There is no news yet!!</p>";
                        }
                        while ($row = mysqli_fetch_assoc($result)) {

                            if (isset($_REQUEST['del'])) {
                                require 'db.php';
                                $eid = $_REQUEST['del'];
                                $qeury = mysqli_query($conn, "Delete from add_news where id=$eid");
                                sleep(3);
                                header("Refresh:0");
                            }


                            $TITLE = $row['title'];
                            $DATE = $row['date'];
                            $CONTENT = $row['content'];
                            $subcontent = substr($CONTENT, 0, 500) . "...";
                            $AUTHER = $row['auther'];
                            ?>
                            <form action="" method="post" style="width: 100%;">
                                <img src='images/_thumb.jpg' alt=''>
                                <h2><?php echo $TITLE; ?></h2>
                                <h5 style='font-style: oblique'>by: <?php echo $AUTHER; ?>.</h5>
                                <h6 style='font-style: oblique'><?php echo $DATE; ?>.</h6>
                                <p><?php echo $subcontent; ?></p>
                                <a href='UpdateNews.php?edit=<?php echo $row["id"]; ?>' class='edit_btn'>Edit</a>
                                <a href='MyNews.php?del=<?php echo $row['id']; ?>' class='del_btn'>Delete</a><br><br>
                            </form>
                            <?php
                        }
                    }
                    mysqli_stmt_close($stmt);
                    mysqli_close($conn);
                } else {
                    header("Location: index.php");
                    exit();
                }
                ?>
                <div class="break"></div>
            </div>
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
