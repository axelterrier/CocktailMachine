<?php
session_start();
require_once('../config/config.php');
require_once('../Modèle/gateway/gatewayUtilisateur.php');

if (isset($_SESSION['user'])) {
    // logged in
} else {
    header("Location:signin.php");
}
require_once('../config/config.php');
require_once('../Modèle/gateway/GatewayCocktail.php');

$user = new gatewayUtilisateur($con);

$u = $user->GetInfoUtilisateur($_SESSION['user']);
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="settings.css">
    <title>Paramètres</title>
</head>
<body>
    <a href="cocktailPage.php">
        <img src="image/arrow.png" id="backArrow">
    </a>
    <h1 id="title">Paramètres</h1>
    <h3 id="subTitle">Compte</h3>

    <div id="mainRow">
        <img src="image/user.svg" id="profilePic">
        <div id="info">
            <h4 id="name"><?php echo $u->Utilisateur_ID; ?></h4>
            <p id="moreInfo">Informations personnelles</p>
        </div>
        <a id="imgBackground" href="profile.php">
            <img src="image/arrow.png" id="detailArrow">
        </a>
    </div>

    <h3 id="subTitle">Paramètres</h3>

    <div id="grid">



    </div>
    <div class="row">
        <div class="parameterIconBackground">
            <img src="image/language.svg" alt="" class="rowIcon">
        </div>
        <h4 class="parameterName">Language</h4>
        <p class="value">English</p>
        <div id="imgBackground">
            <img src="image/arrow.png" id="detailArrow">
        </div>
    </div>
    <div class="rowSlider">
        <div class="parameterIconBackground">
            <img src="image/theme.svg" alt="" class="rowIcon">
        </div>        
        <h4 class="parameterName">Dark Mode</h4>
        <p class="value" id="valueDarkMode"></p>
        <label class="switch">
            <input type="checkbox" id="checkBox" onchange="isDarkModeOn()">
            <span class="slider round"></span>
        </label>
    </div>
    <div class="rowWithoutValue">
        <div class="parameterIconBackground">
            <img src="image/theme.svg" alt="" class="rowIcon">
        </div>  
        <h4 class="parameterName">Notifications</h4>
        <p class="invisibleValue">off</p>   
        <div id="imgBackground">
            <img src="image/arrow.png" id="detailArrow">
        </div>
    </div>

    <div class="rowWithoutValue">
        <div class="parameterIconBackground">
            <img src="image/theme.svg" alt="" class="rowIcon">
        </div>  
        <h4 class="parameterName">Aide</h4>
        <p class="invisibleValue">off</p>
        <div id="imgBackground">
            <img src="image/arrow.png" id="detailArrow">
        </div>
    </div>
</body>
<script src="settings.js"></script>
</html>