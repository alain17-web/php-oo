<?php


class Velo extends Vehicule
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
    public function getGenre()
    {
        return $this->genre;
    }

    public function getTaille()
    {
        return $this->taille;
    }

    public function getNbreVitesses()
    {
        return $this->nbreVitesses;
    }

    /*Setters*/

    public function setGenre($genre)
    {
        $this->genre = $genre;
    }

    public function setTaille($taille)
    {
        $this->taille = $taille;
    }

    public function setNbreVitesses($nbreVitesses)
    {
        $this->nbreVitesses = $nbreVitesses;
    }
    
}