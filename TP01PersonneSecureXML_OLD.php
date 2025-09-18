<?php

interface XMLable{
    public function toXML();
}

class Personne implements XMLable
{
    private $nom;
    private $prenom;
    private $login;
    private static $nbInstances = 0;    //nb instances

    public function __construct($nom, $prenom, $login)
    {
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->login = $login;
        self::$nbInstances++;
    }

    static function getNbInstances()
    {
        return self::$nbInstances;
    }

    public function __toString()
    {
        return $this->nom . " " . $this->prenom . "   " . $this->login;
    }

    public function toXML()
    {
        $xml = simplexml_load_string('<Personne/>');
        $xml->addChild('nom', $this->nom);
        $xml->addChild('prenom', $this->prenom);
        $xml->addChild('login', $this->login);
        return $xml;
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

    public function toXML(){
        $xml=parent::toXML();
        $xml->addChild('md5pwd',$this->md5pwd);
        return $xml;
        
    }
}

//main
$p1 = new Personne('Arsac', 'Jacques', 'jarsac');
echo $p1, "<br>";
echo Personne::getNbInstances(), "<br>";
echo $p1->toXML()->asXML();

$p2 = new PersonneSecure('Kador', 'Florent', 'skador', 'password');
echo $p2, "<br>";
echo Personne::getNbInstances(), "<br>";
echo $p2->toXML()->asXML();
