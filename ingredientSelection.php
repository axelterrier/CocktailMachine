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
            cpt = 0;
            var sliderChecked = 0
            let pumpNumber = [{
                    id: '999',
                    pump: '99'
                },
                {
                    id: '999',
                    pump: '99'
                },
                {
                    id: '999',
                    pump: '99'
                },
                {
                    id: '999',
                    pump: '99'
                },
                {
                    id: '999',
                    pump: '99'
                },
                {
                    id: '999',
                    pump: '99'
                },
                {
                    id: '999',
                    pump: '99'
                },
                {
                    id: '999',
                    pump: '99'
                },
                {
                    id: '999',
                    pump: '99'
                },
                {
                    id: '999',
                    pump: '99'
                }
            ]
            let pumpNumberCopy = [{
                    id: '999',
                    pump: '1'
                },
                {
                    id: '999',
                    pump: '2'
                },
                {
                    id: '999',
                    pump: '3'
                },
                {
                    id: '999',
                    pump: '4'
                },
                {
                    id: '999',
                    pump: '5'
                },
                {
                    id: '999',
                    pump: '6'
                },
                {
                    id: '999',
                    pump: '7'
                },
                {
                    id: '999',
                    pump: '8'
                },
                {
                    id: '999',
                    pump: '9'
                },
                {
                    id: '999',
                    pump: '10'
                }
            ]
            let temporaryPump
            let temporaryId
        </script>
        <?php
        foreach ($u as $ingredient) {
        ?>
            <div class="card">
                <div class="upperRow">

                    <div class="imgContainer">
                        <?php echo '<img src="data:image/jpeg;base64,' . base64_encode($ingredient->Image_Url) . '" alt="" class="IngredientImage">' ?>
                    </div>
                    <div class="infoContainer">
                        <h4 class="ingredientName"><?php echo $ingredient->Ingredient_Name ?></h4>
                        <?php $ID = $ingredient->ID_Ingredient;
                        $NbCocktail = $ingr->GetCocktailNumber($ID) ?>
                        <p class="description">utilisé dans <?php echo intval($NbCocktail) ?> cocktails</p>
                    </div>

                    <label class="switch">
                        <input type="checkbox" id="<?php echo $ingredient->ID_Ingredient ?>" onchange="changeMessage(<?php echo $ingredient->ID_Ingredient ?>)">
                        <span class="slider round"></span>
                    </label>



                </div>
                <div class="lowerRow" id="<?php echo $ID; ?>">
                    <h4 class="assigned" id="assigned<?php echo $ID; ?>"></h4>
                    <h4 class="unassigned" id="unassigned<?php echo $ID; ?>">Sélectionner l'ingrédient pour qu'il soit assigné à une pompe</h4>
                </div>
                <script>
                    <?php
                    //Permets de sélectionner graphiquement les ingrédients déja dispo dans la bdd
                    if ($ingr->IsIngredientAvailable($ingredient->ID_Ingredient)) {
                    ?>
                        document.getElementById(cpt).checked = true;
                    <?php
                    }
                    ?>
                    cpt++;
                </script>
            </div>


            <script>
                /*
                    Objectif
                        lier l'ID d'une carte et un numéro de pompe

                        On teste si l'ID n'est pas déjà dans l'array tampon
                            si il l'est il n'est pas dispo donc déjà assigné
                            si non on peut l'assigner a quelque chose
                        
                        On teste si l'ID de la pompe n'est pas déja dans l'array tampon 
                            si il l'est il n'est pas dispo donc déjà assigné
                            si non on peut l'assigner a quelque chose
                */

                function changeMessage(ID) {
                    assignedMessage = document.getElementById("assigned" + ID)
                    unassignedMessage = document.getElementById("unassigned" + ID)
                    if (document.getElementById(ID).checked == true) {
                        sliderChecked = sliderChecked + 1
                        //Appel a une fonction pour modifier le numéro de la pompe
                        for (var i = 0; i < pumpNumber.length; i++) {
                                if (pumpNumber[i].id == ID) {
                                    //L'array tampon contient l'ID donc il est déjà assigné
                                    break
                                } else {
                                    if (pumpNumberCopy[i].pump != 99) {
                                        temporaryPump = pumpNumberCopy[i].pump
                                        pumpNumber[i].pump = temporaryPump
                                        pumpNumber[i].id = ID
                                        pumpNumberCopy[i].pump = 99
                                        

                                        break
                                    }
                                }
                            console.log(sliderChecked)
                        }
                        console.log("after for " +sliderChecked)
                        if(sliderChecked > 10){
                            document.getElementById(ID).checked = false
                            sliderChecked = 10
                            //Mettre une pop up pour dire que trop de pompes sont assignées
                        }else{
                            assignedMessage.innerHTML = "Ingrédient assigné à la pompe n°" + temporaryPump
                            assignedMessage.style.opacity = "1"
                            unassignedMessage.style.opacity = "0"
                        }
                        
                        
                    } else {
                        for (var i = 0; i < pumpNumber.length; i++) {
                            if (pumpNumber[i].id == ID) {
                                pumpNumberCopy[i].pump = pumpNumber[i].pump
                                pumpNumberCopy[i].id = pumpNumber[i].id
                                pumpNumber[i].pump = 99
                                pumpNumber[i].id = 999
                                sliderChecked--
                                break
                            }
                        }
                        //appel a une fonction qui remets à disposition le numéro de la pompe occupée
                        assignedMessage.style.opacity = "0"
                        unassignedMessage.style.opacity = "1"
                    }

                }
            </script>
        <?php
        }
        ?>
    </div>
</body>

</html>

<script>
    <?php
        foreach ($u as $ingredient) {
            ?>
                changeMessage(<?php echo $ingredient->ID_Ingredient;?>)
            <?php
        }
    ?>
</script>