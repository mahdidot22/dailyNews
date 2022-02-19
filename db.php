<?php

$servername = "localhost";
$db_username = "root";
$db_password = "";
$db_name = "web2_finalproject";
$conn = mysqli_connect($servername, $db_username, $db_password, $db_name);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "CREATE DATABASE IF NOT EXISTS web2_finalproject";
if ($conn->query($sql) === TRUE) {
    // echo "Database created successfully";
} else {
    echo "Error creating database: " . $conn->error;
}


$sql2 = "CREATE TABLE IF NOT EXISTS users_signup(
	id int(11) NOT NULL AUTO_INCREMENT,
    fname varchar(255) NOT NULL,
    lname varchar(255) NOT NULL,
    email varchar(255) NOT NULL,
    password varchar(255) NOT NULL,
    PRIMARY KEY (id)
);";

if ($conn->query($sql2) === TRUE) {
   // echo "Table users_signup created successfully";
} else {
    echo "Error creating table: " . $conn->error;

}
$sql3 = "CREATE TABLE IF NOT EXISTS add_news(
	id int(11) AUTO_INCREMENT NOT NULL PRIMARY KEY,
    title varchar(255) NOT NULL,
    auther varchar(255) NOT NULL,
    content text NOT null,
   date TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
);";

if ($conn->query($sql3) === TRUE) {
   // echo "Table add_news created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}



