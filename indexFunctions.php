<?php

function displayImgageAndText ($db, $selectTitle) {

    return  "<img src=" . getArticleFromDB($db, $selectTitle)['source'] .
            " alt=" . getArticleFromDB($db, $selectTitle)['alt'] .
            "/><p>" . getArticleFromDB($db, $selectTitle)['articleText'] .
            "</p>";
}

?>

