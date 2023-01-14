<?php
session_start();
require_once('/var/www/html/CocktailMachine/controller/config.php');
require_once('/var/www/html/CocktailMachine/model/gateway/gatewayIngredient.php');
require_once('/var/www/html/CocktailMachine/model/gateway/gatewayCocktail.php');

$ingr = new GatewayIngredient($con);

//Mise à l'état par défaut de tous les ingrédients
$all = $ingr->GetAllIngredients();
foreach($all as $ingredient){
    $v = $ingr->setIngredientUnavailable($ingredient->ID_Ingredient);
    $v = $ingr->setPumpToNull($ingredient->ID_Ingredient);
}

//On récupère le cookie avec les IDs des ingrédients dispo
if (isset($_COOKIE["Pompe"])) {
    $pump = json_decode($_COOKIE["Pompe"], true);
    $i = 0;
    foreach($pump as $id)
    {
        if($i >= 10){
            return;
        }
        $v = $ingr->setIngredientAvailable($id);
        $v = $ingr->insertPumpNumber($i, $id);
        $i++;
    }
} else {
    #Le cookie n'est pas set
    echo 'cookie inexistant';
}

?>
