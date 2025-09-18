<?php
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
?>