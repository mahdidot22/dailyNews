<?php

if (isset($_POST['login'])) {
    require 'db.php';

    $email = $_POST['email'];
    $password = $_POST['psw'];

    if (empty($email) || empty($password)) {
        header("Location: Login.php?error=emptyfields");
        exit();
    } else {
        $sql = "select * from users_signup where email =? ";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: Login.php?error=sqlerror");
            exit();
        } else {
            mysqli_stmt_bind_param($stmt, "s", $email);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if ($row = mysqli_fetch_assoc($result)) {
                $pswCheck = password_verify($password, $row['password']);
                if ($pswCheck == false) {
                    header("Location: Login.php?error=wrongpassword");
                    exit();
                } elseif ($pswCheck == true) {
                    session_start();
                    $_SESSION['username'] = $row['fname'] . $row['lname'];
                    header("Location: Login.php?login=success");
                    header("Location: index.php");
                    exit();
                } else {
                    header("Location: Login.php?error=wrongpassword");
                    exit();
                }
            } else {
                header("Location: Login.php?error=nouser");
                exit();
            }
        }
    }
} else {
    header("Location: Login.php");
    exit();
}