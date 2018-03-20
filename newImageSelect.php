<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>CMS Article Page</title>
    <link href="style.css" rel="stylesheet" type="text/css">
    <link href="normalize.css" rel="stylesheet" type="text/css">
</head>

<body>

<form action="uploadFile.php" method="post" enctype="multipart/form-data">
    <h1>Select image to upload:</h1><br>
    <br>
    <input type="text" name="newImageName" value="Add_name_here" ><br>
    <br>
    <input type="text" name="altImageDesciption" value="Add_AltDescription" ><br>
    <br>
    <input type="file" name="fileToUpload" id="fileToUpload"><br>
    <br>
    <input type="submit" value="Upload Image" name="submit">
</form>

</body>
</html>