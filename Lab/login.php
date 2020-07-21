<?php
require_once "php/User.php";
$user = new User;

if(isset($_SESSION["username"])){
    header("location: private.php");
}

if (isset($_POST['action'])) {
    $user->setUsername($_POST["u"]);
    $user->setPassword($_POST["p"]);
    $user->logIn();

}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab Wk</title>

    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css" media="screen,projection">
    <link type="text/css" rel="stylesheet" href="css/add.css">
</head>

<body>
   
    <div class="main-container">
        <div class="size-box-400">
            <div class="row">
                <form class="col s12" action="login.php" method="POST" onsubmit="return validateForm()" enctype="multipart/form-data">
                <div class="row">
                        <div class="input-field col s12">
                            <input name="u" id="username" type="text" class="validate">
                            <label for="username">User Name</label>
                        </div>
                    </div>


                    <div class="row">
                        <div class="input-field col s12">
                            <input name="p" id="password" type="password" class="validate">
                            <label for="password">Password</label>
                        </div>
                    </div>

                    <div class="center-align">
                        <button class="btn waves-effect waves-light blue darken-1" type="submit" name="action">LOGIN
                            <i class="material-icons right">done</i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>
<!--JavaScript at end of body for optimized loading-->
<script defer type="text/javascript" src="js/materialize.min.js"></script>
<script defer type="text/javascript" src="js/add.js"></script>
</html>