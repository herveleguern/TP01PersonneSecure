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
        $xml = simplexml_load_string('<personne/>');
        $xml->addChild('nom', $this->nom);
        $xml->addChild('prenom', $this->prenom);
        $xml->addChild('login', $this->login);
        return $xml;
    }
}
?>