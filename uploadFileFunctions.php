<?php

// Check file size
function checkFileSize (int $fileSize) {
    if ($fileSize > 500000) {
        $uploadOk = 0;
    }
    return $uploadOk;
}


// Allow certain file formats
function checkFileType (string $fileType) {
    if ($fileType != "jpg" && $fileType != "png" && $fileType != "jpeg" && $fileType != "gif") {
        $uploadOk = 0;
    }
    return $uploadOk;
}

?>

