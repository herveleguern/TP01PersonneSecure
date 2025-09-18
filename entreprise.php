<?php
require_once "personne.php";
require_once "personneSecure.php";

class Entreprise{
    private $nom;
    private $lesPersonnes=[];

    public function __construct($nom){
    $this->nom=$nom;
    }
        
    public function getLesPersonnes(){
        return $this->lesPersonnes;
    }

    public function ajouterPersonne($unePersonne){
        $this->lesPersonnes[]=$unePersonne;
    }

    

}

?>