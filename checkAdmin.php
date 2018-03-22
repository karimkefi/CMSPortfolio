<?php


/**
 *The function takes 2 values (Admin user and password) and checks if the pair match fixed values
 *
 *@$user string value
 *@$passWord string value
 *
 *@return boolean result to confirm correct details
 */
function userCredentials ($user, $passWord) {
    if ($user === 'kefi' && $passWord === 'A1') {
        $_SESSION['userLoggedIn'] = true;
        return true;
    } else {
        $_SESSION['userLoggedIn'] = false;
        return false;
    }
}

/**
 *The function checks variable is a valid string
 *
 *@$stringInput variable passed into the function (this can be any datatype
 *
 *@return boolean result to confirm if variable is a string
 */
function isValidString ($stringInput) {
    return is_string($stringInput);
}


/**
 *The function checks passed a string variable through 3 modifications to sanitise
 * 1. Strips out slashes, 2.trim white spaces either side, 3. Escapes special characters.
 *
 *@$stringInput string variable passed into the function
 *
 *@return sanitised string value
 */
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