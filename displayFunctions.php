<?php

require_once 'DbConnect.php';
require_once 'getArticleImgDB.php';     //remove
$db = connectToDB();

function displayImgageAndText ($db, $selectTitle) {
    $articleArray = getArticleFromDB($db, $selectTitle);

    return "<img src=" . $articleArray['source'] .
        " alt=" . $articleArray['alt'] .
        "/><p>" . $articleArray['articleText'] .
        "</p>";
}

/**
 *selects the articles from the DB based on Section requested to get the article data from DB.
 *
 *@param PDO $db Database PDO connection
 *@param string $selectSection This is the article section (About or Portfolio)
 *
 *@return string which is HTML for the images used in the Carousel
 */
function displayCarouselImage ($db, $selectSection) {

    $HTML = "";
    $articlesArray = getAllArticlesFromDB($db, $selectSection);

    foreach ($articlesArray as $item) {
        $HTML .= "<img class=\"slideImg hidden\" src=" . $item['source'] .
            " alt=" . $item['alt'] .
            "/>";
    }

    return $HTML;
}

/**
 *selects the articles from the DB based on Section requested to get the number of articles in DB.
 *
 *@param PDO $db Database PDO connection
 *@param string $selectSection This is the article section (About or Portfolio)
 *
 *@return string which is HTML for the span of dots used in the Carousel
 */
function displayCarouselDot ($db, $selectSection) {

    $HTML = "";
    $articlesArray = getAllArticlesFromDB($db, $selectSection);

    for ($i=1; $i<count($articlesArray)+1; $i++) {
        $HTML .= "<span class=\"dot\" id=\"dot" . $i . "\" data-slideTo=\"" . $i . "\"></span>";
    }

    return $HTML;
}


/**
 *selects the articles from the DB based on Section requested to get the article titles and descriptions.
 *
 *@param PDO $db Database PDO connection
 *@param string $selectSection This is the article section (About or Portfolio)
 *
 *@return string which is HTML for the span of dots used in the Carousel
 */
function displayCarouselCaption ($db, $selectSection) {

    $articlesArray = getAllArticlesFromDB($db, $selectSection);
    $HTML = "";
    $i = 1;

    if($selectSection == "Portfolio") {
        $HTMLicons = "<img src=\"Img/iconGitHub-64.png\"><img src=\"Img/iconMonitor-64.png\">";
    } else {
        $HTMLicons = "";
    }

    foreach ($articlesArray as $item) {
        $HTML .= "<div class=\"imgCaption hidden\" id=\"imgCaption" . $i . "\">" .
                "<h3>" . $item['title'] ."</h3>" .
                "<p>" . $item['articleText'] ."</p>" .
                $HTMLicons .
                "<div>";
        $i++;
    }

    return $HTML;
}


var_dump(displayCarouselCaption($db, "Portfolio"));


?>

