<?php
$hostname = "localhost"; //should be same for everyone
$db_username = "root"; //should be same for everyone
$db_user_password = "root"; //USE YOUR OWN PASSWORD
$selected_database = "awesome_app"; //should be same for everyone

$mysqli = new mysqli(
    $hostname,
    $db_username,
    $db_user_password,
    $selected_database
);

if($mysqli->connect_error){
     header("Location: login.php?error=Could+not+connect+to+database");
}