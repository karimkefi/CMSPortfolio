<?php

/**
 *The function takes 2 parameters (database PDO and string) runs an SQL query to pull articles from DB
 *
 * @var $db Database Class PDO
 * @var $elementString string value
 *
 *@return array of all records from the database that fit the SLQ statement
 */
function getArticleTitles($db, $elementString) {
    if ($elementString == 'title' || $elementString == 'section') {
        $querySection = $db->prepare("SELECT DISTINCT ". $elementString . " FROM `article`;");
        $querySection->execute();
        $resultArray = $querySection->fetchAll();
        return $resultArray;

    }
}

/**
 *The function takes an array and string (Key) and loops through array and returns the values associated with Key
 *
 *@$elements associative array
 *@$key string representing the key we are interested in returning
 *
 *@return string of html<options> which will be used for dropdown
 */
function createDropdownfromDB ($elements,$key) {
    $resultString = '';
    foreach ($elements as $e) {
        $resultString .= '<option value="'.$e[$key].'">'.$e[$key].'</option>';
    }
    return $resultString;
}



?>