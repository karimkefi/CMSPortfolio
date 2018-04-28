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
    <link href="css/cmsStyle.css" rel="stylesheet" type="text/css">
    <link href="css/normalize.css" rel="stylesheet" type="text/css">
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
        $articleFromDB = getArticleFromDB($db, $selectTitle);
        $articleDB_id = $articleFromDB['id'];
        echo 'article ID:'.$articleDB_id.' / ';
        $articleDB_IMGid = $articleFromDB['imageID'];
        echo 'image ID:'.$articleDB_IMGid.' / ';
        $articleDB_section = $articleFromDB['section'];
        echo 'Section :'.$articleDB_section.' / ';
        ?>
    </div>

    <form method="post" action="cmsEditArticle.php">

        <input type="hidden" name="articleDB_id" value="<?php echo $articleFromDB['id'];?>" >
        <input type="hidden" name="articleDB_IMGid" value="<?php echo $articleFromDB['imageID'];?>" >
        <input type="hidden" name="articleDB_IMGsource" value="<?php echo $articleFromDB['source'];?>" >
        <input type="hidden" name="articleDB_IMGsource" value="<?php echo $articleFromDB['imageName'];?>" >

        <h3>Title (DB only):</h3>
        <input type="text" name="selectedTitle" value="<?php echo $articleFromDB['title'];?>" >
        <br>

        <h3>Section (DB only):</h3>
        <input type="text" name="articleDB_section" value="<?php echo $articleFromDB['section'];?>" >
        <br>

        <h3>Article Text:</h3>
        <textarea rows="8" cols="80" name="newArticleText"><?php echo $articleFromDB['articleText'];?></textarea>

        <h3>Image:</h3>
        <img class="articleBox" src="<?php echo $articleFromDB['source'];?>"><br>
        <input type="file" name="newArticleImage"><br>

        <input class="cmsMargin" type="submit" name="updateArticle" value="Edit">
        <input class="cmsMargin" type="submit" name="updateArticle" value="Delete">
    </form>

    <div>
        <a href="cmsHomePage.php">Return to CMS Homepage</a>
    </div>

    <section class"sideArticleSelect">
        <h3>Select articles to be displayed</h3>

        <h4>About Me:</h4>
        <form method="post" action="cmsEditArticle.php">
            Top:<select name="selectedTitle"><?php echo $titleDropdown;?></select>
            Middle:<select name="selectedTitle"><?php echo $titleDropdown;?></select>
            Bottom:<select name="selectedTitle"><?php echo $titleDropdown;?></select>
            <input class="cmsMargin" type="submit" value="Set About Me">
        </form>
        <h4>Portfolio:</h4>
        <form method="post" action="cmsEditArticle.php">
            Top:<select name="selectedTitle"><?php echo $titleDropdown;?></select>
            Middle:<select name="selectedTitle"><?php echo $titleDropdown;?></select>
            Bottom:<select name="selectedTitle"><?php echo $titleDropdown;?></select>
            <input class="cmsMargin" type="submit" value="Set Portfolio">
        </form>
    </section>

</body>
</html>