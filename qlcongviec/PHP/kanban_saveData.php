<?php

session_start();

$data = $_POST['data'];

$serverName = "localhost";
$dbUserName = "root";
$dbPassword = "";
$dbName = "qlcongviec";

$conn = mysqli_connect($serverName, $dbUserName, $dbPassword, $dbName);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$userId = $_SESSION["userid"];
$result = mysqli_query($conn, "UPDATE kanban SET kanbanData = '" . $data . "' WHERE usersId = '" . $userId . "'");
