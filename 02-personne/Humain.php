<?php

// Usine à fabriquer des instances (objets) de type "Humain"
class Humain
{
    // Attributs privés ou protégés ne peuvent être manipuler en dehors de la classe (le procteted peuvent l'être dans les enfants de la classe)
    protected $nom = "Anonyme";
    protected $prenom = "Moi";
    private $dateDeNaissance;

    // Constantes
    const RACE = "Homo Sapiens Sapiens";

    // Méthodes

        // Constructeur: méthode magique appelée lors de l'instanciation de la  classe ( new )
        public function __construct(string $name, string $surname, string $date){
            // Attribution des valeurs aux attributs en utilisant les setters (hydratation)
            $this->setNom($name);
            $this->setPrenom($surname);
            $this->setDateDeNaissance($date);

        }

        // Getters - ce sont des méthodes publiques permettant de récupérer les valeurs des attributs
        public function getNom(){
            return $this->nom;
        }
        public function getPrenom(){
            return $this->prenom;
        }
        public function getDateDeNaissance(){
            return $this->dateDeNaissance;
        }

        // Setters - ce sont des méthodes publiques permettant de modifier les valeurs des attributs
        public function setNom(string $nom): void
        {
            $this->nom = trim($nom);
        }

        public function setPrenom(string $prenom): void
        {
            $this->prenom = trim($prenom);
        }

        public function setDateDeNaissance(string $Naissance): void
        {
            // si la date est au format date (Y-m-d): 2020-01-24
            if (preg_match("/^[0-9]{4}-[0-1][0-9]-[0-3][0-9]$/",$Naissance))
            {
                // on modifie la date
                $this->dateDeNaissance = $Naissance;
            }
        }

        // autres méthodes
        public function manger(string $nourriture){
            return $this->getNom()." mange $nourriture";
        }


}