<?php


function getArticleTitles($db, $elementString) {
    $querySection = $db->prepare("SELECT DISTINCT " . $elementString . " FROM `article`;");
    $querySection->execute();
    $resultArray = $querySection->fetchAll();
    return $resultArray;
}


function getValuesfromDB ($elements,$key) {
    $resultString = '';
    foreach ($elements as $e) {
        $resultString .= '<option value="'.$e[$key].'">'.$e[$key].'</option>';
    }
    return $resultString;
}



?>