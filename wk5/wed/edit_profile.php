<?php
session_start();
require_once 'connection_mysqli.php'; // include connection file

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $age = $_POST['age'];
    $height = $_POST['height'];
    $weight = $_POST['weight'];

    // Prevent SQL injection by using prepared statements
    $stmt = $conn->prepare("UPDATE profile SET username=?, email=?, age=?, height=?, 
    weight=? where id=? and username=?");
    $stmt->bind_param("ssiddis", $username, $email, $age, $height, $weight, 
    $_SESSION['user_id'], $_SESSION['username']);

    if ($stmt->execute()) {
         $_SESSION['username'] = $username;
        header("location: dashboard.php");
    } else {
        die("Could not update profile");
    }
}


    $stmt = $conn->prepare("SELECT username, email, age, height, weight FROM profile WHERE username = ? and id = ?");
    $stmt->bind_param("si", $_SESSION['username'], $_SESSION['user_id']);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($db_username, $db_email, $db_age, $db_height, $db_weight);
    $stmt->fetch();

    if ($stmt->num_rows == 0) {
        header("Location: dashboard.php"); 
    }




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile: <?=ucfirst($_SESSION['username']);?></title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">

<h2>Edit Profile: <?=ucfirst($_SESSION['username']);?></h2>
<?php include 'nav_bar.php';?>

<form method="POST" >
    <label for="username">Username:</label><br>
    <input type="text" id="username" name="username" required 
    value=<?=$db_username;?>><br><br>

    <label for="email">Email:</label><br>
    <input type="email" id="email" name="email" required
    value=<?=$db_email;?>><br><br>

    <label for="age">Age:</label><br>
    <input type="number" id="age" name="age"
    value=<?=$db_age;?>
    min=1 max=120 step=1 required><br><br>

    <label for="height">Height:</label><br>
    <input type="number" id="height" name="height" min=1 max=999.99 
    step=0.5 value=<?=$db_height;?> required><br><br>

        <label for="weight">Weight:</label><br>
    <input type="number" id="weight" name="weight"
    value=<?=$db_weight;?>    
    min=1 max=999.99 step=0.5 required><br><br>

    <button type="submit">Edit Profile</button>
</form>
</div>
</body>
</html>
