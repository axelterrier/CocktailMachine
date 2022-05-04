<?php


class Cocktail
{
    public $Cocktail_ID;
    public $Nom_Cocktail;
    public $Description_Cocktail;
    public $Est_Disponible;
    public $Nombre_Ingredient;

    public function __construct(int $Cocktail_ID, $Nom_Cocktail, $Description_Cocktail, $Est_Disponible, $Nombre_Ingredient) {
        $this->Cocktail_ID=$Cocktail_ID;
        $this->Nom_Cocktail=$Nom_Cocktail;
        $this->Description_Cocktail=$Description_Cocktail;
        $this->Est_Disponible=$Est_Disponible;
        $this->Nombre_Ingredient=$Nombre_Ingredient;
    }
}

?>