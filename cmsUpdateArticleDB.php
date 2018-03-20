<?php


function updateDeleteFlag ($itemID) {
    $db = new PDO('mysql:host=127.0.0.1; dbname=karimPortfolioCMS', 'root');

    $queryDel = $db->prepare("UPDATE `article`
                                    SET `deleteFlag` = 1
                                    WHERE `article`.`id` = :itemID;");

    $queryDel->bindParam(':itemID', $itemID);

    $resultBool = $queryDel->execute();
    return $resultBool;
}


function addNewImage ($imageName, $alt, $source) {
    $db = new PDO('mysql:host=127.0.0.1; dbname=karimPortfolioCMS', 'root');

    $queryAdd = $db->prepare("REPLACE INTO `images` (`imageName`, `alt`, `source`) 
                                      VALUES (:imageName, :alt, :source);");

    $queryAdd->bindParam(':imageName', $imageName);
    $queryAdd->bindParam(':alt', $alt);
    $queryAdd->bindParam(':source', $source);

    $queryAdd->execute();
    $lastImageInsertId = $db->lastInsertId();
    return $lastImageInsertId;
}


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


$actionType = $_POST['updateArticle'];

$existingArticleID = $_POST['articleDB_id'];
$existingImageID = $_POST['articleDB_IMGid'];
$existingImageName = $_POST['existingImageName'];
$existingImageSource = $_POST['articleDB_IMGsource'];
$existingSection = $_POST['articleDB_section'];

$newTitle = $_POST['newTitle'];
$newArticle = $_POST['newArticleText'];
$newImage = $_POST['newArticleImage'];


switch ($actionType) {
    case 'Delete':
        updateDeleteFlag($existingArticleID);
        break;
    case 'Edit':
        addNewImage($existingImageName, $existingImageName, $existingImageSource);
        editArticle($newTitle, $existingSection,$newArticle,$existingImageID);
        break;
    default:
        echo '> No action selected yet <';
}

header("Location: cmsHomePage.php");

?>