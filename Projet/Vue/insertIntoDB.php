<?php

session_start();


require_once('../config/config.php');
require_once('../Modèle/gateway/GatewayIngredient.php');
require_once('../Modèle/gateway/GatewayCocktail.php');

$ingr = new GatewayIngredient($con);


            if(isset($_COOKIE["Pompe"])){
                        
                $pump = json_decode($_COOKIE["Pompe"],true);
                #$pump est de type ARRAY
                                    
                for($i = 0; $i < count($pump); $i++){
                    
                    $v = $ingr->setIngredientPump($pump[$i]['id'],$pump[$i]['pump']);
                }
            }else{
                #Le cookie n'est pas set
            }

?>