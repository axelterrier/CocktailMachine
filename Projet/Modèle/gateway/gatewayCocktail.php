<?php
//Objectif gateway -> Intéraction avec la BDD
//Création des requêtes

require_once('../config/connection.php');

class GatewayCocktail
{
    private $db;

    public function __construct(Connection $db)
    {
        $this->db = $db;
    }

    public function GetAvailableCocktail() {
        $tabN = array();
        $query = "SELECT * FROM Cocktail WHERE Est_Disponible = TRUE";
        $this->db->executeQuery($query);
        $res = $this->db->getResults();
        foreach($res as $row){
            $Nombre_Ingredient = $this->GetIngredientNumberPerCocktail($row['Cocktail_ID']);
            $tabN[] = new Cocktail($row['Cocktail_ID'], $row['Nom_Cocktail'], $row['Description_Cocktail'], $row['Est_Disponible'], $Nombre_Ingredient, $row['Image_Cocktail']);
        }
        return $tabN;
    }

    public function GetIngredientNumberPerCocktail(int $idCocktail){
        $query = "SELECT COUNT(*) FROM Cocktail_Composition WHERE Cocktail_Composition.ID_Cocktail=:idCocktail";
        $this->db->executeQuery($query, array(':idCocktail' => array($idCocktail, PDO::PARAM_STR)));
        $res = $this->db->getResults();
        $result = array();
        foreach ($res as $row) {
            $result = $row['COUNT(*)'];
        }
        return $result;
        
    }

    public function GetInfoCocktail(int $idCocktail){
        $query = "SELECT * FROM Cocktail WHERE Cocktail_ID=:idCocktail";
        $this->db->executeQuery($query, array(':idCocktail' => array($idCocktail, PDO::PARAM_STR)));
        $res = $this->db->getResults();
        
        foreach($res as $row){
            $tabN[] = new Cocktail($row['Cocktail_ID'], $row['Nom_Cocktail'], $row['Description_Cocktail'], $row['Est_Disponible'], 0, $row['Image_Cocktail']);
        }
        return $tabN[0];
    }
    

}

