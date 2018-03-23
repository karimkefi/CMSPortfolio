<?php


function updateDeleteFlag ($db, $itemID) {

    $queryDel = $db->prepare("UPDATE `article`
                                    SET `deleteFlag` = 1
                                    WHERE `article`.`id` = :itemID;");

    $queryDel->bindParam(':itemID', $itemID);

    $resultBool = $queryDel->execute();
    return $resultBool;
}

function findImage($db, $imageName) {

    $queryFindImage = $db->prepare("SELECT `id` FROM `images`
                                        WHERE `source` LIKE concat('%', :imageName, '%');");

    $queryFindImage->bindParam(':imageName', $imageName);

    $queryFindImage->execute();
    $existingImageID = $queryFindImage->fetchAll();
    return $existingImageID;
}


//function addNewImage ($db, $imageName, $alt, $source) {
//
//    $queryAdd = $db->prepare("REPLACE INTO `images` (`imageName`, `alt`, `source`)
//                                      VALUES (:imageName, :alt, :source);");
//
//    $queryAdd->bindParam(':imageName', $imageName);
//    $queryAdd->bindParam(':alt', $alt);
//    $queryAdd->bindParam(':source', $source);
//
//    $queryAdd->execute();
//    $lastImageInsertId = $db->lastInsertId();
//    return $lastImageInsertId;
//}


function editArticle ($title, $section, $articleText, $imageID) {
    $db = new PDO('mysql:host=127.0.0.1; dbname=karimPortfolioCMS', 'root');

    $queryEdit = $db->prepare("REPLACE INTO `article` (`title`, `section`, `articleText`, `imageID`) 
                                      VALUES (:title, :section, :articleText, :imageID);");

    $queryEdit->bindParam(':title', $title);
    $queryEdit->bindParam(':section', $section);
    $queryEdit->bindParam(':articleText', $articleText);
    $queryEdit->bindParam(':imageID', $imageID);

    $resultBool = $queryEdit->execute();
    return $resultBool;
}


?>