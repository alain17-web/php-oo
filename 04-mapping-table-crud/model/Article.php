<?php

// Mapping "main" de notre table article

class Article
{
    // Attributs

    /* si les attibuts sont typés et non initialisés, on doit utiliser une classe externe pour vérifier ces champs "uninitialised": https://www.php.net/manual/fr/class.reflectionproperty.php
    private int $idarticle;
    private string $articleTitle;
    private string $articleSlug;
    private string $articleText;
    private string $articleDateTime;
    private string $articleAuthor;
    */
    /*
     * Attributs non typés, valent NULL si non initialisés
     */
    private $idarticle;
    private $articleTitle;
    private $articleSlug;
    private $articleText;
    private $articleDateTime;
    private $articleAuthor;



    // constantes

    // Méthodes

    // constructeur de Article (Appelé lors de l'instanciation par new Article($param)), le tableau $param est obligatoire
    public function __construct(Array $param){
        // hydratation de l'instance avec les valeurs dans le tableau
        $this->hydrate($param);
    }

    // hydratation dans cette classe
    private function hydrate(Array $datas){
        foreach($datas as $key => $value){
            $methodSetters = "set".ucfirst($key);
            if(method_exists($this,$methodSetters)){
                $this->$methodSetters($value);
            }
        }
    }


    // Getters - méthodes publiques qui affichent les attributs privés ou protégés

    public function getIdarticle(): int
    {
        return $this->idarticle;
    }

    public function getArticleTitle(): string
    {
        return $this->articleTitle;
    }

    public function getArticleSlug(): string
    {
        return $this->articleSlug;
    }

    public function getArticleText(): string
    {
        return $this->articleText;
    }

    public function getArticleDateTime(): string
    {
        return $this->articleDateTime;
    }

    public function getArticleAuthor(): string
    {
        return $this->articleAuthor;
    }

    // Setters - permettent de modifier les attributs protected ou private


    public function setIdarticle(int $idarticle): void
    {
        $this->idarticle = $idarticle;
    }

    public function setArticleTitle(string $articleTitle): void
    {
        $this->articleTitle = strip_tags(trim($articleTitle));
    }

    public function setArticleSlug(string $articleSlug): void
    {
        $this->articleSlug = $articleSlug;
    }

    public function setArticleText(string $articleText): void
    {
        $this->articleText = $articleText;
    }

    public function setArticleDateTime(string $articleDateTime): void
    {
        $this->articleDateTime = $articleDateTime;
    }

    public function setArticleAuthor(string $articleAuthor): void
    {
        $this->articleAuthor = $articleAuthor;
    }



}