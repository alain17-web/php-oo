<?php

/*
Ceci est notre première classe, son nom est le même que le nom du fichier (respect des règles de nommages des  fonctions), généralement nommée en UpperCase ou CamelCase.
Une classe n'est pas un objet, elle permet par contre de créer des instances de classe, càd des "objets"
*/
class MaPremiereClass
{
    // Attributs - équivalence aux variables, on y ajoute la visibilité - ici ils sont publics
    public $valeur1=5;
    public $valeur2,$valeur3,$valeur4;

    // Constantes de classe - publiques, elles ne peuvent être modifiées et doivent avoir une valeur dès la création - UPPERCASE avec _ comme séparateurs
    const CONSTANTE_UNE = "Valeur invariable";

    // Méthodes - actions équivalentes à des fonctions, elles seront toujours locale (elle sont enfant de cette classe)
    public function AfficheValeur1() {

        // on va récupérer la $valeur1 de l'instance de la classe (nous avons du faire un new MaPremiereClass avant de pouvoir l'utiliser). $this représente l'instance de la classe
        echo $this->valeur1;
    }

    public function setValeur1(int $param1){
        $this->valeur1 = $param1;
    }
}