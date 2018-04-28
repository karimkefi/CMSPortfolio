
<?php
session_start();

if (!$_SESSION['userLoggedIn']){
    header("Location: adminLogin.php");
}
?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>CMS Article Page</title>
    <link href="css/cmsStyle.css" rel="stylesheet" type="text/css">
    <link href="css/normalize.css" rel="stylesheet" type="text/css">
</head>

<body>

    <form action="uploadFile.php" method="post" enctype="multipart/form-data">
        <h1>Select image to upload:</h1>
        <input type="text" name="newImageName" value="Add_Image_name" >
        <input type="text" name="altImageDesciption" value="Add_AltDescription" >
        <input type="file" name="fileToUpload" id="fileToUpload">
        <input class="cmsMargin" type="submit" value="Import Image" name="submit">
    </form>
    <div>
        <a href="cmsHomePage.php">Return to CMS Homepage</a>
    </div>

</body>
</html>