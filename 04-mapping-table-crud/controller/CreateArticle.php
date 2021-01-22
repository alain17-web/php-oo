<?php

if(!empty($_POST)){
    $ArticleInsert = new Article($_POST);
    $insert = $ArticleManager->insertArticle($ArticleInsert);
    if($insert===true){
        header("Location: ./");
    }

}


require_once "../view/articleInsertView.php";