<?php

if(!empty($_POST)){
    $ArticleInsert = new Article($_POST);
    $ArticleManager->insertArticle($ArticleInsert);
}


require_once "../view/articleInsertView.php";