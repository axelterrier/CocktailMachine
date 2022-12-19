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

//récupérer tout les cocktail
$allCocktail = $cock->getCocktailNumber();
//itérer à travers
for ($i = 0; $i < $allCocktail; $i++) { //Pour chaque cocktail
    $p = $cock->setCocktailUnavailable($i);
    $ingredientList = $cock->getIngredientID($i);
    $nbIngredient = $cock->GetIngredientNumberPerCocktail($i);
    for ($j = 0; $j < $nbIngredient; $j++) { //Pour chaque ingrédient d'un cocktail
        $x = $ingr->IsIngredientAvailable($ingredientList[$j]);
        if (!$x) {
            //Si non dispo
            break;
        } else {
            if($j == $nbIngredient-1){
                //set cocktail dispo
                $p = $cock->setCocktailAvailable($i);
                //echo 'cocktail ' . $i . ' dispo';
            }else{
                //echo 'ingredient ' . $j . ' dispo ';
            }
        }
    }
}


?>

<html lang="fr">
<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/recapIngredient.css">
    <script src="../js/theme.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <title>Ingrédient</title>
</head>

<body onload="loadThemCSSFile(getStorage())">



    <a href="ingredient.php">
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
        <h2 class="title">Récapitulatif des ingrédients</h2>
    </div>

    <div class="ingredientContainer">
        <?php
        $count = 0;
        foreach ($u as $ingredient) {
            if ($ingredient->Est_Disponible && $count <= 10) {
                $count++;
        ?>
        <div class="ingredient">
            <div class="imageContainer">

            </div>
            <div class="info">
                <h4 class="ingredientName">
                    <?php echo $ingredient->Ingredient_Name; ?>
                </h4>
                <p class="extraInfo">Utilisé dans
                    <?php $z = $cock->GetCocktailNumberPerIngredient($ingredient->ID_Ingredient);
                echo $z; ?> cocktails
                </p>
            </div>
            <h4 class="pump">Pompe
                <?php echo $ingredient->Pompe; ?>
            </h4>
        </div>
        <?php
            }
        }
        ?>
    </div>

</body>

</html>