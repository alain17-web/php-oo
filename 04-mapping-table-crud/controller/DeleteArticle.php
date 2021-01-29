<?php
/*
 * Suppression d'un article
 */

// on convertit la chaîne de caractère en entier
$idarticle = (int) $_GET['delete'];

// on a cliqué sur "oui" => vraiment supprimer l'article
if(isset($_GET['ok'])){
    // on essaye de supprimer l'article
    $delete = $ArticleManager->deleteArticleById($idarticle);

    // pas de soucis de suppression
    if($delete===true){
        // redirection
        header("Location: ./");
        exit();
    }
    // sinon affichage de l'erreur
    echo $delete;

// on arrive sur la page de suppression
}else{
    // on doit récupérer le titre et l'id de l'article
    $recup = $ArticleManager->readOneArticleById($idarticle);
    // si on ne trouve pas l'article
    if(empty($recup)){
        // redirection vers l'accueil (bidouillage d'url)
        header("Location: ./");
        exit();
    }

    // passage des données récupérées dans une instance de la classe Article
    $article = new Article($recup);

    // on a trouvé l'article
    require_once "../view/articleDeleteView.php";
}