<?php
session_start();
if (isset($_POST['sign_up'])) {
    require 'db.php';

    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $password = $_POST['psw'];


    if (empty($fname) || empty($lname) || empty($email) || empty($password)) {
        header("Location: Sign_up.php?error=emptyfields&fname=" . $fname .
            "&lname=" . $lname . "&email=" . $email);
        exit();
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)
        && !preg_match("/^[a-zA-Z0-9]*$/", $fname)
        && !preg_match("/^[a-zA-Z0-9]*$/", lname)) {
        header("Location: Sign_up.php?error=invalidemailfnamelname");
        exit();
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: Sign_up.php?error=invalidemail&fname=" . $fname .
            "&lname=" . $lname);
        exit();
    } elseif (!preg_match("/^[a-zA-Z0-9]*$/", $fname)) {
        header("Location: Sign_up.php?error=invalidfname&lname="
            . $lname . "&email=" . $email);
        exit();
    } elseif (!preg_match("/^[a-zA-Z0-9]*$/", $lname)) {
        header("Location: Sign_up.php?error=invalidlname&fname=" . $fname .
            "&email=" . $email);
        exit();
    } else {

        $sql = "select fname,lname from users_signup where fname =? and lname =?";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: Sign_up.php?error=sqlerror");
            exit();
        } else {
            mysqli_stmt_bind_param($stmt, "ss", $fname, $lname);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $result_check = mysqli_stmt_num_rows($stmt);
            if ($result_check > 0) {
                header("Location: Sign_up.php?error=usertaken&email=" . $email);
                exit();
            } else {
                $sql = "Insert into users_signup (fname, lname , email, password) values (?,?,?,?)";
                $stmt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    header("Location: Sign_up.php?error=sqlerror");
                    exit();
                } else {
                    $hashed_psw = password_hash($password, PASSWORD_DEFAULT);
                    mysqli_stmt_bind_param($stmt, "ssss",
                        $fname, $lname, $email, $hashed_psw);
                    mysqli_stmt_execute($stmt);
                    header("Location: Sign_up.php?signup=success");
                    exit();
                }


            }
        }
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);
} else {
    header("Location: Sign_up.php");
    exit();
}