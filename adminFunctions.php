<?php

/**
 *The function checks passed a string variable through 3 modifications to sanitise
 * 1. Strips out slashes, 2.trim white spaces either side, 3. Escapes special characters.
 *
 *@$stringInput string variable passed into the function
 *
 *@return sanitised string value
 */
function sanitiseString (string $stringInput):string {
    $temp1 = stripslashes($stringInput);
    $temp2 = trim($temp1);
    $temp3 = htmlspecialchars($temp2);
    return $temp3;
}

/**
 *The function retrieves the password from the database based off the userName, de-hashes DB password and compares to input password
 *
 *@$enteredPassword string value
 *@$enteredUName string value
 *
 *@return boolean result to confirm passwords match
 */
function pullAndComparePasswords ($enteredPassword, $enteredUName) {
    $db = new PDO('mysql:host=127.0.0.1; dbname=karimPortfolioCMS', 'root');

    $query = $db->prepare("SELECT `herbs` FROM `mango` WHERE `fruits` = :uName;");

    $query->bindParam(':uName', $enteredUName);
    $query->execute();
    $passwordDB = $query->fetch();

    return password_verify($enteredPassword, $passwordDB[0]);
};



?>