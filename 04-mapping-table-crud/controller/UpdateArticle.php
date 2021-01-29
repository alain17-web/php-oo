<?php
/*
 * update controller
 */
$idarticle = (int) $_GET['update'];

// si on a envoyé le formulaire
if(!empty($_POST)){
    // create an Article's object
    $updateArticle = new Article($_POST);
    echo"<pre>";
    var_dump($updateArticle);
    echo"</pre>";
}

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