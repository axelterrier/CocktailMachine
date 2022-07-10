<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="profile.css">
    <script src="profile.js"></script>
    <title>Profil</title>
</head>
<body>
    <button id="validation" class="hide">
        <img src="image/tick.svg" alt="">
    </button>

    <a href="settings.php">
        <img src="image/arrow.png" id="backArrow">
    </a>
    <h1 id="title">Compte </h1>

    <div id="picRow">
        <div id="leftPicRow">
            <p class="rowInfo">Photo</p>
        </div>
        <div id="rightPicRow">
            <img src="image/user.svg" id="profilePicture">
            <div class='file-input'">
            <input type='file' accept=".jpg, .png, .jpeg |image/*">
                <span class='button'>Choisir un fichier</span>
                <span class='label' data-js-label>Aucun fichier</label>
            </div>
        </div>
    </div>
    <div id="genderRow">
        <p class="rowInfo">Genre</p>
        <div id="genderContainer">
            <div id="gender">
                <div class="genderBackground genderSelected" onclick="gender()" id="male">
                    <img src="image/male.svg" alt="" class="genderImg">
                </div>
                <div class="genderBackground" onclick="gender()" id="female">
                    <img src="image/female.svg" alt="" class="genderImg">
                </div>
                
            </div>
            
        </div>
    </div>
    <div id="ageRow">
        <p class="rowInfo">Age</p>
        <input type="number" placeholder="Age" id="age" onChange="toggleButton()">
    </div>
    <div id="heightRow">
        <p class="rowInfo">Taille</p>
        <input type="number" id="height" placeholder="Ecrivez votre taille en cm" onChange="toggleButton()">
    </div>
    <div id="weightRow">
        <p class="rowInfo">Poids</p>
        <input type="number" id="weight" placeholder="Ecrivez votre poids en kg" onChange="toggleButton()">
    </div>
</body>
</html>