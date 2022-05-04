<?php
    require_once('../config/config.php');
    require_once('../Modèle/gateway/GatewayCocktail.php');

    $test = new GatewayCocktail($con);
    //Crée la gateway
    //Fait appel à la classe
    $u = $test->GetAvailableCocktail();
    
    foreach($u as $cocktail){
        echo $cocktail->Cocktail_ID;
        echo " contient " . $cocktail->Nombre_Ingredient . " ingrédients. <br/>";
    }
?>