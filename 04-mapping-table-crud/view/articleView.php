<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Article : <?= (isset($error)) ? $error : $article->getArticleTitle() ?></title>
</head>
<body>
<h1>Article : <?= (isset($error)) ? $error : $article->getArticleTitle() ?></h1>
<ul>
    <li><a href="./">Retour à l'accueil</a></li>
    <li><a href="?create">Créer un article</a></li>
</ul>
<?php
if (!isset($error)):
    ?>
    <h3><?= $article->getArticleTitle() ?></h3>

    <p><?= nl2br($article->getArticleText()) ?></p>
    <h5>Ecrit par <?= $article->getArticleAuthor() ?> le <?= $article->getArticleDateTime() ?></h5>
<?php
endif;
?>
</body>
</html>
