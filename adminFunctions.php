<?php

/**
 *The function checks passed a string variable through 3 modifications to sanitise
 * 1. Strips out slashes, 2.trim white spaces either side, 3. Escapes special characters.
 *
 *@var $stringInput string variable passed into the function
 *
 *@return  string value
 */
function sanitiseString ($stringInput) {
    $temp1 = stripslashes($stringInput);
    $temp2 = trim($temp1);
    $temp3 = htmlspecialchars($temp2);
    return $temp3;
}

/**
 *The function retrieves the password from the database based off the userName, de-hashes DB password and compares to input password
 *
 *@var $db DB class used to query
 *@var $enteredPassword string value, representing the user entered password
 *@var $enteredUName string value, representing the user entered name
 *
 *@return boolean result to confirm passwords match
 */
function pullAndComparePasswords ($db, $enteredPassword, $enteredUName) {

    $query = $db->prepare("SELECT `herbs` FROM `mango` WHERE `fruits` = :uName;");

    $query->bindParam(':uName', $enteredUName);
    $query->execute();
    $passwordDB = $query->fetch();

    return password_verify($enteredPassword, $passwordDB['herbs']);
};


?>