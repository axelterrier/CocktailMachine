<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&display=swap" rel="stylesheet">
    <title>Connexion</title>
</head>
<body>
    <div class="background"></div>

    <div class="presentation">
        <div class="logo">
            <img src="/img/background.png" class="imgBackground">
            <div class="imgContainer"></div>
        </div>
        <div class="nameContainer">
            <div class="name">
                <h1>Smartender</h1>
                <h4 class="sousTitre">Machine à cocktails</h4>
            </div>
        </div>
    </div>

    <div class="registration">

        <form method="post">
            <div class="mail">
                <div class="round">
                    <img src="/icon/user.png" class="userImg">
                </div>
                <input type="email" name="lemail" id="lemail" placeholder="Adresse mail" required><br />
            </div>
            
            <div class="mdp">
                <div class="round">
                    <img src="/icon/key.png" class="keyImg">
                </div>
                <input type="password" name="lpassword" id="lpassword" placeholder="Mot de passe" required><br />
            </div>
            <div class="submitContainer">
                <input type="submit" name="formlogin" id="formlogin" value="CONNEXION">
            </div>
            
        </form>

        <div class="other">
            <div class="inscription">
                <h4>Pas encore de compte ?</h4>
                <a href="../html/signin.html">Inscris toi dès maintenant !</a>
            </div>
            
            <h4>Mot de passe oublié ?</h4>
        </div>

    </div>

</body>
</html>