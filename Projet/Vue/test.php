<?php
session_start();

if (isset($_SESSION['user'])) {
    // logged in
    $_SESSION['lastPage'] = 'cocktailPage';
} else {
    header("Location:signin.php");
}
require_once('/var/www/html/Projet/CocktailMachine/config/config.php');
require_once('/var/www/html/Projet/CocktailMachine/Modele/gateway/gatewayCocktail.php');
require_once('/var/www/html/Projet/CocktailMachine/Modele/gateway/gatewayIngredient.php');



$test = new GatewayCocktail($con);
$ingredient = new GatewayIngredient($con);
//Crée la gateway
//Fait appel à la classe
$u = $test->GetAvailableCocktail();

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="test.css">
    <title>test</title>
</head>
<body>
    <h1 id="title">Mes favoris</h1>

    <div id="cardSlider">
        <?php
            foreach($u as $cocktail){
        ?>
        <a href="<?php echo 'recette.php?ID='.$cocktail->Cocktail_ID?>" class='cardLink'>
        <div class="card">
            <div class="imgContainer">
            <?php echo '<img src="data:image/jpeg;base64,'.base64_encode($cocktail->Image_Cocktail).'" alt="" class="cocktailImg">' ?>
            </div>
            <div class="infoCocktail">
                <h4 class="cocktailName"><?php echo $cocktail->Nom_Cocktail; ?></h4>
                <h4 class="cocktailInfo">Infos random sur le cocktail</h4>
            </div>
            <div class="arrowContainer">
                <img src="/var/www/html/Projet/CocktailMachine/Vue/image/arrow.svg" alt="" class="arrow">
            </div>
        </div>
        </a>

        <?php
            }
        ?>

    </div>

</body>
</html>

