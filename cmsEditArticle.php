<!DOCTYPE html>

<?php

require_once 'DbConnect.php';
require_once 'dropdownDB.php';
require_once 'getArticleImgDB.php';
require_once 'updateArticleDB.php';

$dropdownKey = 'title';
$dropdownArray = getArticleTitles($db, $dropdownKey);
$titleDropdown = createDropdownfromDB($dropdownArray, $dropdownKey);

$actionType = $_POST['updateArticle'];

$selectTitle = $_POST['selectedTitle'];
$existingArticleID = $_POST['articleDB_id'];
$existingSection = $_POST['articleDB_section'];
$existingImageID = $_POST['articleDB_IMGid'];

$newTitle = $_POST['newTitle'];
$newArticle = $_POST['newArticleText'];
$newImage = $_POST['newArticleImage'];

switch ($actionType) {
    case 'Delete':
        updateDeleteFlag($db, $existingArticleID);
        echo '> > Article has been deleted < <';
        break;
    case 'Edit':
        if (empty($newImage)) {
            editArticle($db, $selectTitle, $existingSection, $newArticle, $existingImageID);
            echo '> > Article Updated < <';
        } else {
            if(empty(findImage($db, $newImage))) {
                echo '> > You need to add to the Image to the DB first < <';
            } else {
                $newImageID = findImage($db, $newImage)['id'];
                editArticle($db, $newTitle, $existingSection, $newArticle, $newImageID);
                echo '> > Article and Image Updated < <';
            }
        }
        break;
    default:
        echo '> > No action selected yet < <';
}

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CMS Edit Article Page</title>
    <link href="cmsStyle.css" rel="stylesheet" type="text/css">
    <link href="normalize.css" rel="stylesheet" type="text/css">
</head>

<body>
<h1>Edit Article Page - About Me and Portfolio</h1>

    <form method="post" action="cmsEditArticle.php">
        <select name="selectedTitle">
            <?php
            echo $titleDropdown;
            ?>
        </select>
        <input class="cmsMargin" type="submit" value="Pull from DB">
    </form>
    <div>
        <?php
        $articleDB_id = getArticleFromDB($db, $selectTitle)['id'];
        echo 'article ID:'.$articleDB_id.' / ';

        $articleDB_IMGid = getArticleFromDB($db, $selectTitle)['imageID'];
        echo 'image ID:'.$articleDB_IMGid.' / ';

        $articleDB_section = getArticleFromDB($db, $selectTitle)['section'];
        echo 'Section:'.$articleDB_section;
        ?>
    </div>

    <form method="post" action="cmsEditArticle.php">

        <input type="hidden" name="articleDB_id" value="<?php echo getArticleFromDB($db, $selectTitle)['id'];?>" >
        <input type="hidden" name="articleDB_IMGid" value="<?php echo getArticleFromDB($db, $selectTitle)['imageID'];?>" >
        <input type="hidden" name="articleDB_IMGsource" value="<?php echo getArticleFromDB($db, $selectTitle)['source'];?>" >
        <input type="hidden" name="articleDB_IMGsource" value="<?php echo getArticleFromDB($db, $selectTitle)['imageName'];?>" >

        <h3>Title (DB only):</h3>
        <input type="text" name="selectedTitle" value="<?php echo getArticleFromDB($db, $selectTitle)['title'];?>" >
        <br>

        <h3>Section (DB only):</h3>
        <input type="text" name="articleDB_section" value="<?php echo getArticleFromDB($db, $selectTitle)['section'];?>" >
        <br>

        <h3>Article Text:</h3>
        <textarea rows="8" cols="80" name="newArticleText"><?php echo getArticleFromDB($db, $selectTitle)['articleText'];?></textarea>

        <h3>Image:</h3>
        <img class="articleBox" src="<?php echo getArticleFromDB($db, $selectTitle)['source'];?>"><br>
        <input type="file" name="newArticleImage"><br>

        <input class="cmsMargin" type="submit" name="updateArticle" value="Edit">
        <input class="cmsMargin" type="submit" name="updateArticle" value="Delete">
    </form>

    <div>
        <a href="cmsHomePage.php">Return to CMS Homepage</a>
    </div>

</body>
</html>