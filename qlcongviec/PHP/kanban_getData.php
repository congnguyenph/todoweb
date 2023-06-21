<?php

session_start();

$serverName = "localhost";
$dbUserName = "root";
$dbPassword = "";
$dbName = "qlcongviec";

$conn = mysqli_connect($serverName, $dbUserName, $dbPassword, $dbName);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$userId = $_SESSION["userid"];
$result = mysqli_query($conn, "SELECT * FROM kanban WHERE usersId = '" . $userId . "'");
$row = mysqli_fetch_assoc($result);

echo trim(stripslashes(json_encode($row["kanbanData"])), '"');
