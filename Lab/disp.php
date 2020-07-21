<?php
require_once("php/User.php");
$user = new User;
if(isset($_POST["update"])){
    if ($user->updateUser($_POST["f"], $_POST["l"], $_POST["c"],  $_POST["id"])) {
        echo ("User Updated!");
    } else {
        echo ("Unable to update user!");
    }
}
if(isset($_POST["delete"])){
  if(  $user->deleteUser($_POST["id"])){
      echo "User deleted successfully";
  }else{
      echo ("Unable to delete user");
  }
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
            <table class="centered">
                <thead>
                    <tr>
                        <th>Fist Name</th>
                        <th>Last Name</th>
                        <th>User Ciy</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    foreach ($user->getData() as $key => $value) {
                        echo ("<tr onclick=\"openMyModal('" . $value["id"] . "','" . $value["first_name"] . "', '" . $value["last_name"] . "', '" . $value["user_city"] . "' )\">
                        <td>" . $value["first_name"] . "</td>
                        <td>" . $value["last_name"] . "</td>
                        <td>" . $value["user_city"] . "</td>
                    </tr>");
                    }
                    ?>


                </tbody>
            </table>
        </div>
    </div>



    <div id="modal1" class="adj-modal modal modal-fixed-footer">
        <div class="modal-content">
            <h4>User Actions</h4>
            <div class="row">
                <form class="col s12" action="disp.php" method="POST" enctype="multipart/form-data" action="disp.php">
                    <div class="row">
                        <div class="input-field col s12">
                            <input name="f" id="first_name" type="text" class="validate">
                            <label for="first_name">First Name</label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="input-field col s12">
                            <input name="l" id="last_name" type="text" class="validate">
                            <label for="last_name">Last Name</label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="input-field col s12">
                            <input name="c" id="city" type="text" class="validate">
                            <label for="city">City</label>
                        </div>
                    </div>

                    <div class="center-align">
                        <button class="btn waves-effect waves-light blue darken-1" type="submit" name="update">UPDATE
                            <i class="material-icons right">send</i>
                        </button>
                    </div>

                    <div class="center-align">
                        <button class="btn waves-effect waves-light red  " type="submit" name="delete">DELETE
                            <i class="material-icons right">delete</i>
                        </button>
                    </div>

                    <input type="hidden" name="id" id="id"/>
                </form>
            </div>
        </div>
    </div>


</body>
<!--JavaScript at end of body for optimized loading-->
<script  src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script defer type="text/javascript" src="js/materialize.min.js"></script>
<script defer type="text/javascript" src="js/disp.js"></script>

</html>