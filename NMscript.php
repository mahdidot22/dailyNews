<?php
session_start();
if (isset($_SESSION['username'])) {
    if (isset($_POST['add'])) {
        require 'db.php';
        $title = $_POST['title'];
        $content = $_POST['content'];
        $auther = $_SESSION['username'];


        if (empty($title) || empty($content)) {
            header("Location: NewsManagement.php?error=emptyfields&titl=" . $title);
            exit();

        }elseif (!preg_match('/^[a-zA-Z0-9:\'"+.,&!*()-]+/', $title)) {
            header("Location: NewsManagement.php?error=invalidtitle&title="
                . $title);
            exit();
        }else {

            $sql = "select title from add_news where title =?";
            $stmt = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt, $sql)) {
                header("Location: NewsManagement.php?error=sqlerror");
                exit();
            } else {
                mysqli_stmt_bind_param($stmt, "s", $title);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_store_result($stmt);
                $result_check = mysqli_stmt_num_rows($stmt);
                if ($result_check > 0) {
                    header("Location: NewsManagement.php?error=titletaken&title=" . $title);
                    exit();
                } else {
                    $sql = "Insert into add_news (title, auther, content) values (?,?,?)";
                    $stmt = mysqli_stmt_init($conn);
                    if (!mysqli_stmt_prepare($stmt, $sql)) {
                        header("Location: NewsManagement.php?error=sqlerror");
                        exit();
                    } else {
                        mysqli_stmt_bind_param($stmt, "sss",
                            $title, $auther, $content);
                        mysqli_stmt_execute($stmt);
                        header("Location: NewsManagement.php?add=success");
                        exit();
                    }


                }
            }
        }
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
    } else {
        header("Location: NewsManagement.php");
        exit();
    }
} else {
    header("Location: index.php");
    exit();
}
