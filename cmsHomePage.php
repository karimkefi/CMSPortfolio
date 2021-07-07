
<?php
session_start();

if (!$_SESSION['userLoggedIn']){
    header("Location: adminLogin.php");
}
?>


<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <title>CMS Home Page</title>
    <link href="css/cmsStyle.css" rel="stylesheet" type="text/css">
    <link href="css/normalize.css" rel="stylesheet" type="text/css">
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
    <span></span>
    <div>
        <a href="cmsLogout.php">Logout</a>
    </div>


</body>
</html>

