<?php
require_once('../config/config.php');
require_once('../Modèle/gateway/GatewayIngredient.php');
require_once('../Modèle/gateway/GatewayCocktail.php');

$ingr = new GatewayIngredient($con);
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
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@200;300&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="ingredientSelection.css">
    <title>Sélection des ingrédients</title>
</head>
<body>
    <div class="titleContainer">
        <h1 class="title">Sélectionner les ingrédients disponible</h1>
    </div>
    <div class="cardContainer">
        <script>
            cpt=0;
        </script>
        <?php
            foreach($u as $ingredient)
            {
        ?>
        <div class="card">
            <div class="imgContainer">
                <?php echo '<img src="data:image/jpeg;base64,'.base64_encode($ingredient->Image_Url).'" alt="" class="IngredientImage">' ?>            
            </div>
            <div class="infoContainer">
                <h4 class="ingredientName"><?php echo $ingredient->Ingredient_Name ?></h4>
                <?php $ID = $ingredient->ID_Ingredient;
                $NbCocktail = $ingr->GetCocktailNumber($ID) ?>
                <p class="description">utilisé dans <?php echo intval($NbCocktail) ?> cocktails</p>
            </div>
            
            <label class="switch">
                <input type="checkbox" id="<?php echo $ingredient->ID_Ingredient ?>">
                <span class="slider round"></span>
            </label>
            
           

        </div>
        <script>
            <?php
                if($ingr->IsIngredientAvailable($ingredient->ID_Ingredient)){
                    ?>
                        document.getElementById(cpt).checked = true;
                    <?php
                }
            ?>
            cpt++;
        </script>
        <?php
            }
        ?>
    </div>
</body>



</html>


<?php

foreach($u as $ingredient){
    ?>
        
    <?php
}
?>