<?php


class  Vehicule
{
    // Attributs protégés (non modifiables/lisibles depuis l'extérieure de la classe, sauf depuis ses héritiers (class ... extends Vehicule)), on peut, si on ne met pas de valeur par défaut, typer l'attribut en définissant ce que l'on souhaite mettre dedans
    protected string $model;
    protected string $marque;
    protected string $type;
    protected $annee;
    // publique, peut être modifié/lu sans vérification en dehors de la classe (en cas d'instanciation)
    public $slogan = "Un slogan";
    // ne peut être modifié/lu sans vérification que dans la classe Vehicule
    private string $idVehicule;

    // Constantes (visibilité autre que public possible depuis PHP 7.1) - doit avoir une valeur dès sa création
    public const CREATEUR = "Pitz Michaël";

    // Méthodes


    // GETTERS

    // Constructeur - Appelé lors de l'instanciation
    /**
     * Vehicule constructor.
     */
    public function __construct()
    {
        // appel de la fonction private setIdVehicule(), pour qu'un id unique soit créé pour ce véhicule
        $this->setIdVehicule();
    }

    // Création de l'hydratation avec accès protégé
    protected function hydrate(Array $item): void
    {
        // tant qu'on a des éléments dans le tableau
        foreach($item as $key => $value){
            // création du nom du setter avec le nom de l'attribut (première lettre mise en majuscule avec ucfirst()) attendu dans le tableau en tant que clef
            $methodSetters = "set".ucfirst($key);
            // si le setter existe dans l'instance ($this, donc dans l'instance de cette classe y compris les parents, (classes mères))
            if(method_exists($this,$methodSetters)){
                // utilisation du setter pour enregistrer la valeur dans un attribut => $this->setModel("Clio");
                $this->$methodSetters($value);
            }
        }
    }

    /**
     * @return string
     */
    public function getModel(): string
    {
        return $this->model;
    }

    /**
     * @return string
     */
    public function getMarque(): string
    {
        return $this->marque;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @return int
     */
    public function getAnnee(): int
    {
        return $this->annee;
    }

    /**
     * @return string
     */
    public function getSlogan(): string
    {
        return $this->slogan;
    }

    /**
     * @return string
     */
    public function getIdVehicule(): string
    {
        return $this->idVehicule;
    }

    // SETTERS

    /**
     * @param string $model
     */
    public function setModel(string $model): void
    {
        $this->model = $model;
    }

    /**
     * @param string $marque
     */
    public function setMarque(string $marque): void
    {
        $this->marque = $marque;
    }

    /**
     * @param string $type
     */
    public function setType(string $type): void
    {
        $this->type = $type;
    }

    /**
     * @param int $annee
     */
    public function setAnnee(int $annee): void
    {
        $this->annee = $annee;
    }

    /**
     * @param string $slogan
     */
    public function setSlogan(string $slogan): void
    {
        $this->slogan = $slogan;
    }

    // méthodes personnalisées
    /**
     * On ne peut pas changer l'id du véhicule depuis l'extérieur, donc ceci n'est plus un vrai setter, on va changer sa visibilité en private
     */
    private function setIdVehicule(): void
    {
        $this->idVehicule = uniqid();
    }






}