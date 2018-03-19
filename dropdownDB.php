<?php

function getValuesfromDB ($titles) {
    $resultString = '';
    foreach ($titles as $title) {
        $resultString .= '<option value="'.$title['title'].'">'.$title['title'].'</option>';
    }
    return $resultString;
}


$db = new PDO('mysql:host=127.0.0.1; dbname=karimPortfolioCMS', 'root');
$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

//$queryAbout = $db->prepare("SELECT `title` FROM `article` WHERE `section` = 'About';");
$queryAbout = $db->prepare("SELECT `title` FROM `article`;");
$queryAbout->execute();
$results = $queryAbout->fetchAll();
$aboutDropdown = getValuesfromDB($results);


//$queryPortfolio = $db->prepare("SELECT `title` FROM `article` WHERE `section` = 'Portfolio';");
//$queryPortfolio->execute();
//$results = $queryPortfolio->fetchAll();
//$portfolioDropdown = getValuesfromDB($results);


?>