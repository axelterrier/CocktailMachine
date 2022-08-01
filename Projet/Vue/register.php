<?php
session_start();
require_once('/var/www/html/Projet/CocktailMachine/config/config.php');
require_once('/var/www/html/Projet/CocktailMachine/Modele/gateway/gatewayUtilisateur.php');

$user = new GatewayUtilisateur($con);
//Crée la gateway
//Fait appel à la classe
$u = $user->CheckIfUserExist('Axel');


?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="register.css">
    <title>Inscription</title>
</head>
<body>

<h1 id="title">Inscription</h1>

<div id="form">
    <form action="" method="post">

        <p class="rowName">Pseudo</p>
        <div class="row">
            <img src="/var/www/html/Projet/CocktailMachine/Vue/image/user.svg" class="rowIcon">
            <input type="text" placeholder="Pseudo" name="username" required>
        </div>

        <p class="rowName">Mot de passe</p>
        <div class="row">
            <img src="/var/www/html/Projet/CocktailMachine/Vue/image/lock.svg" class="rowIcon">
            <input type="password" placeholder="Mot de passe" name="password" required>
        </div>

        <p class="rowName">Confirmation du mot de passe</p>
        <div class="row">
            <img src="/var/www/html/Projet/CocktailMachine/Vue/image/lock.svg" class="rowIcon">
            <input type="password" placeholder="Retaper le même mot de passe" name="VerifPassword" required>
        </div>

        <input type="submit" id="submitButton" name="submit">

    </form>
</div>



<!-- 

1- tester champs vides
2- tester les deux mots de passe
3- Check si user existe deja
    4.1- Le log et démarrer session
    4.2- Ne pas démarrer session
5- Si session -> GO prochaine page
5- Si pas session -> bloquer reload + error message

-->


<?php
            if(isset($_POST['username']) && isset($_POST['password']) && isset($_POST['VerifPassword'])){
                if($_POST['password'] != $_POST['VerifPassword']){
                    echo 'les mots de passe ne sont pas identiques';
                }else{
                    #les champs sont remplis et les mots de passe match  Ajout de l'utilisateur
                    if($user->CheckIfUserExist(strval($_POST['username']))){
                        #si le pseudo existe déja
                        echo 'ce pseudo est déja pris';
                    }else{
                        #si le pseudo est disponible
                        $u = $user->AddUser(strval($_POST['username']),strval(password_hash($_POST['password'], PASSWORD_DEFAULT)));
                        $_SESSION['user'] = $_POST['username'];
                        if($u){
                            header('Location: cocktailPage.php');
                        }else{
                            #une erreur est survenue
                        }
                    }
                }
            }else{
                #tous les champs ne sont pas remplis
            }
        ?>


<div id="links">
    <p id="login">J'ai déja un compte</p>
</div>

</body>
</html>