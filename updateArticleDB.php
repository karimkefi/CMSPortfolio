<?php

/**
 *The function takes 2 parameters (database PDO and string) runs an SQL query to update a delete flag in the database
 *
 *@$db Database Class PDO
 *@$itemID string is passed into SQL via bindparameter. This is the Title
 *
 *@return boolean to display whether the SQL query has been executed
 */
function updateDeleteFlag ($db, $itemID) {
    $queryDel = $db->prepare("UPDATE `article`
                                    SET `deleteFlag` = 1
                                    WHERE `article`.`id` = :itemID;");

    $queryDel->bindParam(':itemID', $itemID);

    $resultBool = $queryDel->execute();
    return $resultBool;
}

/**
 *The function takes 2 parameters (database PDO and string) runs an SQL query to get image ID
 *
 *@$db Database Class PDO
 *@$imageName string is passed into SQL via bindparameter. This is the image name found in the image source
 *
 *@return array of image id which match the image name
 */
function findImage($db, $imageName) {
    $queryFindImage = $db->prepare("SELECT `id` FROM `images`
                                        WHERE `source` LIKE concat('%', :imageName, '%');");

    $queryFindImage->bindParam(':imageName', $imageName);

    $queryFindImage->execute();
    $existingImageID = $queryFindImage->fetchAll();
    return $existingImageID;
}

/**
 *The function takes 2 parameters (database PDO and string) runs an SQL query to add record to image and return added id
 *
 *@$db Database Class PDO
 *@$imageName string is passed into SQL via bindparameter. This is the image name
 *@$alt string is passed into SQL via bindparameter. This is the image alt
 *@$source string is passed into SQL via bindparameter. This is the image relative path
 *
 *@return last inserted image id from the database image table
 */
function addNewImage ($db, $imageName, $alt, $source) {
    $queryAdd = $db->prepare("REPLACE INTO `images` (`imageName`, `alt`, `source`)
                                      VALUES (:imageName, :alt, :source);");

    $queryAdd->bindParam(':imageName', $imageName);
    $queryAdd->bindParam(':alt', $alt);
    $queryAdd->bindParam(':source', $source);

    $queryAdd->execute();
    $lastImageInsertId = $db->lastInsertId();
    return $lastImageInsertId;
}

/**
 *The function takes 2 parameters (database PDO and string) runs an SQL query to add record to article table
 *
 *@$db Database Class PDO
 *@$title string is passed into SQL via bindparameter. This is the article title
 *@$section string is passed into SQL via bindparameter. This is the image alt
 *@$articleText string is passed into SQL via bindparameter. This is the text in the article
 *@$imageID string is passed into SQL via bindparameter. This is the image ID
 *
 *@return last inserted image id from the database image table
 */
function editArticle ($db, $title, $section, $articleText, $imageID) {
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