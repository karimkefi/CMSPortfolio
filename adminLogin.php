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

<form method="post" action="check.php">
    Email:<input type="text" name="formInputEmail"><br>
    Password:<input type="text" name="formInputPswd"><br>
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