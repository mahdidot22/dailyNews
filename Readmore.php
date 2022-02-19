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
            <li><a href="index.php">Home</a></li>
        </ul>
        <!-- end pages -->
        <div class="break"></div>

    </div>
    <!-- END header -->
    <!-- BEGIN content -->
    <?php
    $sql = "select * from add_news";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: Readmore.php?error=sqlerror");
        exit();
    } else {
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        if (mysqli_num_rows($result) <= 0) {
            echo "<br><p style='color: red; text-align: center;'>There is no news yet!!</p>";
        }
        while ($row = mysqli_fetch_assoc($result)) {
            if (isset($_REQUEST['more'])) {
                require 'db.php';
                $eid = $_REQUEST['more'];
                $qeury = mysqli_query($conn, "select * from add_news where id = $eid");
            }

            $TITLE = $row['title'];
            $DATE = $row['date'];
            $CONTENT = $row['content'];
            $AUTHER = $row['auther'];
        }
        ?>
        <div id="content" style="margin-top: -150px; margin-left: 20px;">

            <h2><?php echo $TITLE ?></a></h2><br>
            <h6 style="font-style: oblique"><?php echo $DATE ?></h6><br>
            <h6 style="font-style: oblique"><?php echo $AUTHER ?></h6><br><br>
            <p style="font-size: medium; display: block;
             font-family: 'Dubai';"><?php echo $CONTENT ?></p>
            <div class="break"></div><br><br><br><br><br><br><br><br>

        </div>
        <?php
    }
    ?>
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
