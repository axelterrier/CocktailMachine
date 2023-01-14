<?php
//Objectif gateway -> Intéraction avec la BDD
//Création des requêtes

require_once('/var/www/html/CocktailMachine/controller/connection.php');
require_once('/var/www/html/CocktailMachine/controller/config.php');

class GatewayIngredient
{
    private $db;

    public function __construct(Connection $db)
    {
        $this->db = $db;
    }

    public function GetAllIngredients(){
        $tabN = array();
        $query = "SELECT * FROM Ingredients";
        $this->db->executeQuery($query);
        $res = $this->db->getResults();
        foreach($res as $row){
            $tabN[] = new Ingredient($row['ID_Ingredient'], $row['Ingredient_Name'], $row['Viscosite'], $row['Taux_Alcool'], $row['Est_Disponible'], $row['Image_Url'], $row['Pompe']);
        }
        return $tabN;
    }

    public function GetAvailableIngredients(){
        $tabN = array();
        $query = "SELECT * FROM Ingredients WHERE Est_Disponible = TRUE";
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
        $query = "SELECT Ingredients.Est_Disponible, Ingredients.ID_Ingredient, Ingredients.Ingredient_Name, Ingredients.Taux_Alcool, Ingredients.Viscosite, Ingredients.Image_Url, Ingredients.Pompe, Cocktail_Composition.Quantite 
                    FROM (Cocktail INNER JOIN Cocktail_Composition ON Cocktail.Cocktail_ID = Cocktail_Composition.ID_Cocktail) 
                        INNER JOIN Ingredients ON Ingredients.ID_Ingredient = Cocktail_Composition.Ingredient_ID 
                    WHERE Cocktail.Cocktail_ID=:idCocktail";
        $this->db->executeQuery($query, array(':idCocktail' => array($idCocktail, PDO::PARAM_STR)));
        $res = $this->db->getResults();
        foreach($res as $row){
            $tabN[] = new Ingredient($row['ID_Ingredient'], $row['Ingredient_Name'], $row['Viscosite'], $row['Taux_Alcool'], $row['Est_Disponible'], $row['Image_Url'], $row['Pompe']);
        }
        return $tabN;
    }

    public function GetCocktailNumber(int $ID_Ingredient){ //Récupère le nombre de cocktail avec lequel peut être utilisé un ingredient
        $query = "SELECT COUNT(*) AS NbCocktail FROM Cocktail_Composition WHERE Ingredient_ID=:ID_Ingredient";
        $this->db->executeQuery($query, array(':ID_Ingredient' => array($ID_Ingredient, PDO::PARAM_STR)));
        $res = $this->db->getResults();
        foreach($res as $row){
            $result = $row['NbCocktail'];
        }
        return $result;
    }

    public function setIngredientAvailable(int $ID_Ingredient){
        $query = "UPDATE Ingredients SET Est_Disponible = TRUE WHERE ID_Ingredient =:ID_Ingredient";
        $this->db->executeQuery($query, array(':ID_Ingredient' => array($ID_Ingredient, PDO::PARAM_STR)));
        $res = $this->db->getResults();
        return $res;
    }

    public function setIngredientUnavailable(int $ID_Ingredient){
        $query = "UPDATE Ingredients SET Est_Disponible = FALSE WHERE ID_Ingredient =:ID_Ingredient";
        $this->db->executeQuery($query, array(':ID_Ingredient' => array($ID_Ingredient, PDO::PARAM_STR)));
        $res = $this->db->getResults();
        return $res;
    }

    public function IsIngredientAvailable(int $ID_Ingredient){ //Active le toggle si l'ingredient est dispo dans la bdd
        $query = "SELECT Est_Disponible FROM Ingredients WHERE ID_Ingredient=:ID_Ingredient";
        $this->db->executeQuery($query, array(':ID_Ingredient' => array($ID_Ingredient, PDO::PARAM_STR)));
        $res = $this->db->getResults();
        foreach($res as $row){
            $result = $row['Est_Disponible'];
        }
        return $result;
    }

    public function insertPumpNumber(int $Pompe, int $ID_Ingredient){
        $query = "UPDATE Ingredients SET Pompe=:Pompe WHERE ID_Ingredient=:ID_Ingredient";
        $this->db->executeQuery($query,  array(':Pompe' => array($Pompe, PDO::PARAM_INT),
                                        ':ID_Ingredient' => array($ID_Ingredient, PDO::PARAM_INT)));
        $res = $this->db->getResults();
        return $res;
    }

    public function setPumpToNull(int $ID_Ingredient){
        $query = "UPDATE Ingredients SET Pompe=NULL WHERE ID_Ingredient=:ID_Ingredient";
        $this->db->executeQuery($query, array(':ID_Ingredient' => array($ID_Ingredient, PDO::PARAM_INT)));
        $res = $this->db->getResults();
        return $res;
    }

    public function getIngredientQuantity(int $ID_Cocktail){
        $query = "SELECT Quantite FROM `Cocktail_Composition` WHERE ID_Cocktail =:ID_Cocktail";
        $this->db->executeQuery($query,array(
            ":ID_Cocktail"=>array($ID_Cocktail,PDO::PARAM_INT)
        ));
        $res = $this->db->getResults();
        $result = array();
        foreach($res as $row){
            $result[] = $row['Quantite'];
        }
        return $result;
    }
}
