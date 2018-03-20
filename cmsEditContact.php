<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>CMS Edit Contact Page</title>
    <link href="style.css" rel="stylesheet" type="text/css">
    <link href="normalize.css" rel="stylesheet" type="text/css">
</head>

<body>
<h1>Edit Contact Page</h1>

<form method="post" action="cmsEditContact.php">
    <h3>Telephone:</h3>
    <input type="text" name="telephone" value="" >
    <br>
    <h3>Email:</h3>
    <input type="text" name="email" value="" >
    <br>
    <h3>Address:</h3>
    <input type="text" name="address" value="" >
    <input style="margin: 10px" type="submit" name="updateContact">
</form>


</body>
</html>