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

    public function getArticleTitle(): ?string
    {
        return $this->articleTitle;
    }

    public function getArticleSlug(): ?string
    {
        return $this->articleSlug;
    }

    public function getArticleText(): ?string
    {
        return $this->articleText;
    }

    public function getArticleDateTime(): ?string
    {
        return $this->articleDateTime;
    }

    public function getArticleAuthor(): ?string
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
         $title = strip_tags(trim($articleTitle));
        if(empty($title)){
            trigger_error("Votre titre ne peut être vide",E_USER_NOTICE);
        }elseif (strlen($title)>180){
            trigger_error("Votre titre ne peut pas dépasser 180 caractères",E_USER_NOTICE);
        }else{
            $this->articleTitle = $title;
        }
    }

    public function setArticleSlug(string $articleSlug): void
    {
        $slug = strip_tags(trim($articleSlug));
        if(empty($slug)){
            print("Votre slug ne peut être vide");
        }elseif (strlen($slug)>180){
            print("Votre slug ne peut pas dépasser 180 caractères");
        }else {
            $this->articleSlug = $articleSlug;
        }
    }

    public function setArticleText(string $articleText): void
    {
        $text = strip_tags(trim($articleText),"<br>,<p>,<div>,<a>,<img>");
        if(empty($text)){
            print("Votre texte ne peut être vide");
        }else {
            $this->articleText = $articleText;
        }
    }

    public function setArticleDateTime(string $articleDateTime): void
    {

        // vérification d'un datetime valide (à perfectionner) grâce à une regex (expression régulière)
        $regex = preg_grep("/^(\d{4})-(\d{2})-([\d]{2}) (\d{2}):([0-5]{1})([0-9]{1}):([0-5]{1})([0-9]{1})$/",[$articleDateTime]);
        if(empty($regex)){
            print("Format de date non valide");
        }else {
            $this->articleDateTime = $articleDateTime;
        }
    }

    public function setArticleAuthor(string $articleAuthor): void
    {
        $author = strip_tags(trim($articleAuthor));
        if(empty($author)){
            print("Votre nom d'auteur ne peut être vide");
        }elseif (strlen($author)>250){
            print("Votre nom d'auteur ne peut pas dépasser 250 caractères");
        }else {
            $this->articleAuthor = $articleAuthor;
        }
    }



}
