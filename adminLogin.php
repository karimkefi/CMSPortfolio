<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login Form</title>
</head>

<body>
    <?php
    session_start();
    if ($_SESSION['userLoggedIn']){
        header("Location: cmsHomePage.php");
    }
    ?>

    <form method="post" action="adminCheck.php">
        <label for="userName">User Name:</label>
        <input id="userName" type="text" name="InputUserName">

        <label for="passWord" >Password:</label>
        <input id="passWord" type="text" name="InputPswd">

        <input type="submit" value="Submit...">
    </form>

    <div>
    <?php
        if ($_SESSION['invalidcombo']){
            echo '> > Invalid email or password < <';
        }
        ?>
    </div>

    <a href="Index.php" >Return to Webpage</a>
</body>
</html>