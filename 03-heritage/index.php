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
<pre><?php
    var_dump($vehiculeBasic1);
    ?></pre>
</body>
</html>
