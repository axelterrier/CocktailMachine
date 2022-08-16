<?php

session_start();

if (isset($_SESSION['user'])) {
    // logged in
} else {
    header("Location:signin.php");
}

require_once('../config/config.php');
require_once('../Modèle/gateway/GatewayIngredient.php');
require_once('../Modèle/gateway/GatewayCocktail.php');

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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@200;300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@500;300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@600;300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@700;300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@900;300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="recipe.css">
    <title>Test UI Recette</title>
</head>
<body>

    <div class="mainView">
        <div class="upperRow">
            <?php
                if($_SESSION['lastPage'] == 'cocktailPage'){
                    ?>
                        <a href="cocktailPage.php">
                            <img src="/projet/vue/image/arrow.png" alt="" class="backArrow">
                        </a>
                    <?php
                }else{
                    ?>
                        <a href="favorite.php">
                            <img src="/projet/vue/image/arrow.png" alt="" class="backArrow">
                        </a>
                    <?php
                }
            ?>
            
             <h2 class="nomCocktail"><?php echo $v->Nom_Cocktail; ?></h2>
             <?php
                if($cock->IsLike($_SESSION['user'], $ID)){
                    ?>
                    <form method='post'>
                        
                    <?php
                        echo "
                        <button name='button_like' class='favoriteButton' value='like' style='border: none; background: transparent'>
                            <img src='/projet/vue/image/heart_filled.svg' name='button_like' value='like' class='favorite'>
                        </button>";
                    ?>
                    </form>
                    <?php
                }else{
                    ?>
                    <form method='post'>
                    <?php
                        echo"
                        <button name='button_like' class='favoriteButton' value='like' style='border: none; background: transparent'>
                            <img src='/projet/vue/image/heart.svg'  name='button_like' value='like' class='favorite'>
                        </button>";
                    ?>
                    </form>
                    <?php
                }
                if($_POST['button_like']=="like"){
                    $tests = $cock->LikeOrDislike($_SESSION['user'], $ID);
                    $_POST['button_like']="";
                    
                }
             ?>
            
        

        </div>
        <div class="middleRow">
        </div>
        <div class="lowerRow">
            <div class="column">
                <img src="/projet/vue/image/clock.png" alt="" class="detailIcon">
                <p class="valueDetail">1m30</p>
            </div>
            <div class="column">
                <img src="/projet/vue/image/star.png" alt="" class="detailIcon">
                <p class="valueDetail">8.5</p>
            </div>
            <div class="column">
                <img src="/projet/vue/image/calories.png" alt="" class="detailIcon">
                <p class="valueDetail">560</p>
            </div>
        </div>
    </div>

    <div class="ingredientView">
        <h3 class="Title">Ingredients</h3>
        <div class="cardSlider">

            <?php
                    foreach($u as $ingredient){
            ?>
            <div class="card" >
                <div class="cardFlex">
                    <div class="imageContainer">
                        <?php echo '<img src="data:image/jpeg;base64,'.base64_encode($ingredient->Image_Url).'" alt="" class="imageIngredient">' ?>
                    </div>
                   <h4 class="IngredientName"><?php echo $ingredient->Ingredient_Name ?></h4>
                   <p class="quantity">50mL</p>
                </div>
            </div>
            <?php
                }
            ?>
        </div>
    </div>

    <button></button>

    <div class="footer">
        <div class="checkIngredient">
            <img src="/projet/vue/image/shopping black.png" alt="" class="ingredient">
            <h4 class="ingredientCTA">Ingrédients</h4>
        </div>
        <div class="btn">
            <h4 class="serveCTA">Servir un verre</h4>
            <div class="arrowContainer">
                <img src="/projet/vue/image/arrow.png" alt="" class="arrowCTA">
            </div>
        </div>
    </div>
</body>
</html>