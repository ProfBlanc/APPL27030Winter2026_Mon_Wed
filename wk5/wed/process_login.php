<?php
session_start();

require 'db_connection.php';

$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';

$isValidLogin = false;


if($isValidLogin){
        $_SESSION['logged_in'] = true;
        $_SESSION['username'] = $username;
        header("Location: dashboard.php");
        exit;

}
    header("Location: login.php?error=Invalid+username+or+password");
    exit;
