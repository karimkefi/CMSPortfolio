<?php

require_once 'DbConnect.php';
require_once 'updateArticleDB.php';
require_once 'uploadFileFunctions.php';

//In your "php.ini" file, search for the file_uploads directive, and set it to On:
ini_set('file_uploads', 'On');

$target_dir = "Img/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);

$uploadOk = 1;

$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if (isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if ($check !== false) {
//        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}

// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}

// Check file size
$checkFileSize = checkFileSize ($_FILES["fileToUpload"]["size"]);
if($checkFileSize == 0) {
    echo "Sorry, your file is too large.";
}


// Allow certain file formats
$checkFileType = checkFileType($imageFileType);
if($checkFileSize == 0) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
}


// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    $var = $_FILES["fileToUpload"]["tmp_name"];
    echo $var;
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}

//create db record
$newPhotoName = $_POST['newImageName'];
$newPhotoAlt = $_POST['altImageDesciption'];
$newPhotoSource = 'Img/'.$_FILES["fileToUpload"]["name"];
addNewImage($db, $newPhotoName,$newPhotoAlt,$newPhotoSource);

echo '<div><a href="cmsHomePage.php">Return to CMS Homepage</a></div>'


?>