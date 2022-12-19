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
$cock = new GatewayCocktail($con);
//Crée la gateway
//Fait appel à la classe
$ID = $_GET['ID'];

$v = $cock->GetInfoCocktail($ID); //Passer l'ID en dynamique
$u = $ingr->GetIngredient($ID);

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/recipe.css">
    <script src="../js/theme.js"></script>
    <script src="../js/recipe.js"></script>
    <title>Recette</title>
</head>
<body onload="loadThemCSSFile(getStorage())">


    <div class="nav">
        <a href="homePage.php">
            <svg class="backButton" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
        width="400.004px" height="400.004px" viewBox="0 0 400.004 400.004" style="enable-background:new 0 0 400.004 400.004;"
        xml:space="preserve">
    <g>
        <path d="M382.688,182.686H59.116l77.209-77.214c6.764-6.76,6.764-17.726,0-24.485c-6.764-6.764-17.73-6.764-24.484,0L5.073,187.757
            c-6.764,6.76-6.764,17.727,0,24.485l106.768,106.775c3.381,3.383,7.812,5.072,12.242,5.072c4.43,0,8.861-1.689,12.242-5.072
            c6.764-6.76,6.764-17.726,0-24.484l-77.209-77.218h323.572c9.562,0,17.316-7.753,17.316-17.315
            C400.004,190.438,392.251,182.686,382.688,182.686z"/>
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
        </a>
        <svg class="heart" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	 viewBox="0 0 471.701 471.701" style="enable-background:new 0 0 471.701 471.701;" xml:space="preserve">
<g>
	<path d="M433.601,67.001c-24.7-24.7-57.4-38.2-92.3-38.2s-67.7,13.6-92.4,38.3l-12.9,12.9l-13.1-13.1
		c-24.7-24.7-57.6-38.4-92.5-38.4c-34.8,0-67.6,13.6-92.2,38.2c-24.7,24.7-38.3,57.5-38.2,92.4c0,34.9,13.7,67.6,38.4,92.3
		l187.8,187.8c2.6,2.6,6.1,4,9.5,4c3.4,0,6.9-1.3,9.5-3.9l188.2-187.5c24.7-24.7,38.3-57.5,38.3-92.4
		C471.801,124.501,458.301,91.701,433.601,67.001z M414.401,232.701l-178.7,178l-178.3-178.3c-19.6-19.6-30.4-45.6-30.4-73.3
		s10.7-53.7,30.3-73.2c19.5-19.5,45.5-30.3,73.1-30.3c27.7,0,53.8,10.8,73.4,30.4l22.6,22.6c5.3,5.3,13.8,5.3,19.1,0l22.4-22.4
		c19.6-19.6,45.7-30.4,73.3-30.4c27.6,0,53.6,10.8,73.2,30.3c19.6,19.6,30.3,45.6,30.3,73.3
		C444.801,187.101,434.001,213.101,414.401,232.701z"/>
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

    <div class="cocktailContainer">
    <?php echo '<img src="data:image/jpeg;base64,'.base64_encode($v->Image_Cocktail).'" alt="" class="cocktailImage">' ?>
    </div>

    <div class="recipeContainer">
        <div class="border"></div>
        <div class="info">
            <div class="calorie">
                <svg class="infoIcon" xmlns="http://www.w3.org/2000/svg"><path d="M 16.03125 3.46875 L 15.375 4.03125 C 15.375 4.03125 13.035156 5.941406 10.71875 8.71875 C 8.402344 11.496094 6 15.160156 6 19 C 6 21.765625 7.132813 24.070313 8.96875 25.625 C 10.691406 27.082031 12.996094 27.871094 15.5 27.96875 C 15.667969 27.976563 15.832031 28 16 28 C 16.167969 28 16.332031 27.976563 16.5 27.96875 C 19.003906 27.871094 21.308594 27.082031 23.03125 25.625 C 24.867188 24.070313 26 21.765625 26 19 C 26 15.542969 23.585938 11.941406 21.28125 9.0625 C 18.976563 6.183594 16.6875 4.0625 16.6875 4.0625 Z M 15.96875 6.25 C 16.488281 6.742188 17.851563 7.976563 19.71875 10.3125 C 21.914063 13.058594 24 16.558594 24 19 C 24 21.234375 23.132813 22.929688 21.71875 24.125 C 21.375 24.414063 21 24.679688 20.59375 24.90625 C 20.839844 24.316406 21 23.675781 21 23 C 21 16.75 17.65625 12.9375 17.65625 12.9375 L 15.84375 10.90625 L 15.90625 13.625 C 15.90625 13.625 15.910156 14.898438 15.75 16.125 C 15.667969 16.738281 15.554688 17.347656 15.40625 17.6875 C 15.363281 17.785156 15.34375 17.796875 15.3125 17.84375 C 15.207031 17.804688 14.890625 17.648438 14.59375 17.34375 C 14.257813 17 14.03125 16.65625 14.03125 16.65625 L 13.0625 15.15625 L 12.3125 16.78125 C 12.3125 16.78125 11 19.457031 11 23 C 11 23.675781 11.160156 24.316406 11.40625 24.90625 C 11 24.679688 10.625 24.414063 10.28125 24.125 C 8.867188 22.929688 8 21.234375 8 19 C 8 16.042969 10.097656 12.621094 12.28125 10 C 14.132813 7.78125 15.445313 6.695313 15.96875 6.25 Z M 17.65625 16.78125 C 18.339844 18.265625 19 20.339844 19 23 C 19 24.65625 17.65625 26 16 26 C 14.34375 26 13 24.65625 13 23 C 13 21.40625 13.308594 20.058594 13.59375 19.09375 C 14.042969 19.496094 14.59375 19.90625 15.40625 19.90625 C 15.882813 19.90625 16.335938 19.6875 16.625 19.40625 C 16.914063 19.125 17.078125 18.792969 17.21875 18.46875 C 17.445313 17.941406 17.5625 17.355469 17.65625 16.78125 Z"/></svg>
                <h4>314kcal</h4>
            </div>
            <div class="duration">
                <svg class="infoIcon" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	 viewBox="0 0 488 488" style="enable-background:new 0 0 488 488;" xml:space="preserve">
