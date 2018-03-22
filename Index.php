<!DOCTYPE html>

<?php

$db = new PDO('mysql:host=127.0.0.1; dbname=karimPortfolioCMS', 'root');
$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

require_once 'getArticleImgDB.php';
require_once 'indexFunctions.php';

?>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Karim Portfolio</title>
    <link href="style.css" rel="stylesheet" type="text/css">
    <link href="normalize.css" rel="stylesheet" type="text/css">
</head>
<body>
<div class="backgroundImage homeImage" id="home">
    <nav>
        <ul class="sideNavList">
            <li>
                <a href="#home">
                    <img src="Img/iconHome.png" class="icon" alt="Home Icon">
                </a>
            </li>
            <li>
                <a href="#aboutmeLocation">
                    <img src="Img/iconAboutMe.png" alt="Face Icon">
                </a>
            </li>
            <li>
                <a href="#portfolioLocation">
                    <img src="Img/iconProjects.png" alt="Folders Icon">
                </a>
            </li>
            <li>
                <a href="#contactLocation">
                    <img src="Img/iconsEmail.png" class="icon" alt="Email Icon">
                </a>
            </li>
            <li>
                <a href="adminLogin.php">
                    <img src="Img/icons-admin-50.png" alt="Edit Icon">
                </a>
            </li>
        </ul>
    </nav>
    <header>Karim Kefi Portfolio</header>
    <section class="container topContainer">
        <div class="codingLanguages">
            <div class="codingIcon5 codingIcon3">
                <img src="Img/icons-html5-96.png" alt="HTML5 Icon">
            </div>
            <div class="codingIcon5 codingIcon3">
                <img src="Img/icons-css3-96.png" alt="CSS3 Icon">
            </div>
            <div class="codingIcon5 codingIcon3">
                <img src="Img/icons-php-red-100.png" alt="PHP Icon">
            </div>
            <div class="codingIcon5 codingIcon3">
                <img src="Img/icons-sql-red-100.png" alt="SQL Icon">
            </div>
            <div class="codingIcon5 codingIcon3">
                <img src="Img/icon-official-javascript-100.png" alt="JS Icon">
            </div>
        </div>
    </section>
</div>
<div>
    <section class="breatherContainer breatherText">
        <h1>WHAT I AM LEARNING</h1>
        <p>Mayden Academy has taken up the challenge of teaching ME
            to be a FULLSTACK DEVELOPER in just 4 months! Unlikely I hear you say!
            I have high hopes they can...
            Above show the list of languages which I will be learning</p>
    </section>
</div>
<div class="backgroundImage aboutmeImage" id="aboutmeLocation">
    <section class="container">
        <div class="articleBox">
            <?php echo displayImgageAndText($db, 'Where I am from'); ?>
        </div>
        <div class="articleBox">
            <?php echo displayImgageAndText($db, 'Where I am now'); ?>
        </div>
        <div class="articleBox">
            <?php echo displayImgageAndText($db, 'Interests'); ?>
        </div>
    </section>
</div>
<div>
    <section class="breatherContainer breatherText">
        <h1>ABOUT ME</h1>
        <p>Not quite my life story, nor all that I have done. This
            focuses on my education and career jouney I have been on.</p>
    </section>
</div>
<div class="backgroundImage portfolioImage" id="portfolioLocation">
    <section class="container">
        <div class="articleBox">
            <?php echo displayImgageAndText($db, 'Mayden Logo'); ?>
        </div>
        <div class="articleBox">
            <?php echo displayImgageAndText($db, 'Pilot Webpage'); ?>
        </div>
        <div class="articleBox">
            <?php echo displayImgageAndText($db, 'Login Form'); ?>
        </div>
    </section>
</div>
<div>
    <section class="breatherContainer breatherText">
        <h1>SOME STUFF I HAVE BUILT</h1>
        <p>Started at Mayden Academy in Feb 2018. During my first 2 weeks
            we were set a challenges which are shown above.
            As the challenges get better (and the old ones get embarrassing), this
            portfolio section will change!</p>
    </section>
</div>
<footer class="footer" id="contactLocation">
    <ul class="container bottomContainer">
        <li class="footerBox footerIcon">
            <img src="Img/icons-contactphone-100.png" alt="Phone Icon">
            <p>01225 XXX XXX</p>
        </li>
        <li class="footerBox footerIcon">
            <img src="Img/icons-contactletter-100.png" alt="Envelope Icon">
            <p>karimkefi@gmail.com</p>
        </li>
        <li class="footerBox footerIcon">
            <img src="Img/icons-contacthome-100.png" alt="House Icon">
            <p>Bath, BA1 XXX</p>
        </li>
    </ul>
</footer>
</body>
</html>