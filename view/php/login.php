<?php
session_start();
require_once('C:\xampp\htdocs\projet\controller\config.php');
require_once('C:\xampp\htdocs\projet\model\gateway\gatewayUtilisateur.php');

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
    <script src="../js/theme.js"></script>
    <link rel="stylesheet" href="../css/login.css">
    <title>Connexion</title>
</head>

<body onload="loadThemCSSFile(getStorage())">
    
    <div class="titleContainer">
        <h1 class="title">Login</h1>
    </div>

    <form action="" method="post">
        <h4 class="rowTitle">Pseudo</h4>
        <div class="row">
            <svg class="icon" width="16px" height="16px" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg"
                fill="currentColor">
                <path
                    d="M16 7.992C16 3.58 12.416 0 8 0S0 3.58 0 7.992c0 2.43 1.104 4.62 2.832 6.09.016.016.032.016.032.032.144.112.288.224.448.336.08.048.144.111.224.175A7.98 7.98 0 0 0 8.016 16a7.98 7.98 0 0 0 4.48-1.375c.08-.048.144-.111.224-.16.144-.111.304-.223.448-.335.016-.016.032-.016.032-.032 1.696-1.487 2.8-3.676 2.8-6.106zm-8 7.001c-1.504 0-2.88-.48-4.016-1.279.016-.128.048-.255.08-.383a4.17 4.17 0 0 1 .416-.991c.176-.304.384-.576.64-.816.24-.24.528-.463.816-.639.304-.176.624-.304.976-.4A4.15 4.15 0 0 1 8 10.342a4.185 4.185 0 0 1 2.928 1.166c.368.368.656.8.864 1.295.112.288.192.592.24.911A7.03 7.03 0 0 1 8 14.993zm-2.448-7.4a2.49 2.49 0 0 1-.208-1.024c0-.351.064-.703.208-1.023.144-.32.336-.607.576-.847.24-.24.528-.431.848-.575.32-.144.672-.208 1.024-.208.368 0 .704.064 1.024.208.32.144.608.336.848.575.24.24.432.528.576.847.144.32.208.672.208 1.023 0 .368-.064.704-.208 1.023a2.84 2.84 0 0 1-.576.848 2.84 2.84 0 0 1-.848.575 2.715 2.715 0 0 1-2.064 0 2.84 2.84 0 0 1-.848-.575 2.526 2.526 0 0 1-.56-.848zm7.424 5.306c0-.032-.016-.048-.016-.08a5.22 5.22 0 0 0-.688-1.406 4.883 4.883 0 0 0-1.088-1.135 5.207 5.207 0 0 0-1.04-.608 2.82 2.82 0 0 0 .464-.383 4.2 4.2 0 0 0 .624-.784 3.624 3.624 0 0 0 .528-1.934 3.71 3.71 0 0 0-.288-1.47 3.799 3.799 0 0 0-.816-1.199 3.845 3.845 0 0 0-1.2-.8 3.72 3.72 0 0 0-1.472-.287 3.72 3.72 0 0 0-1.472.288 3.631 3.631 0 0 0-1.2.815 3.84 3.84 0 0 0-.8 1.199 3.71 3.71 0 0 0-.288 1.47c0 .352.048.688.144 1.007.096.336.224.64.4.927.16.288.384.544.624.784.144.144.304.271.48.383a5.12 5.12 0 0 0-1.04.624c-.416.32-.784.703-1.088 1.119a4.999 4.999 0 0 0-.688 1.406c-.016.032-.016.064-.016.08C1.776 11.636.992 9.91.992 7.992.992 4.14 4.144.991 8 .991s7.008 3.149 7.008 7.001a6.96 6.96 0 0 1-2.032 4.907z" />
            </svg>
            <input type="text" class="input" placeholder="Pseudo" name="username" required>
        </div>
        <h4 class="rowTitle">Mot de passe</h4>
        <div class="row">
            <svg class="icon" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                x="0px" y="0px" viewBox="0 0 330 330" style="enable-background:new 0 0 330 330;" xml:space="preserve">
                <g id="XMLID_486_">
                    <path id="XMLID_487_" d="M165,330c63.411,0,115-51.589,115-115c0-29.771-11.373-56.936-30-77.379V85c0-46.869-38.131-85-85-85
            S80.001,38.131,80.001,85v52.619C61.373,158.064,50,185.229,50,215C50,278.411,101.589,330,165,330z M180,219.986V240
            c0,8.284-6.716,15-15,15s-15-6.716-15-15v-20.014c-6.068-4.565-10-11.824-10-19.986c0-13.785,11.215-25,25-25s25,11.215,25,25
            C190,208.162,186.068,215.421,180,219.986z M110.001,85c0-30.327,24.673-55,54.999-55c30.327,0,55,24.673,55,55v29.029
            C203.652,105.088,184.91,100,165,100c-19.909,0-38.651,5.088-54.999,14.028V85z" />
                </g>
                <g>
                </g>
                <g>
                </g>
                <g>
                </g>
                <g>
                </g>
                <g>
                </g>
                <g>
                </g>
                <g>
                </g>
                <g>
                </g>
                <g>
                </g>
                <g>
                </g>
                <g>
                </g>
                <g>
                </g>
                <g>
                </g>
                <g>
                </g>
                <g>
                </g>
            </svg>
            <input type="password" class="input" placeholder="Mot de passe" name="password" required>
        </div>
        <div class="buttonContainer">
            <button class="formButton" type="submit" id="submitButton" name="submit">Se connecter</button>
        </div>
    </form>
   

    <div class="links">
        <a href="register.php" class="link">
            <h4>Je n'ai pas de compte</h4>
        </a>
        <a href="#" class="link">
            <h4>J'ai oublié mon mot de passe</h4>
        </a>
    </div>

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
                            header("Location: homePage.php");
                                echo "<script>window.location.href='homePage.php'</script>";
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

</body>



</html>