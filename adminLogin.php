<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login Form</title>
</head>

<body>
<?php
session_start();
if ($_SESSION['userLoggedIn']){
    header("Location: account.php");
}
?>

<form method="post" action="checkAdmin.php">
    User Name:<input type="text" name="InputUserName"><br>
    Password:<input type="text" name="InputPswd"><br>
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