<?php
/*
 * update controller
 */
$idarticle = (int) $_GET['update'];

// model

// get one article by id
$recup = $ArticleManager->readOneArticleById($idarticle);

// no article
if(empty($recup)){
    exit("Erreur, article non existant");
}

// create an object "Article"
$article = new Article($recup);


// view
require_once "../view/articleUpdateView.php";