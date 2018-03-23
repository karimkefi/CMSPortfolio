<?php

require_once 'DbConnect.php';

function displayImgageAndText ($db, $selectTitle)
{
    $articleArray = getArticleFromDB($db, $selectTitle);

    return "<img src=" . $articleArray['source'] .
        " alt=" . $articleArray['alt'] .
        "/><p>" . $articleArray['articleText'] .
        "</p>";
}
?>

