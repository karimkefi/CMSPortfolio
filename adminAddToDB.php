<?php

/**
 *The function takes a value and hashes this using BCrypt algo
 *
 *@$password string value which will be hashed
 *
 *@return string result of the salting (adding extra string to input) and hashing
 */
function saltAndHash ($password) {
    $salt = 'onetwobucklemyshoe';
    $salted = $salt.$password;
    $hashed = password_hash($salted, PASSWORD_BCRYPT);
    return $hashed;
}

/**
 *The function takes 2 values (Admin user and password) and adds to SQL database
 *
 *@$user string value
 *@$validPassword salt and hashed string to be added to DB
 *
 *@return boolean result to confirm this has been executed.
 */
function addUserAndPasswordToDB ($user, $validPassword) {
    $db = new PDO('mysql:host=127.0.0.1; dbname=karimPortfolioCMS', 'root');

    $query = $db->prepare("INSERT INTO `mango` (`fruits`, `herbs`) VALUES (:uName, :passW);");

    $query->bindParam(':uName', $user);
    $query->bindParam(':passW', $validPassword);

    $resultBool = $queryDel->execute();
    return $resultBool;
}

/**
 *The function retrieves the password from the database based off the userName, de-hashes DB password and compares to input password
 *
 *@$enteredPassword string value
 *@$enteredUName string value
 *
 *@return boolean result to confirm passwords match
 */
function comparePasswords ($enteredPassword, $enteredUName) {
    $db = new PDO('mysql:host=127.0.0.1; dbname=karimPortfolioCMS', 'root');

    $query = $db->prepare("SELECT `herbs` FROM `mango` WHERE `fruits` = :uName;");

    $query->bindParam(':uName', $enteredUName);
    $passwordDB = $query->execute();

    return password_verify($enteredPassword, $passwordDB[0]);
};


$aa = saltAndHash('A1');
echo $aa;
echo addUserAndPasswordToDB('kefi',$aa);
echo comparePasswords('A1', 'kefi');

?>

