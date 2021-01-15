<?php


/*class Velo extends Vehicule
{
    protected $genre;
    protected $taille;
    protected $nbreVitesses;

    public function __construct($array = [])
    {
        parent::__construct();
        if(! empty($array)){
            foreach($array as $key => $value){
                $methodSets = "set".ucfirst($key);
                if(method_exists($this,$methodSets)){
                    $this->$methodSets($value);

                }
                else{
                    echo $methodSets."n'existe pas";
                }
            }
        }
    }

    /*Getters*/
    public function getGenre():string
    {
        return $this->genre;
    }

    public function getTaille():string
    {
        return $this->taille;
    }

    public function getNbreVitesses():int
    {
        return $this->nbreVitesses;
    }

    /*Setters*/

    public function setGenre(string $genre)
    {
        $this->genre = $genre;
    }

    public function setTaille(string $taille)
    {
        $this->taille = $taille;
    }

    public function setNbreVitesses(int $nbreVitesses)
    {
        $this->nbreVitesses = $nbreVitesses;
    }
    
}*/