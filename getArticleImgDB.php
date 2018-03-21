<?php


function getArticleFromDB($db, $selectTitle) {

    $querySelect = $db->prepare("SELECT `article`.`id`, `articleText`, `imageName`, `source`, `imageID`, `section`, `title` 
                                            FROM `article`
                                            INNER JOIN `images` ON `article`.`imageID` = `images`.`id`
                                            WHERE `title` = :selectedTitle;");

    $querySelect->bindParam(':selectedTitle', $selectTitle);
    $querySelect->execute();
    return $querySelect->fetchAll();
}


function getContactFromDB($db, $string) {

    $querySelect = $db->prepare("SELECT `id`, `Type`, `details`,
                                            FROM `contact`
                                            WHERE `Type` = :type;");

    $querySelect->bindParam(':type', $string);
    $querySelect->execute();
    return $querySelect->fetchAll();
}


?>