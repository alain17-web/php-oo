<?php
/*
 * update controller
 */
$idarticle = (int) $_GET['update'];

// si on a envoyé le formulaire
if(!empty($_POST)){
    // create an Article's object
    $updateArticle = new Article($_POST);
    // update
    $update = $ArticleManager->updateArticleById($updateArticle,$idarticle);
    // si strictement vrai (return true)
    if($update===true){
        header("Location: ./?titre=".$updateArticle->getArticleSlug());
        exit();
    }
    // si c'est un tableau (le slug était déjà pris, on en change le nom avec un id unique)
    if(is_array($update)){
        header("Location: ./?titre=".$update[0]);
        exit();

    }else{
        $error = $update;
    }

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