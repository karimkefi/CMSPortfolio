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

if(empty(findImage($db, $newImage))) {
    echo '> > Ensure you have added image to to the DB first < <';
} else {
    $newImageID = findImage($db, $newImage)[0]['id'];
    editArticle($db, $newTitle, $newSection, $newArticle, $newImageID);
    echo '> > New Article and Image Added < <';
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

<form method="post" action="cmsNewArticle.php">

    <label for="title" >Title (DB only):</label><br>
    <input id="title" type="text" name="newTitle"><br>

    <label for="section">Section (DB only):</label><br>
    <select id="section" name="selectedSection"><?php echo $sectionDropdown;?></select><br>

    <label for="article">Article Text:</label><br>
    <textarea id="article" rows="8" cols="50" name="newArticleText"></textarea>

    <h3>Image Name:</h3><br>
    <input type="file" name="newArticleImage">
    <p></p>

    <input type="submit" name="updateArticle" value="Add">
</form>

<p></p>
<a href="cmsHomePage.php">CMS Home</a>

</body>
</html>