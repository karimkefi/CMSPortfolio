<?php

require 'adminFunctions.php';
require_once 'DbConnect.php';
$db = connectToDB();

$userName = sanitiseString($_POST['InputUserName']);
$userPassword = sanitiseString($_POST['InputPswd']);

session_start();

$boolResult = pullAndComparePasswords($db, $userPassword, $userName);

if ($boolResult) {
    $_SESSION['userLoggedIn'] = true;
    header("Location: cmsHomePage.php");
} else {
    $_SESSION['userLoggedIn'] = false;
    $_SESSION['invalidcombo'] = true;
    header("Location: adminLogin.php");
}

?>