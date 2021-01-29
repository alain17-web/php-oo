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

// Instantiation du manager (une seule instance de cette classe acceptée : "pseudo" design pattern "singleton", mais n'est pas réellement activé ici, on peut instancier autant de ArticleManager qu'on le souhaite)
$ArticleManager = new ArticleManager($myConnect);

/*
 * Détail d'un article
 */

// on veut afficher le détail d'un article grâce au slug passé par la variable get titre
if(isset($_GET['titre'])){
    require_once "../controller/ReadArticle.php";
    exit();
}

/*
 * On veut insérer un article
 */
if(isset($_GET['create'])){
    require_once "../controller/CreateArticle.php";
    exit();
}

/*
 * On veut supprimer un article
 */
if(isset($_GET['delete'])&&ctype_digit($_GET['delete'])){
    require_once "../controller/DeleteArticle.php";
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

