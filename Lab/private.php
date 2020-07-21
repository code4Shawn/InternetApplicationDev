<?php
require_once("php/User.php");
if(!isset($_SESSION["username"])){
    header("location: login.php");
}
$user = new User;
if (isset($_POST["action"])) {
    $user->logOut();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Private Page</title>
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css" media="screen,projection">>
</head>
<style>
    .main-container {
        display: flex;
        justify-content: center;
    }
</style>

<body>
    <div class="main-container">
        <div>
           <h3>Private Page</h3>
           <div style="width: 100%" class="center-align">
           <form action="private.php" method="post">
                <button class="btn waves-effect waves-light red" type="submit" name="action">LOGOUT
                    <i class="material-icons right">done</i>
                </button></form></div>
        </div>
    </div>
</body>
<!--JavaScript at end of body for optimized loading-->
<script defer type="text/javascript" src="js/materialize.min.js"></script>

</html>