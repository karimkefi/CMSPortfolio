<!DOCTYPE html>
<html lang="en">

<?php
    require_once 'dropdownDB.php';
    require_once 'getArticleImgDB.php';
    require_once 'cmsUpdateArticleDB.php';
?>


<head>
    <meta charset="UTF-8">
    <title>CMS About Page</title>
    <link href="style.css" rel="stylesheet" type="text/css">
    <link href="normalize.css" rel="stylesheet" type="text/css">
</head>

<body>
<h1>Edit Article Page - About Me and Portfolio</h1>

    <form method="post" action="cmsArticle.php">
        <select name="selectedTitle">
            <?php
            echo $aboutDropdown;
            ?>
        </select>
        <input style="margin: 10px" type="submit" value="Pull from DB">
    </form>

    <div>
        <?php $articleDB_id = getArticleFromDB()[0]['id'];?>
        <?php $articleDB_IMGid = getArticleFromDB()[0]['imageID'];?>
    </div>

    <form method="post" action="cmsUpdateArticleDB.php">

        <h3>Article Text:</h3>
        <textarea rows="8" cols="50" name="newArticleText">
            <?php echo getArticleFromDB()[0]['articleText'];?>
        </textarea><br>

        <h3>Image:</h3>
        <img class="articleBox" src="<?php echo getArticleFromDB()[0]['source'];?>"><br>
        <input type="file" name="newArticleImage"><br>

        <input style="margin: 10px" type="submit" name="updateArticle" value="New">
        <input style="margin: 10px" type="submit" name="updateArticle" value="Edit">
        <input style="margin: 10px" type="submit" name="updateArticle" value="Delete">
    </form>


</body>
</html>