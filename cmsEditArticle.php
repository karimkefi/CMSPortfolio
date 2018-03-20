<!DOCTYPE html>
<html lang="en">

<?php
    require_once 'dropdownDB.php';
    require_once 'getArticleImgDB.php';
    require_once 'cmsUpdateArticleDB.php';
?>


<head>
    <meta charset="UTF-8">
    <title>CMS Edit Article Page</title>
    <link href="style.css" rel="stylesheet" type="text/css">
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
        <input style="margin: 10px" type="submit" value="Pull from DB">
    </form>

    <div>
        <?php
        $articleDB_id = getArticleFromDB()[0]['id'];
        echo 'article ID:'.$articleDB_id.' / ';

        $articleDB_IMGid = getArticleFromDB()[0]['imageID'];
        echo 'image ID:'.$articleDB_IMGid.' / ';

        $articleDB_section = getArticleFromDB()[0]['section'];
        echo 'Section:'.$articleDB_section;
        ?>
    </div>

    <form method="post" action="cmsUpdateArticleDB.php">

        <input type="hidden" name="articleDB_id" value="<?php echo getArticleFromDB()[0]['id'];?>" >
<!--        <input type="hidden" name="articleDB_section" value="--><?php //echo getArticleFromDB()[0]['section'];?><!--" >-->
        <input type="hidden" name="articleDB_IMGid" value="<?php echo getArticleFromDB()[0]['imageID'];?>" >
        <input type="hidden" name="articleDB_IMGsource" value="<?php echo getArticleFromDB()[0]['source'];?>" >
        <input type="hidden" name="articleDB_IMGsource" value="<?php echo getArticleFromDB()[0]['imageName'];?>" >

        <h3>Title (DB only):</h3>
        <input type="text" name="newTitle" value="<?php echo getArticleFromDB()[0]['title'];?>" >
        <br>

        <h3>Section (DB only):</h3>
        <input type="text" name="newTitle" value="<?php echo getArticleFromDB()[0]['section'];?>" >
        <br>

        <h3>Article Text:</h3>
        <textarea rows="8" cols="50" name="newArticleText"><?php echo getArticleFromDB()[0]['articleText'];?></textarea><br>

        <h3>Image Name:</h3>
        <img class="articleBox" src="<?php echo getArticleFromDB()[0]['source'];?>"><br>
        <input type="file" name="newArticleImage"><br>

        <input style="margin: 10px" type="submit" name="updateArticle" value="Edit">
        <input style="margin: 10px" type="submit" name="updateArticle" value="Delete">
    </form>


</body>
</html>