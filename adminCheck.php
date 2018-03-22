<?php

require ('adminFunctions.php');

$userName = $_POST['InputUserName'];
$userPassword = $_POST['InputPswd'];

session_start();

$boolResult = pullAndComparePasswords ($userPassword, $userName);

if ($boolResult) {
    $_SESSION['userLoggedIn'] = true;
    header("Location: cmsHomePage.php");
} else {
    $_SESSION['userLoggedIn'] = false;
    $_SESSION['invalidcombo'] = true;
    header("Location: adminLogin.php");
}


?>