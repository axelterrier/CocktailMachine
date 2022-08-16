<?php
//Objectif gateway -> Intéraction avec la BDD
//Création des requêtes

require_once('../config/connection.php');

class GatewayUtilisateur
{
    private $db;

    public function __construct(Connection $db)
    {
        $this->db = $db;
    }

    public function CheckCredentials(string $idUser, string $password) {
        $tabN = array();
        $query = "SELECT Password FROM utilisateur WHERE Utilisateur_ID=:idUser";
        $this->db->executeQuery($query, array(':idUser' => array($idUser, PDO::PARAM_STR)));
        $res = $this->db->getResults();
        foreach($res as $row){
            $tabN = $row['Password'];
        }
        if(password_verify($password,$tabN)){
            return true;
        }else{
            return false;
        }
    }

    public function CheckIfUserExist(string $idUser){
        $tabN = array();
        $query = "SELECT * FROM utilisateur WHERE Utilisateur_ID=:idUser";
        $this->db->executeQuery($query, array(':idUser' => array($idUser, PDO::PARAM_STR)));
        $res = $this->db->getResults();
        mysqli_num_rows($res);
        return $res;
    }

    public function AddUser(string $pseudo, string $password){
        $query = "INSERT INTO `utilisateur` (Utilisateur_ID,Password) VALUES (:pseudo, :password)";
        $success = $this->db->executeQuery($query,array(
            ":pseudo"=>array($pseudo,PDO::PARAM_STR),
            ":password"=>array($password, PDO::PARAM_STR)
        ));
        return $success;
    }

    public function GetInfoUtilisateur(string $idUtilisateur){
        $tabN = array();
        $query = "SELECT * FROM utilisateur WHERE Utilisateur_ID=:idUtilisateur";
        $this->db->executeQuery($query, array(':idUtilisateur' => array($idUtilisateur, PDO::PARAM_STR)));
        $res = $this->db->getResults();
        
        foreach($res as $row){
            $tabN[] = new Utilisateur($row['Utilisateur_ID'], $row['Nom'], $row['Prenom'], $row['Age'], $row['Taille'], $row['Poids']);
        }
        return $tabN[0];
    }
}
?>


