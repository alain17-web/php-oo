<?php
/*
 * tests utilisateurs de la classe Article
 */

require_once "../model/Article.php";

// Article vide
$vide = new Article([]);

// Article pour affichage, hydratation complète
$affiche = new Article(
    [
        "idarticle"=>7,
        "articleTitle"=>"un titre",
        "articleSlug"=>"un-titre",
        "articleText"=>"Un peu de texte",
        "articleDateTime"=>"2021-01-20 09:52:19",
        "articleAuthor"=>"Quelqu'un",
        ]
);

// Article pour insertion :
$insert = new Article(
    [
        "articleTitle"=>"un titre",
        "articleSlug"=>"un-titre",
        "articleText"=>"Un peu de texte",
        "articleAuthor"=>"Quelqu'un",
    ]
);

?>
<pre><?php var_dump($vide,$affiche,$insert); ?></pre>