<?php
// récupération d'un article
$recupOneArticle = $ArticleManager->readAllArticleBySlug($_GET['titre']);
if(!empty($recupOneArticle)){
    // instanciation d'Article avec les données récupérées
    $article = new Article($recupOneArticle);
}else{
    $error = "Cet article n'existe plus";
}
require_once "../view/articleView.php";
