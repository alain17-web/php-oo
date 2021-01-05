<?php

// Usine à fabriquer des instances (objets) de type "Humain"
class Humain
{
    // Attributs privés ou protégés ne peuvent être manipuler en dehors de la classe (le procteted peuvent l'être dans les enfants de la classe)
    protected $nom = "Anonyme";
    protected $prenom = "Moi";
    private $dateDeNaissance;

    // Constantes
    const GENRE = "Homo Sapiens Sapiens";

    // Méthodes

        // Constructeur: méthode magique appelée lors de l'instanciation de la  classe ( new )
        public function __construct(string $name, string $surname, string $date){
            // Attribution des valeurs aux attributs (hydratation)
            $this->nom=$name;
            $this->prenom=$surname;
            $this->dateDeNaissance=$date;
        }


}