<?php
session_start();

$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';


$validUser = 'admin';
$validPass = 'pass';


$validUsers = ["admin", "manager", "team", "ben", "john"];
$validPasses = ["pass", "pass1", "pass2", "pass3", "pass4"];

array_push($validUsers, "mary");
array_push($validPasses, "pass5");

//if ($username === $validUser && $password === $validPass) {

if(in_array($username, $validUsers)){

    $index = array_search($username, $validUsers);

    if($validPasses[$index] === $password){

        $_SESSION['logged_in'] = true;
        $_SESSION['username'] = $username;
        header("Location: dashboard.php");
        exit;

    }

}
    header("Location: login.php?error=Invalid+username+or+password");
    exit;
