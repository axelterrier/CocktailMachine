<?php
session_start();
require_once('/var/www/html/Projet/CocktailMachine/config/config.php');
require_once('/var/www/html/Projet/CocktailMachine/Modele/gateway/gatewayUtilisateur.php');

$test = new GatewayUtilisateur($con);
//Crée la gateway
//Fait appel à la classe

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="signin.css">
    <title>login</title>
</head>
<body>
    
    <h1 id="title">Login</h1>

    <div id="form">
        <form action="" method="post" onsubmit="myFunction();">

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

            <input type="submit" id="submitButton" name="submit">

        </form>
    </div>

    <script>
        myFunction(){
            <?php 
                if(isset($_POST["username"]) && isset($_POST["password"])){

                    $userName = $_POST['username'];
                    $password = $_POST['password'];

                    if(!empty($userName) && !empty($password)){

                        if($test->CheckIfUserExist($userName)){
                            $u = $test->CheckCredentials(strval($userName),strval($password));
                            if($u){
                                #L'utilisateur existe et a entrer le bon mot de passe
                                $_SESSION['user'] = $_POST['username'];
                                header('Location: cocktailPage.php');
                            }else{
                                #L'utilisateur existe mais n'as pas entrer le bon mot de passe
                            }
                        }else{
                            
                            #ce pseudo n'existe pas
                        }
                        
                    }else{
                        #les champs ne sont pas tous rempli
                    }
                }
            ?>
        }
       
    </script>
<div id="popUpUser" style="display: none;">Nom d'utilisateur introuvable</div>
<div id="popUpPassword" style="display: none;">Mot de passe érroné</div>


    <div id="links">
        <a href="register.php"><p id="register" href="register.php">Je n'ai pas de compte</p></a>    
        <p id="passwordForgotten">J'ai oublié mon mot de passe</p>
    </div>

</body>
</html>