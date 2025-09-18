<?php
require_once "personne.php";
require_once "personneSecure.php";
require_once "entreprise.php";
//main

$p1 = new Personne('Arsac', 'Jacques', 'jarsac');
$p2 = new PersonneSecure('Kador', 'Florent', 'fkador', '123456');
$entreprise=new Entreprise('Turgot');

$entreprise->ajouterPersonne($p1);
$entreprise->ajouterPersonne($p2);
echo "nombre de personnes : ",Personne::getNbInstances();
echo "\n";
echo "nombre de personnes : ",count($entreprise->getLesPersonnes());
echo "\n";
var_dump($entreprise);

echo $entreprise->getLesPersonnes()[1]->toXML()->asXML();

echo $entreprise->toXML()->asXML();


?>