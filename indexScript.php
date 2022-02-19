<?php
require 'db.php';
$sql = "select * from add_news order by id asc";
$stmt = mysqli_stmt_init($conn);
if (!mysqli_stmt_prepare($stmt, $sql)) {
    header("Location: MyNews.php?error=sqlerror");
    exit();
} else {
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    if (mysqli_num_rows($result) <= 0) {
        echo "<p style='color: red; text-align: center;'>There is no news yet!!</p>";
    }
    while ($row = mysqli_fetch_assoc($result)) {
        $TITLE = $row['title'];
        $DATE = $row['date'];
        $CONTENT = $row['content'];
        $subcontent = substr($CONTENT, 0, 300) . "...";
        $AUTHER = $row['auther'];
        echo "<img src='images/_thumb.jpg' alt='' style='float: right;'>
                  <h2>$TITLE</h2>
                  <h5 style='font-style: oblique'>by: $AUTHER.</h5>
                  <h6 style='font-style: oblique'>$DATE.</h6>
                  <p>$subcontent</p>";
        echo "<p class='readmore'><a href='Readmore.php?more=";
        echo $row['id'];
        echo "' class='edit_btn' target='_blank'>read more</a></p>
                  <br><br><br><br><br>";
    }
}
