<?php

require_once 'DbConnect.php';
$db = connectToDB();

function displayImgageAndText ($db, $selectTitle)
{
    $articleArray = getArticleFromDB($db, $selectTitle);

    return "<img src=" . $articleArray['source'] .
        " alt=" . $articleArray['alt'] .
        "/><p>" . $articleArray['articleText'] .
        "</p>";
}
?>

