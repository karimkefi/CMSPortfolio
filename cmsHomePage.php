<!DOCTYPE html>

<?php
if ($boolResult) {
    $_SESSION['userLoggedIn'] = true;
    header("Location: cmsHomePage.php");
} else {
    $_SESSION['userLoggedIn'] = false;
    $_SESSION['invalidcombo'] = true;
    header("Location: adminLogin.php");
}

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CMS Home Page</title>
    <link href="cmsStyle.css" rel="stylesheet" type="text/css">
    <link href="normalize.css" rel="stylesheet" type="text/css">
</head>
<body class="cmsMargin">
    <h1>Select the Content to edit...</h1>
    <div>
        <a href="cmsNewImageSelect.php">Add new image to Database</a>
    </div>
    <div>
        <a href="cmsNewArticle.php">Add new articles: About & Portfolio</a>
    </div>
    <div>
        <a href="cmsEditArticle.php">Edit & Delete articles: About & Portfolio</a>
    </div>
</body>
</html>

