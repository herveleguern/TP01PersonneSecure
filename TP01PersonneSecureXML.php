<?php

interface XMLable{
    public function toXML();
}

class Personne 
{
    private $nom;
    private $prenom;
    private $login;

    public function __construct($nom, $prenom, $login)
    {
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->login = $login;
    }

    public function __toString()
    {
        return $this->nom . " " . $this->prenom . "   " . $this->login;
    }

    
}

class PersonneSecure extends Personne
{
    private $md5pwd;
    function __construct($nom, $prenom, $login, $md5pwd)
    {
        parent::__construct($nom, $prenom, $login);
        $this->md5pwd = $md5pwd;
    }

    public function __toString()
    {
        return parent::__toString() . " " . $this->md5pwd;
    }

    
}

//main
$p1 = new Personne('Arsac', 'Jacques', 'jarsac');
echo $p1, "<br>";



$p2 = new PersonneSecure('Kador', 'Florent', 'fkador', 'password');
echo $p2, "<br>";


?>
