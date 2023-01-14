<?php
use LDAP\Result;
//Objectif gateway -> Intéraction avec la BDD
//Création des requêtes

require_once('/var/www/html/CocktailMachine/controller/connection.php');
require_once('/var/www/html/CocktailMachine/controller/config.php');

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

    public function GetCocktailNumberPerIngredient(int $idIngredient){
        $query = "SELECT count(*) as count FROM Cocktail_Composition WHERE Cocktail_Composition.Ingredient_ID=:idIngredient;";
        $this->db->executeQuery($query, array(':idIngredient' => array($idIngredient, PDO::PARAM_STR)));
        $res = $this->db->getResults();
        $result = array();
        foreach ($res as $row) {
            $result = $row['count'];
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
    
    #permets de tester si un cocktail est déja mis en favori, retourne True si il est liké et False si non
    public function IsLike(string $idUtilisateur,int $idCocktail){
        $tabN = array();
        $query = "SELECT COUNT(*) FROM `like` WHERE id_personne=:idUtilisateur AND id_cocktail=:idCocktail";
        $this->db->executeQuery($query, 
        array(':idUtilisateur' => array($idUtilisateur, PDO::PARAM_STR),
        ':idCocktail' => array($idCocktail, PDO::PARAM_INT)));

        
        $res = $this->db->getResults();  
        foreach($res as $row){
            $tabN[] = $row['COUNT(*)'];
        }
        if($tabN[0]!=0){
            return 1;
        }
        return 0;

    }

    public function LikeOrDislike(string $idUtilisateur,int $idCocktail){
        $test = $this->IsLike($idUtilisateur,$idCocktail);
        if($test==1){
            $this->DislikeCocktail($idUtilisateur,$idCocktail);
        }
        else{
            $this->LikeCocktail($idUtilisateur,$idCocktail);
        }
    }

    public function LikeCocktail(string $idUtilisateur,int $idCocktail){
        $query = "INSERT INTO `like` VALUES(:idCocktail,:idUtilisateur)";
        $this->db->executeQuery($query,array(
            ":idUtilisateur"=>array($idUtilisateur,PDO::PARAM_STR),
            ":idCocktail"=>array($idCocktail, PDO::PARAM_INT)
        ));
        header("Refresh:0");
    }

    public function DislikeCocktail(string $idUtilisateur,int $idCocktail){
        $query = "DELETE FROM `like` where id_personne=:idUtilisateur AND id_cocktail=:idCocktail";
        $this->db->executeQuery($query,array(
            ":idUtilisateur"=>array($idUtilisateur,PDO::PARAM_STR),
            ":idCocktail"=>array($idCocktail, PDO::PARAM_INT)
        ));
        header("Refresh:0");
    }

    public function getFavorite(string $idUtilisateur){
        $tabN = array();
        $result = array();
        $query = "SELECT * FROM `like` WHERE id_personne=:idUtilisateur";
        $this->db->executeQuery($query,array(
            ":idUtilisateur"=>array($idUtilisateur,PDO::PARAM_STR)
        ));
        
        $tabN = $this->db->getResults();
        foreach($tabN as $row){
            array_push($result,$this->GetInfoCocktail($row['id_cocktail']));
        }
        return $result;
    }

    public function getIngredientID($idCocktail){
        $query = "SELECT Ingredient_ID FROM `Cocktail_Composition` WHERE ID_Cocktail=:idCocktail";
        $this->db->executeQuery($query,array(
            ":idCocktail"=>array($idCocktail,PDO::PARAM_INT)
        ));
        $res = $this->db->getResults();
        $result = array();
        foreach($res as $row){
            $result[] = $row['Ingredient_ID'];
        }
        return $result;
    }

    //récupère le nombre total de cocktail enregistré en bdd
    public function getCocktailNumber(){
        $query = "SELECT count(*) FROM `Cocktail`";
        $this->db->executeQuery($query);
        $res = $this->db->getResults();
        foreach ($res as $row) {
            $result = $row['count(*)'];
        }
        return $result;
    }
    public function setCocktailAvailable(int $Cocktail_ID){
        $query = "UPDATE Cocktail SET Est_Disponible = TRUE WHERE Cocktail_ID =:Cocktail_ID";
        $this->db->executeQuery($query, array(':Cocktail_ID' => array($Cocktail_ID, PDO::PARAM_STR)));
        $res = $this->db->getResults();
        return $res;
    }

    public function setCocktailUnavailable(int $Cocktail_ID){
        $query = "UPDATE Cocktail SET Est_Disponible = FALSE WHERE Cocktail_ID =:Cocktail_ID";
        $this->db->executeQuery($query, array(':Cocktail_ID' => array($Cocktail_ID, PDO::PARAM_STR)));
        $res = $this->db->getResults();
        return $res;
    }
}
