<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login Form</title>
</head>

<body>
<?php
session_start();
if ($_SESSION['userLoggedIn']){
    header("Location: cmsHomePage.php");
}
?>

<form method="post" action="checkAdmin.php">
    <label for="userName">User Name:</label>
    <input id="userName" type="text" name="InputUserName">
    <p></p>
    <label for="passWord" >Password:</label>
    <input id="passWord" type="text" name="InputPswd">
    <p></p>
    <input type="submit" value="Submit...">
</form>

<?php
if ($_SESSION['invalidEmail']){
    echo 'invalid email characters';
} elseif ($_SESSION['invalidPassword']) {
    echo 'invalid password characters';
} else {
    echo '';
}
?>

</body>

</html>