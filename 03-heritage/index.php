<?php
require_once "Vehicule.php";
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Des véhicules</title>
</head>
<body>
<h1>Des véhicules</h1>
<h2>class Vehicule</h2>
<p>Classe de base (parente) des autres classes</p>
<p><?php
    $vehiculeBasic1 = new Vehicule();
    ?></p>
<h4>L'attribut public $slogan est le seul que l'on peut afficher/modifier directement</h4>
<p><?php
    echo 'echo $vehiculeBasic1->slogan => '.$vehiculeBasic1->slogan;
    ?></p>
<p><?php
    $vehiculeBasic1->slogan = "Un slogan personnalisé";
    echo '$vehiculeBasic1->slogan = ... ; puis echo $vehiculeBasic1->slogan => '.$vehiculeBasic1->slogan;
    ?></p>
<h4>Notre constante est publique, on peut l'afficher</h4>
<p>! Depuis PHP 7.1 les constantes peuvent être private ou protected, on l'affiche si elle est publique en utilisant NomDeLaClasse::CONSTANTE</p>
<p><?php
    echo 'echo Vehicule::CREATEUR => '.Vehicule::CREATEUR;
    ?></p>
<h4>Instanciation de Vehicule</h4>
<p>Le constructeur (public function __constuct(){}) est appelé lors de l'instanciation de la classe Vehicule</p>
<pre><code>public function __construct()
    {
    $this->setIdVehicule();
        }</code></pre>
<h4>setIdVehicule() est privé, on ne peut le modifier après la création</h4>
<p>En effet il n'est appelé que depuis le constructeur, et on a utilisé la fonction PHP uniqid(), pour lui donner une valeur unique et non modifiable</p>
<pre><code>private function setIdVehicule(): void
    {
    $this->idVehicule = uniqid();
    }</code></pre>
<h3>On utilise les getters pour afficher les attributs non publiques</h3>
<p><?php
    echo 'echo $vehiculeBasic1->getIdVehicule(); => '.$vehiculeBasic1->getIdVehicule();
    ?></p>
<p>On ne peut afficher que des attributs initialisés ou non null
    <?php
    //echo 'echo $vehiculeBasic1->getMarque(); => '.$vehiculeBasic1->getMarque();
    // echo 'echo $vehiculeBasic1->getAnnee(); => '.$vehiculeBasic1->getAnnee();
    ?></p>
<pre><?php
    var_dump($vehiculeBasic1);
    ?></pre>
</body>
</html>
