<?php

class Utilisateur
{
    public $Utilisateur_ID;
    public $Nom;
    public $Prenom;
    public $Password;
    public $Age;
    public $Taille;
    public $Poids;

    public function __construct(int $Utilisateur_ID, $Nom, $Prenom, $Password, $Age, $Taille, $Poids) {
        $this->Utilisateur_ID = $Utilisateur_ID;
        $this->Nom = $Nom;
        $this->Prenom = $Prenom;
        $this->Password = $Password;
        $this->Age = $Age;
        $this->Taille = $Taille;
        $this->Poids = $Poids;
    }
}

?>