<!DOCTYPE html>
<html lang="en">

<?php

$db = new PDO('mysql:host=127.0.0.1; dbname=karimPortfolioCMS', 'root');
$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);


require_once 'dropdownDB.php';
require_once 'getArticleImgDB.php';
require_once 'updateArticleDB.php';

$dropdownKey = 'section';
$dropdownArray = getArticleTitles($db, $dropdownKey);
$sectionDropdown = getValuesfromDB($dropdownArray, $dropdownKey);

$newTitle = $_POST['newTitle'];
$newArticle = $_POST['newArticleText'];
$newImage = $_POST['newArticleImage'];
$newSection = $_POST['selectedSection'];

if(empty(findImage($newImage))) {
    echo '> > Ensure you have added image to to the DB first < <';
}else {
    $newImageID = findImage($newImage)[0]['id'];
    editArticle($newTitle, $newSection, $newArticle, $newImageID);
    echo '> > New Article and Image Updated < <';
}

?>

<head>
    <meta charset="UTF-8">
    <title>CMS New Article Page</title>
    <link href="style.css" rel="stylesheet" type="text/css">
    <link href="normalize.css" rel="stylesheet" type="text/css">
</head>

<body>
<h1>New Article Page</h1>

<form method="post" action="updateArticleDB.php">
    <h3>Title (DB only):</h3>
    <input type="text" name="newTitle">
    <br>
    <h3>Section (DB only):</h3>
    <select name="selectedSection">
        <?php
        echo $sectionDropdown;
        ?>
    </select>
    <br>
    <h3>Article Text:</h3>
    <textarea rows="8" cols="50" name="newArticleText"></textarea><br>
    <h3>Image Name:</h3>

    <input type="file" name="newArticleImage"><br>
    <input style="margin: 10px" type="submit" name="updateArticle" value="Add">
</form>


</body>
</html>