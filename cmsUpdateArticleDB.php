<?php

//-------------FUNCTIONS START -----------------------------------------

function updateDeleteFlag ($itemID) {
    $db = new PDO('mysql:host=127.0.0.1; dbname=karimPortfolioCMS', 'root');

    $queryDel = $db->prepare("UPDATE `article`
                                    SET `deleteFlag` = 1
                                    WHERE `article`.`id` = :itemID;");

    $queryDel->bindParam(':itemID', $itemID);

    $resultBool = $queryDel->execute();
    return $resultBool;
}

function findImage($imageName) {
    $db = new PDO('mysql:host=127.0.0.1; dbname=karimPortfolioCMS', 'root');

    $queryFindImage = $db->prepare("SELECT `id` FROM `images`
                                        WHERE `source` LIKE concat('%', :imageName, '%');");

    $queryFindImage->bindParam(':imageName', $imageName);

    $queryFindImage->execute();
    $existingImageID = $queryFindImage->fetchAll();
    return $existingImageID;
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

//-------------FUNCTIONS END -----------------------------------------


$actionType = $_POST['updateArticle'];

$existingArticleID = $_POST['articleDB_id'];
$existingSection = $_POST['articleDB_section'];

$existingImageID = $_POST['articleDB_IMGid'];
$existingImageName = $_POST['existingImageName'];
$existingImageSource = $_POST['articleDB_IMGsource'];

$newTitle = $_POST['newTitle'];
$newArticle = $_POST['newArticleText'];
$newImage = $_POST['newArticleImage'];
$newSection = $_POST['selectedSection'];


switch ($actionType) {
    case 'Delete':
        updateDeleteFlag($existingArticleID);
        break;
    case 'Edit':
        if (empty($newImage)) {
            editArticle($newTitle, $existingSection, $newArticle, $existingImageID);
            echo 'Article Updated';
        }else{
            if(empty(findImage($newImage))) {
                echo 'You need to add to the Image to the DB first';
            }else{
                $newImageID = findImage($newImage)[0]['id'];
                editArticle($newTitle, $existingSection, $newArticle, $newImageID);
                echo 'Article and Image Updated';
            }
        }
        break;
    case 'Add':
        if(empty(findImage($newImage))) {
            echo 'You need to add to the Image to the DB first';
        }else {
            $newImageID = findImage($newImage)[0]['id'];
            editArticle($newTitle, $newSection, $newArticle, $newImageID);
            echo 'New Article and Image Updated';
        }
        break;
    default:
        echo '> No action selected yet <';
}

?>