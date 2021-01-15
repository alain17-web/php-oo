<?php

/*
 * L'extend permet d'étendre une classe en partant d'une autre, elle hérite de ses attributs public ou protected, de ses constantes protected ou public et des ses méthodes public et protected
 */

class Voiture extends Vehicule
{
    // Attributs (fields)
    // ce qui est ajouté dans cette classe enfant de Vehicule, se rajoute simplement à ce que l'on a dans Vehicule
    protected  $typeMoteur;
    protected $nbRoues=4;
    protected $nbPortes;

    // si on écrit un attribut se trouvant dans le parent, on l'ECRASE
    protected $type="Véhicule à moteur";


    // constructeur de Voiture, il ECRASE le constructeur de son parent, dans notre cas c'est un problème car la méthode setIdVehicule() est privée, donc accessible que depuis Vehicule;
    public function __construct(Array $tab = [])
    {
        // comme le constructeur du parent a été écrasé, on peut le SURCHARGER (! vocabulaire, pour certains surcharger est changer le nombre de paramètre qu'on peut passer à une méthode, PHP n'utilise pas ce concept) en utilisant parent:: càd qu'on garde le constructeur de Vehicule, et on rajoute ce que l'on souhaite à celui de Voiture
        parent::__construct();

        // ceci est propre au constructeur de voiture, pour pouvoir avoir un nombre non défini de paramètres, on utilise un tableau, si il est vide, on ne fait rien, si il est rempli
        if(!empty($tab)){
            $this->hydrate($tab);
        }

    }

    // Méthodes

    // Getters
    /**
     * @return string
     */
    public function getTypeMoteur(): string
    {
        return $this->typeMoteur;
    }

    /**
     * @return int
     */
    public function getNbRoues(): int
    {
        return $this->nbRoues;
    }

    /**
     * @return int
     */
    public function getNbPortes(): int
    {
        return $this->nbPortes;
    }

    // Setters (Mutators)
    /**
     * @param string $typeMoteur
     */
    public function setTypeMoteur(string $typeMoteur): void
    {
        $this->typeMoteur = $typeMoteur;
    }

    /**
     * @param int $nbRoues
     */
    public function setNbRoues(int $nbRoues): void
    {
        $this->nbRoues = $nbRoues;
    }

    /**
     * @param int $nbPortes
     */
    public function setNbPortes(int $nbPortes): void
    {
        $this->nbPortes = $nbPortes;
    }




}