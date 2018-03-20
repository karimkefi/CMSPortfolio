<!DOCTYPE html>
<html lang="en">

<?php
require_once 'dropdownDB.php';
require_once 'getArticleImgDB.php';
//require_once 'cmsUpdateArticleDB.php';
?>

<head>
    <meta charset="UTF-8">
    <title>CMS Edit Article Page</title>
    <link href="style.css" rel="stylesheet" type="text/css">
    <link href="normalize.css" rel="stylesheet" type="text/css">
</head>

<body>
<h1>New Article Page</h1>

<form method="post" action="cmsUpdateArticleDB.php">
    <h3>Title (DB only):</h3>
    <input type="text" name="newTitle" value="<?php echo getArticleFromDB()[0]['title'];?>" >
    <br>
    <h3>Section (DB only):</h3>
    <select name="selectedSection">
        <?php
        echo $sectionDropdown;
        ?>
    </select>
    <br>
    <h3>Article Text:</h3>
    <textarea rows="8" cols="50" name="newArticleText"><?php echo getArticleFromDB()[0]['articleText'];?></textarea><br>
    <h3>Image Name:</h3>
<!--    <input type="text" name="existingImageName" value="AddPhotoName"><br>-->
    <input type="file" name="newArticleImage"><br>
    <input style="margin: 10px" type="submit" name="updateArticle" value="Add">
</form>


</body>
</html>