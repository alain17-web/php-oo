<?php


class Velo extends Vehicule
{
    // Attributs
    protected int $nbVitesse=5;
    protected string $color;
    protected string $cadre;

    // Méthodes

    // constructeur (écrase le parent)
    public function __construct(Array $tab = [])
    {
        // on récupère le parent car on en a besoin pour générer l'identifiant de l'objet Velo depuis Vehicule
        parent::__construct();

        // utilisation des setters si une variable de type tableau est passée non vide au constructeur de cette classe

    }

    // Création de l'hydratation avec accès protégé


    // getters (accessors) - toujours publiques - ils récupères les valeurs des attributs, règle de nommage: get - nom de l'attribut avec la première lettre mise en majuscule

    public function getNbVitesse(): int {
        // on renvoi la valeur de l'attribut $nbVitesse depuis l'instance créée de Velo ($this)
        return $this->nbVitesse;
    }
    public function getColor(): string {
        return $this->color;
    }
    public function getCadre(): string{
        return $this->cadre;
    }

    // Setters (mutateurs) - toujours publiques - ils permettent de mettre à jour les attributs en dehors de la classe - void : pas de retour on s'attend à un entier entre 1 et 12 (contrainte de conception)
    public function setNbVitesse(int $lulu): void {
        // les vérifications dans les setters ne sont que rarement suffisantes lors de la génération par un robot, on devra donc toujours protéger ces setters soi-même
        $lulu = (int) $lulu;
        if($lulu===0){
            echo "Valeur incorrecte, int attendu";
            exit();
        }elseif ($lulu>12){
            echo "Valeur incorrecte, 12 vitesses maximum";
            exit();
        }else {
            $this->nbVitesse = $lulu;
        }
    }

    /**
     * @param string $color
     */
    public function setColor(string $color): void
    {
        $long = strlen($color);
        if($long>=3 && $long <=50) {
            $this->color = $color;
        }else{
            echo "La Couleur doit avoir entre 2 et 50 caractères";
            exit();
        }
    }

    /**
     * @param string $cadre
     */
    public function setCadre(string $cadre): void
    {
        $this->cadre = $cadre;
    }


}