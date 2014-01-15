<?php

require_once $_SERVER['DOCUMENT_ROOT']."/app/core/DB.php";
$DB = DB::getInstance();
$DB->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

ob_start();
session_start();

$username = $_POST['username'];
$password = $_POST['password'];

// check if username exists (select user + pass from users)

$query = $DB->connection->prepare("
    SELECT user_id, user_name, user_pass FROM users WHERE user_name = :term");
$query->execute(array('term' => $username));


// if this isn't the case, redirect them to login page again

if($query->rowCount() == 0){
    header("Location: /failure");
    exit();
}

// if username does exist, check that the password is the same
// if this isn't the case, redirect them to login page again

$user = $query->fetch();

if($user['user_pass'] != $password){
    header("Location: /failure");
    exit();
} else {
    session_regenerate_id();
    $_SESSION['sess_user_id'] = $user['user_id'];
    $_SESSION['sess_username'] = $user['user_name'];
    session_write_close();
    header("Location: /admin");
}

// else log them in