<?php

function userCredentials ($user, $passWord) {
    if ($user == 'kefi' && $passWord == 'A1') {
        $_SESSION['userLoggedIn'] = true;
        return true;
    } else {
        $_SESSION['userLoggedIn'] = false;
        return false;
    }
}

function isValidString ($stringInput) {
    is_string($stringInput);
}

function sanitiseString ($stringInput) {
    $temp1 = stripslashes($stringInput);
    $temp2 = trim($temp1);
    $temp3 = htmlspecialchars($temp2);
    return $temp3;
}


//--------------------------------------------------------------------------------

$userName = $_POST['InputUserName'];
$userPassword = $_POST['InputPswd'];

session_start();

if (userCredentials($userName, $userPassword)) {
    header("Location: cmsHomePage.php");
} else {
    header("Location: index.php");
}

?>