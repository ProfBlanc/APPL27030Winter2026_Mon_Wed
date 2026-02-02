<?php

function ensure_not_empty($data){

    return !empty($data);
}

function check_login($uname, $pwd){

    return in_array($uname, ["user", "admin", "test"]) && in_array($pwd, ["pass", "pass1"]);
}


$uname = $_POST['uname'] ?? "";
$email = $_POST['email'] ?? "";
$pwd = $_POST['pwd'] ?? "";
$message = "";
$error = "";

if(isset($_POST['submit'])){


if(ensure_not_empty($uname) && ensure_not_empty($pwd) && ensure_not_empty($email)){

$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$uname = filter_input(INPUT_POST, 'uname', FILTER_DEFAULT);
$pwd = filter_input(INPUT_POST, 'pwd', FILTER_DEFAULT);

if(check_login($uname, $pwd)){
    $message = "Succesful login";
}
else{
    $error = "Incorrect Login!";
}

}
else{
    $error = "All fields must be filled out";
}


}


?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
if(strlen($message) > 0){
    echo "<div style='height: 50px; background: lightgreen;color: white; border: 1px solid '>$message</div>";
}
else if(!empty($error)){
        echo "<div style='height: 50px; background: red; color: white; border: 1px solid '>$error</div>";

}
?>
<form method='post' novalidate>
    <legend>
        Username
</legend>
<input type='text' name="uname" value='<?php echo $uname;?>' placeholder="Enter username" />
<br/>
<br/>
    <legend>
        Email
</legend>
<input type='email' name="email" value='<?=$email;?>'  placeholder="Enter Email" />
<br/>
<br/>
    <legend>
        Password
</legend>
<input type='password' name="pwd" value='<?php print($pwd);?>' placeholder="Enter Password" />
<br/>
<br/>
<input type="submit" value="submit" name="submit" />
</form>
</body>
</html>