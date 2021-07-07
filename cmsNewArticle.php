<!DOCTYPE html>

<?php

session_start();
if (!$_SESSION['userLoggedIn']){
    header("Location: adminLogin.php");
}

require_once 'DbConnect.php';
require_once 'dropdownDB.php';
require_once 'getArticleImgDB.php';
require_once 'updateArticleDB.php';

$db = connectToDB();

$dropdownKey = 'section';
$dropdownArray = getArticleTitles($db, $dropdownKey);
$sectionDropdown = createDropdownfromDB($dropdownArray, $dropdownKey);

$newTitle = $_POST['newTitle'];
$newArticle = $_POST['newArticleText'];
$newImage = $_POST['newArticleImage'];
$newSection = $_POST['selectedSection'];

if(empty(findImage($db, $newImage))) {
    echo '> > Ensure you have added image to the DB first !< <';
    echo '<div><a href="cmsNewImageSelect.php">Add new image to Database</a></div>';
}else {
    $newImageID = findImage($db, $newImage)[0]['id'];
    editArticle($db, $newTitle, $newSection, $newArticle, $newImageID);
    echo '> > New Article and Image Updated < <';
}

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CMS New Article Page</title>
    <link href="css/cmsStyle.css" rel="stylesheet" type="text/css">
    <link href="css/normalize.css" rel="stylesheet" type="text/css">
</head>

<body>

    <h1>New Article Page</h1>
    <form method="post" action="cmsNewArticle.php">

        <label for="title" >Title (DB only):</label>
        <input id="title" type="text" name="newTitle">

        <label for="section">Section (DB only):</label>
        <select id="section" name="selectedSection"><?php echo $sectionDropdown;?></select>

        <label for="article">Article Text:</label>
        <textarea id="article" rows="8" cols="50" name="newArticleText"></textarea>

        <h3>Image Name:</h3>
        <input type="file" name="newArticleImage"><br>
        <input type="submit" name="updateArticle" value="Add">
    </form>

    <div>
        <a href="cmsHomePage.php">Return to CMS Homepage</a>
    </div>

</body>
</html>