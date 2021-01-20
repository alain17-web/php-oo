<?php
/**
 * Contrôleur Frontal
 */

// Dépendances
require_once "../config.php"; // configuration
require_once "../model/Article.php"; // mapping de la table
require_once "../model/ArticleManager.php";// gestionnaire de la table Article
require_once "../model/MyPDO.php";// Notre connexion PDO modifiée

// connexion
try{
    $myConnect = new MyPDO(DB_TYPE.":host=".DB_HOST.";dbname=".DB_NAME.";port=".DB_PORT.";charset=".DB_CHARSET,DB_LOGIN,DB_PWD,true);
}catch(PDOException $e){
    die($e->getMessage());
}

// Instantiation du manager
$ArticleManager = new ArticleManager($myConnect);

/*
 * Détail d'un article
 */

// on veut afficher le détail d'un article
if(isset($_GET['titre'])){
    $recupOneArticle = $ArticleManager->readOneArticle($_GET['titre']);
    if(!empty($recupOneArticle)){
        // instanciation d'Article avec les données récupérées
        $article = new Article($recupOneArticle);
    }else{
        $error = "Cet article n'existe plus";
    }
    require_once "../view/articleView.php";
    exit();
}

/*
 * Accueil
 */

// récupération des résultats de la requête SQL en format tableau
$recupAll = $ArticleManager->readAllArticle();

// si on ne récupère pas d'articles
if(empty($recupAll)){
    $error = "Pas encore d'article dans la table";
}else {
    // UTILISATION RARE (plus lente et souvent inutile (double boucle) pour de l'affichage) pour l'affichage d'une simple requête, mais les puristes utiliseront les setters de Article pour être certain que les formats sont respectés
    foreach ($recupAll as $item) {
        $afficheAllArticle[] = new Article($item);
    }
}

// appel de la vue
require_once "../view/indexView.php";

