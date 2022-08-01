<?php
    if(isset($_COOKIE["Pompe"])){
                                    
        $pump = json_decode($_COOKIE["Pompe"],true);
        #$pump est de type ARRAY
                            
        for($i = 0; $i < count($pump); $i++){
            
            if($pump[$i]['id'] == 999){

            }else{
                echo "ID de l'ingredient : ";
                print_r($pump[$i]['id']);
                echo '<br>';
                echo "Numéro de la pompe : ";
                print_r($pump[$i]['pump']);
                echo '<br>';
                echo '<br>';

                #appeler la fonction en passant en parametre
                #$pump[i]['pump']
                #en tant que numéro de pomp assignée
                #$pump[i]['id']
                #en tant qu'id d'ingrédient
            }
        }
    }else{
        echo "le cookie pompe n'est pas set";
    }

?>