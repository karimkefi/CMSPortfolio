<?php

$actionType = $_POST['updateArticle'];
$newArticle = $_POST['newArticleText'];
$newImage = $_POST['newArticleImage'];


$db = new PDO('mysql:host=127.0.0.1; dbname=karimPortfolioCMS', 'root');

switch ($actionType) {
    case 'New':
        echo 'new new new';
        break;
    case 'Edit':
        echo 'edit edit edit';
        break;
    case 'Delete';
        echo 'delete delete';
        break;
    default:
        echo 'bye';
}

//SQL adding information to the "image table"

$query2 = $db->prepare("");

$query2->bindParam(':name', $addDbChildName);
$query2->bindParam(':DOB', $addDbchildDOB);
$query2->bindParam(':FavColor', $addDbFavColour);

$query2->execute();
$lastImageInsertId = $db->lastInsertId();



//SQL adding information to the "article" table
//NEED IMAGE ID FROM ABOVE IF NEW!!!!!

$query1 = $db->prepare("");

$query1->bindParam(':name', $addDbAdultName);
$query1->bindParam(':DOB', $addDbAdultDOB);
$query1->bindParam(':gender', $addDbAdultGender);

$query1->execute();
$lastArticleInsertId = $db->lastInsertId();









//SQL adding information to the children table

$query3 = $db->prepare("INSERT INTO `parent_of` (`adults_id`,`children_id`) VALUES (:AdultID, :ChildID);");

$query3->bindParam(':AdultID', $lastAdultInsertId);
$query3->bindParam(':ChildID', $lastChildInsertId);

if($query1 && $query2) {
    $query3->execute();
}


header("Location: addAdultForm.php");

?>