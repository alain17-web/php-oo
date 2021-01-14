<?php
require_once "Vehicule.php";
require_once "Voiture.php";
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Des enfants de Vehicule</title>
</head>
<body>
<h1>Des enfants de Vehicule</h1>
<p>Liés à la classe Vehicule.php</p>
<h2><a href="./">class Vehicule</a> - <a href="index2.php">Enfants de Vehicule</a></h2>
<h3>Exemple de la classe Voiture</h3>
<p>Il faut la charger dans les dépendances (haut de cette page), L'extend permet de l'étendre de la classe Vehicule, elle hérite de ses attributs public ou protected, de ses constantes protected ou public et des ses méthodes public et protected</p><p>Si cette classe est vierge, elle héritera de l'entièreté de Vehicule sans altération.</p>
<pre><code>
class Voiture extends Vehicule
{

}
    </code>
</pre>
<h4>Création d'un Vehicule puis d'une Voiture</h4>
<?php
$vehicule1 = new Vehicule();
$voiture1 = new Voiture();
?>
<p>Donc si la classe enfant Voiture est vide, pas de changement par rapport au Vehicule</p>
<p>
    <?php
    $voiture1->setSlogan("La meilleure voiture du moment");
    $voiture1->setMarque("Tesla");
    $voiture1->setModel("MODEL 3");
    echo "La {$voiture1->getMarque()} {$voiture1->getModel()} est : {$voiture1->getSlogan()}"
    ?>
</p>
<h4>Si on crée des attributs et méthodes qui ne se trouvaient pas dans le parent, ils sont simplement ajoutés aux futures instances (objets) de la classe Voiture</h4>

<pre><code>class Voiture extends Vehicule
{

    // ce qui est ajouté dans cette classe enfant de Vehicule, se rajoute simplement à ce que l'on a dans Vehicule
    protected string $typeMoteur;
    protected $nbRoues=4;
    protected int $nbPortes;


    // Méthodes

    // Getters
    public function getTypeMoteur(): string
    {
        return $this->typeMoteur;
    }

    public function getNbRoues(): int
    {
        return $this->nbRoues;
    }

    public function getNbPortes(): int
    {
        return $this->nbPortes;
    }

    // Setters (Mutators)
    public function setTypeMoteur(string $typeMoteur): void
    {
        $this->typeMoteur = $typeMoteur;
    }

    public function setNbRoues(int $nbRoues): void
    {
        $this->nbRoues = $nbRoues;
    }

    public function setNbPortes(int $nbPortes): void
    {
        $this->nbPortes = $nbPortes;
    }

        Puis comme utilisation:
        $voiture1->setNbPortes(4);
        $voiture1->setTypeMoteur("Electrique");
        echo "La {$voiture1->getMarque()} {$voiture1->getModel()} est : {$voiture1->getSlogan()}<br>
        c'est une {$voiture1->getNbPortes()} portes et sa motorisation est {$voiture1->getTypeMoteur()}. <br>
        L'identifiant unique de cet objet de type Voiture (et qui est récupérée depuis Vehicule et qui est généré grâce au constructeur et la méthode privée setIdVehicule()): {$voiture1->getIdVehicule()}<br>
        c'est ".Voiture::CREATEUR." qui a créé cet objet";
    </code></pre>
<p>
    <?php
    $voiture1->setNbPortes(4);
    $voiture1->setTypeMoteur("Electrique");
    echo "La {$voiture1->getMarque()} {$voiture1->getModel()} est : {$voiture1->getSlogan()}<br> c'est une {$voiture1->getNbPortes()} portes et sa motorisation est {$voiture1->getTypeMoteur()}. <br> L'identifiant unique de cet objet de type Voiture (et qui est récupérée depuis Vehicule et qui est généré grâce au constructeur et la méthode privée setIdVehicule()): {$voiture1->getIdVehicule()}<br> c'est ".Voiture::CREATEUR." qui a créé cet objet";
    ?>
<h4>On va créer un constructeur pour la Voiture</h4>
<p>Le constructeur écrase le constructeur du parent (un attribut ou méthode réécrite écrase celles du parent), ce qui nous pose un problème car l'identifiant de la voiture ne peut être créé que dans Vehicule (private)</p>
<h3>un attribut ou méthode réécrite dans un enfant écrase celles du parent</h3>
<p>Pour récupérer le constructeur du parent, on peut utiliser</p>
<h3>parent::__construct();</h3>
<p>On le place à l'intérieur du constructeur de Voiture</p>
<pre><code> public function __construct(Array $tab = [])
    {
        // ceci est propre au constructeur de voiture, pour pouvoir avoir un nombre
        parent::__construct();

        // non défini de paramètres, on utilise un tableau, si il est vide, on ne fait rien
        if(!empty($tab)){
            var_dump($tab);
        }</code></pre>
<?php
$voiture2 = new Voiture(["typeMoteur"=>"essence"])
?>
<p>
</p>
<pre><?php var_dump($vehicule1,$voiture1,$voiture2);?></pre>
</body>
</html>
