<?php

function getArticleFromDB() {
    $selectTitle = $_POST['selectedTitle'];

    $db = new PDO('mysql:host=127.0.0.1; dbname=karimPortfolioCMS', 'root');
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

    $querySelect = $db->prepare("SELECT `article`.`id`, `articleText`, `imageName`, `source`, `imageID`, `section`, `title` 
                                            FROM `article`
                                            INNER JOIN `images` ON `article`.`imageID` = `images`.`id`
                                            WHERE `title` = :selectedTitle;");

    $querySelect->bindParam(':selectedTitle', $selectTitle);
    $querySelect->execute();
    return $querySelect->fetchAll();
}


function getContactFromDB($string) {
    $db = new PDO('mysql:host=127.0.0.1; dbname=karimPortfolioCMS', 'root');
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

    $querySelect = $db->prepare("SELECT `id`, `Type`, `details`,
                                            FROM `contact`
                                            WHERE `Type` = :type;");

    $querySelect->bindParam(':type', $string);
    $querySelect->execute();
    return $querySelect->fetchAll();
}


?>