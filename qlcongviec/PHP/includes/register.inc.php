<?php

if (isset($_POST["submit"])) {

    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if (emptyInputSignUp($username, $email, $password) !== false) {
        header("location: ../../HTML/index.php?error=emptyinput");
        exit();
    }

    if (invalidUsername($username) !== false) {
        header("location: ../../HTML/index.php?error=invalidusername");
        exit();
    }

    if (invalidEmail($email) !== false) {
        header("location: ../../HTML/index.php?error=invalidemail");
        exit();
    }

    if (usernameExists($conn, $username, $email) !== false) {
        header("location: ../../HTML/index.php?error=usernametaken");
        exit();
    }

    createUser($conn, $username, $email, $password);
} else {
    header("location: ../../HTML/index.php");
    exit();
}