<g transform="translate(0 -540.36)">
	<g>
		<g>
			<path d="M351.1,846.96l-97.1-67.9v-116.7c0-5.5-4.5-10-10-10s-10,4.5-10,10v122c0,3.3,1.6,6.3,4.3,8.2l101.4,70.9
				c1.7,1.2,3.7,1.8,5.7,1.8v0c3.1,0,6.2-1.5,8.2-4.4C356.7,856.36,355.6,850.16,351.1,846.96z"/>
			<path d="M416.4,611.96L416.4,611.96c-46.2-46.2-107.4-71.6-172.4-71.6s-126.2,25.4-172.4,71.6C25.4,658.16,0,719.36,0,784.36
				s25.4,126.2,71.6,172.4c46.2,46.2,107.4,71.6,172.4,71.6s126.2-25.4,172.4-71.6s71.6-107.4,71.6-172.4S462.6,658.16,416.4,611.96
				z M254,1008.16L254,1008.16v-40.8c0-5.5-4.5-10-10-10s-10,4.5-10,10v40.8c-115.6-5.1-208.7-98.2-213.8-213.8H61
				c5.5,0,10-4.5,10-10s-4.5-10-10-10H20.2c5.1-115.6,98.2-208.7,213.8-213.8v40.8c0,5.5,4.5,10,10,10s10-4.5,10-10v-40.8
				c115.6,5.1,208.7,98.2,213.8,213.8H427c-5.5,0-10,4.5-10,10s4.5,10,10,10h40.8C462.7,909.96,369.6,1003.06,254,1008.16z"/>
		</g>
	</g>
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
                <h4>1min30</h4>
            </div>
            <div class="rate">
                <svg class="infoIcon" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	 viewBox="0 0 488.022 488.022" style="enable-background:new 0 0 488.022 488.022;" xml:space="preserve">
<g>
	<path d="M471.563,173.778l-145.5-20.8l-64.4-132c-8-15.4-30-12.2-35.3,0l-64.4,132l-145.6,20.8c-16.4,1-21.6,20.9-10.4,33.2
		l105,102.9l-25,144.5c-2.9,17.8,16.7,27.8,28.1,20.8l129.9-68.6l129.9,67.6c13.6,7,29.8-2.8,28.1-19.7l-25-144.6l105-102.9
		C494.663,193.478,485.563,175.478,471.563,173.778z M342.663,288.078c-4.2,5.2-6.2,11.4-5.2,17.7l19.7,116.4l-103.9-55.1
		c-6.7-2.8-13-2.8-18.7,0l-103.9,55.1l19.7-116.4c1-7.3-1-13.5-5.2-17.7l-84.1-82.1l116.4-16.6c6.2-1,11.4-4.2,14.6-10.4l52-105
		l52,105c3.1,5.2,8.3,9.4,14.6,10.4l116.2,16.6L342.663,288.078z"/>
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
                <h4>4.8</h4>
            </div>
        </div>
        <div class="title">
            <h2><?php echo $v->Nom_Cocktail; ?></h2>
            <h4 class="description"><?php echo $v->Description_Cocktail; ?></h4>
        </div>
        <div class="ingredients">
            <?php
            $v = $cock->getIngredientID($ID);
            $quantite = $ingr->getIngredientQuantity($ID);
            $q = 0;
            foreach ($u as $ingredient) {
            ?>
            <div class="row">
                <div class="imgContainer">
                    <?php echo '<img src="data:image/jpeg;base64,'.base64_encode($ingredient->Image_Url).'" alt="" class="ingredientImage">' ?>
                </div>
                <h4 class="ingredientName"><?php echo $ingredient->Ingredient_Name; ?></h4>
                <h4 class="quantity"><?php echo $quantite[$q]."cl";?></h4>
            </div>
            <?php
                $q++;
                }
            ?>
        </div>      
        <div class="validationButton">
            <button>
                <a href="waitingScreen.php">Servir un verre</a>
            </button>
        </div>  
    </div>
</body>
</html>