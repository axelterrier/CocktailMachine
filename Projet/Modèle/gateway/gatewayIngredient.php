<?php
//Objectif gateway -> Intéraction avec la BDD
//Création des requêtes

require_once('/var/www/html/CocktailMachine/config/connection.php');

class GatewayIngredient
{
    private $db;

    public function __construct(Connection $db)
    {
        $this->db = $db;
    }

    public function GetAllIngredients(){
        $tabN = array();
        $query = "SELECT * FROM ingredients";
        $this->db->executeQuery($query);
        $res = $this->db->getResults();
        foreach($res as $row){
            $tabN[] = new Ingredient($row['ID_Ingredient'], $row['Ingredient_Name'], $row['Viscosite'], $row['Taux_Alcool'], $row['Est_Disponible'], $row['Image_Url'], $row['Pompe']);
        }
        return $tabN;
    }

    public function GetAvailableIngredients(){
        $tabN = array();
        $query = "SELECT * FROM ingredients WHERE Est_Disponible = TRUE";
        $this->db->executeQuery($query);
        $res = $this->db->getResults();
        foreach($res as $row){
            $Nombre_Ingredient = $this->GetIngredient($row['Cocktail_ID']);
            $tabN[] = new Ingredient($row['ID_Ingredient'], $row['Ingredient_Name'], $row['Viscosite'], $row['Taux_Alcool'], $row['Est_Disponible'], $row['Image_Url'], $row['Pompe']);
        }
        return $tabN;
    }

    public function GetIngredient(int $idCocktail) {
        $tabN = array();
        $query = "SELECT ingredients.Est_Disponible, ingredients.ID_Ingredient, ingredients.Ingredient_Name, ingredients.Taux_Alcool, ingredients.Viscosite, ingredients.Image_Url, ingredients.Pompe, cocktail_composition.Quantite 
                    FROM (cocktail INNER JOIN cocktail_composition ON cocktail.Cocktail_ID = cocktail_composition.ID_Cocktail) 
                        INNER JOIN ingredients ON ingredients.ID_Ingredient = cocktail_composition.Ingredient_ID 
                    WHERE cocktail.Cocktail_ID=:idCocktail";
        $this->db->executeQuery($query, array(':idCocktail' => array($idCocktail, PDO::PARAM_STR)));
        $res = $this->db->getResults();
        foreach($res as $row){
            $tabN[] = new Ingredient($row['ID_Ingredient'], $row['Ingredient_Name'], $row['Viscosite'], $row['Taux_Alcool'], $row['Est_Disponible'], $row['Image_Url'], $row['Pompe']);
        }
        return $tabN;
    }

    public function GetCocktailNumber(int $ID_Ingredient){ //Récupère le nombre de cocktail avec lequel peut être utilisé un ingredient
        $query = "SELECT COUNT(*) AS NbCocktail FROM cocktail_composition WHERE Ingredient_ID=:ID_Ingredient";
        $this->db->executeQuery($query, array(':ID_Ingredient' => array($ID_Ingredient, PDO::PARAM_STR)));
        $res = $this->db->getResults();
        foreach($res as $row){
            $result = $row['NbCocktail'];
        }
        return $result;
    }

    public function IsIngredientAvailable(int $ID_Ingredient){ //Active le toggle si l'ingredient est dispo dans la bdd
        $query = "SELECT Est_Disponible FROM ingredients WHERE ID_Ingredient=:ID_Ingredient";
        $this->db->executeQuery($query, array(':ID_Ingredient' => array($ID_Ingredient, PDO::PARAM_STR)));
        $res = $this->db->getResults();
        foreach($res as $row){
            $result = $row['Est_Disponible'];
        }
        return $result;
    }

    public function insertPumpNumber(int $Pompe, int $ID_Ingredient){
        $query = "UPDATE ingredients SET Pompe=:Pompe WHERE ID_Ingredient=:ID_Ingredient";
        $this->db->executeQuery($query,  array(':Pompe' => array($Pompe, PDO::PARAM_STR),
                                        ':ID_Ingredient' => array($ID_Ingredient, PDO::PARAM_INT)));
        $res = $this->db->getResults();
        return $res;
    }
}

