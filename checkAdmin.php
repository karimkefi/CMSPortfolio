<?php

function userCredentials ($user, $passWord) {
    if ($user == 'kefi' && $passWord == 'A1') {
        $_SESSION['userLoggedIn'] = true;
        return true;
    } else {
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

$userEmail = $_POST['formInputEmail'];
$userPassword = $_POST['formInputPswd'];

session_start();

if (userCredentials($userEmail, $userPassword)) {
    header("Location: cmsEditPage.php");
} else {
    header("Location: index.php");
}

?>