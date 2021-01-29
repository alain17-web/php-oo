<?php
/*
 * update controller
 */
$idarticle = (int) $_GET['update'];

// model
$recup = $ArticleManager->readOneArticleById($idarticle);

var_dump($recup);

// view
