<?php

session_start();

if (isset($_SESSION['user'])) {
    // logged in
} else {
    header("Location:login.php");
}

require_once('C:\xampp\htdocs\projet\controller\config.php');
require_once('C:\xampp\htdocs\projet\model\gateway\gatewayIngredient.php');
require_once('C:\xampp\htdocs\projet\model\gateway\gatewayCocktail.php');

$ingr = new GatewayIngredient($con);
$test2 = new GatewayIngredient($con);
$cock = new GatewayCocktail($con);
//Crée la gateway
//Fait appel à la classe
$u = $ingr->GetAllIngredients();

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="../js/theme.js"></script>
    <script src="../js/ingredient.js" defer></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <link rel="stylesheet" href="../css/ingredient.css">
    <title>Ingrédients</title>
</head>

<body onload="loadThemCSSFile(getStorage())">
    <a href="homePage.php">
        <div class="backRow">
            <svg class="backButton" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
                xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="400.004px" height="400.004px"
                viewBox="0 0 400.004 400.004" style="enable-background:new 0 0 400.004 400.004;" xml:space="preserve">
                <g>
                    <path d="M382.688,182.686H59.116l77.209-77.214c6.764-6.76,6.764-17.726,0-24.485c-6.764-6.764-17.73-6.764-24.484,0L5.073,187.757
		c-6.764,6.76-6.764,17.727,0,24.485l106.768,106.775c3.381,3.383,7.812,5.072,12.242,5.072c4.43,0,8.861-1.689,12.242-5.072
		c6.764-6.76,6.764-17.726,0-24.484l-77.209-77.218h323.572c9.562,0,17.316-7.753,17.316-17.315
		C400.004,190.438,392.251,182.686,382.688,182.686z" />
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
        </div>
    </a>
    <div class="titleContainer">
        <h2 class="title">Sélectionner jusqu'à 10 ingrédients que vous avez sous la main !</h2>
    </div>
    <form action="recapIngredient.php" method="post" class="ingredients">
        <?php
        foreach ($u as $ingredient) {


        ?>
        <div class="ingredient" >
            <div class="infoContainer">
                <h4 class="ingredientName">
                    <?php echo $ingredient->Ingredient_Name ?>
                </h4>
                <p class="extraInfo">Utilisé dans
                    <?php $z = $cock->GetCocktailNumberPerIngredient($ingredient->ID_Ingredient);
            echo $z; ?> cocktails
                </p>
            </div>
            <?php
                if($ingredient->Est_Disponible){
                    echo "<input type='checkbox' name='checkbox' id='$ingredient->ID_Ingredient' onclick='countCheckBox($ingredient->ID_Ingredient)'checked>";
                }else{
                    echo "<input type='checkbox' name='checkbox' id='$ingredient->ID_Ingredient' onclick='countCheckBox($ingredient->ID_Ingredient)'>";
                }
            ?>
            
        </div>
        <?php
        }
        ?>
    <input class="submit" type="submit" name="submit" onclick="countCheckBox()">
    </form>
</body>

</html>