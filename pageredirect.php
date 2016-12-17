<?php
if (isset($_GET['pageid']) && $_GET['pageid'] == "logout") {

    session_start();
    unset($_SESSION['cuserId']);
    header('Location:login.php');
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <h3 style="font-family: cursive; color: maroon" >Page Retricted by Admin...!</h3>
        <br/>
        <a href="login.php"><i>Go to Login</i></a>
    </body>
</html>
