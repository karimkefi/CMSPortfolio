<?php

function getValuesfromDB ($elements,$key) {
    $resultString = '';
    foreach ($elements as $e) {
        $resultString .= '<option value="'.$e[$key].'">'.$e[$key].'</option>';
    }
    return $resultString;
}


$db = new PDO('mysql:host=127.0.0.1; dbname=karimPortfolioCMS', 'root');
$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);


//$queryAbout = $db->prepare("SELECT `title` FROM `article`;");
//$queryAbout->execute();
//$results = $queryAbout->fetchAll();
//$aboutDropdown = getValuesfromDB($resultArray);

$queryTitle = $db->prepare("SELECT `title` FROM `article`;");
$queryTitle->execute();
$resultArray = $queryTitle->fetchAll();
$elementString = 'title';
$titleDropdown = getValuesfromDB($resultArray, $elementString);


$querySection = $db->prepare("SELECT `section` FROM `article`;");
$querySection->execute();
$resultArray = $querySection->fetchAll();
$elementString = 'section';
$aboutDropdown = getValuesfromDB($resultArray, $elementString);

?>