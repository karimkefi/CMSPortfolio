<?php

require_once 'DbConnect.php';
$db = connectToDB();

function getArticleFromDB($db, $selectTitle) {

    $querySelect = $db->prepare("SELECT `article`.`id`, `articleText`, `imageName`, `source`, `imageID`, `section`, `title`, `alt` 
                                  FROM `article`
                                  INNER JOIN `images` ON `article`.`imageID` = `images`.`id`
                                  WHERE `title` = :selectedTitle AND `deleteFlag` = 0;");

    $querySelect->bindParam(':selectedTitle', $selectTitle);
    $querySelect->execute();
    return $querySelect->fetch();
}


function getContactFromDB($db, $string) {

    $querySelect = $db->prepare("SELECT `id`, `Type`, `details`,
                                  FROM `contact`
                                  WHERE `Type` = :type;");

    $querySelect->bindParam(':type', $string);
    $querySelect->execute();
    return $querySelect->fetchAll();
}



function getAllArticlesFromDB($db, $selectSection) {

    $querySelect = $db->prepare("SELECT `article`.`id`, `articleText`, `imageName`, `source`, `imageID`, `section`, `title`, `alt`, `gitHubLink` , `webLink` 
                                  FROM `article`
                                  INNER JOIN `images` ON `article`.`imageID` = `images`.`id`
                                  WHERE `section` = :selectSection AND `deleteFlag` = 0;");

    $querySelect->bindParam(':selectSection', $selectSection);
    $querySelect->execute();
    return $querySelect->fetchAll();
}

?>