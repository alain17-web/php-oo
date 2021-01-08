<?php
require_once "Humain.php";
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Classes humanoïdes</title>
</head>
<body>
<h1>Les classes de base</h1>
<h2>Humain</h2>
<p>Instanciations de 2 humains</p>
<?php
// les arguments sont passés en paramètre via le constructeur lors de l'instanciation de la classe (new Humain())
$human1 = new Humain("Pitz","Michaël","1977-03-02");
$human2 = new Humain("Antony","Audrey","hahahaharggggg ;-)");
?>
<h4>Affichage d'une constante</h4>
<p>Avec le nom de la classe suivie de :: le nom de la constante</p>
<code>echo Humain::RACE;</code>
<p>
<?php
echo Humain::RACE;
?>
</p>
<h4>Affichage d'un attribut protected ou private</h4>
<h5>Utilisation du getter créé à cet effet</h5>
<code>// interdit:
    // echo $human1->nom; => echo $human1->getNom();
    </code><p>
<?php
// interdit:
// echo $human1->nom;
// il faut utiliser un getter pour cela
echo "Nom : {$human1->getNom()} - Prénom : {$human1->getPrenom()} - Date de naissance : {$human1->getDateDeNaissance()}";
echo "<hr>";
echo "Nom : {$human2->getNom()} - Prénom : {$human2->getPrenom()} - Date de naissance : {$human2->getDateDeNaissance()}";
?></p>
<h4>Modification d'un attribut protected ou private</h4>
<h5>Utilisation du setter créé à cet effet</h5>
<code>// interdit:
    // echo $human1->nom = "Luc"; => $human1->setNom("Luc");
</code><p>
    <?php
    $human1->setNom(" Dubosc");
    $human1->setPrenom("Frank");
    $human1->setDateDeNaissance("1968-08-12");
    echo "Modification de la première instance : {$human1->getNom()}  - {$human1->getPrenom()} - {$human1->getDateDeNaissance()}"
    ?>
</p>
<h4>Autres méthodes</h4>
<code>$human2->mange("du blé");</code>
<p><?= $human2->manger("du blé"); ?></p>
<p><?= $human1->manger("du sable"); ?></p>
<pre>
    <?php
    var_dump($human1,$human2);
    ?>
</pre>
</body>
</html>
