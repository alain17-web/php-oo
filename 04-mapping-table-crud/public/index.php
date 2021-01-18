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
