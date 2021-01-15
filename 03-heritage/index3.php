<?php
require_once "Vehicule.php";
require_once "Voiture.php";
require_once "Velo.php";
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Velo enfant de Vehicule</title>
</head>
<body>
<h1>Velo enfant de Vehicule</h1>
<p>Liés à la classe Vehicule.php</p>
<h2><a href="./">class Vehicule</a> - <a href="index2.php">Enfants de Vehicule: Voiture</a> - <a href="index3.php">Enfants de Vehicule : Velo</a></h2>
<h3>Exemple de la classe Velo</h3>
<p>Il faut la charger dans les dépendances (haut de cette page), L'extend permet de l'étendre de la classe Vehicule, elle hérite de ses attributs public ou protected, de ses constantes protected ou public et des ses méthodes public et protected</p><p>Si cette classe est vierge, elle héritera de l'entièreté de Vehicule sans altération.</p>
<h3>Exercice</h3>
<p>Créez un classe nommée Velo.php étendue de Vehicule</p>
<p>Rajouter un constructeur utilisant celui de Vehicule mais auquel on pourrait rajouter des valeurs (hydratation via un tableau)</p>
<p>Ajouter 3 attributs protégés</p>
<p>Créer les 3 getters et les 3 setters liés à ces attributs</p>

<h3>Donc</h3>
<p>$a = new Velo(); => objet vide (à part l'id et les valeurs par défauts)</p>
<p>$b = new Velo(["attributs1"=>"valeur1", ...]); => objet hydraté (tous ses Attributs sont remplis)</p>
<p>Affichez les attributs de $b avec les getters</p>
<<<<<<< HEAD
<hr>

<?php 
/*$a = new Velo();
?>
<h4>var_dump de $a</h4>
<pre>
<?php 

var_dump($a);
?>
</pre>
<?php 
$b = new Velo(["marque"=>"BMX","genre"=>"VTT", "taille"=>"enfant", "nbreVitesses"=>6])
?>
<h4>Mon vélo B</h4>
<p>Genre: <?=$b->getGenre()?></p>
<p>Taille: <?=$b->getTaille()?></p>
<p><?=$b->getNbreVitesses()?> vitesses</p>
<p>Marque: <?=$b->getMarque()?></p>

<h4>var_dump de $b</h4>
<pre>
<?php 
var_dump($b);
?>
</pre>
=======
<p>
    <?php
    $a = new Velo();
    ?>
</p>
<p><pre><?php var_dump($a); ?></pre></p>
>>>>>>> dc490d0369e1af5eeafc95e46de3f4a7c9d4e9e2
</body>
</html>*/
