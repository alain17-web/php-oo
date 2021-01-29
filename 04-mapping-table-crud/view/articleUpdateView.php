<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mise à jour de l'article <?= (isset($error)) ? $error : $article->getArticleTitle() ?></title>
</head>
<body>
<h1>Mise à jour de l'article <?= (isset($error)) ? $error : $article->getArticleTitle() ?></h1>
<ul>
    <li><a href="./">Retour à l'accueil</a></li>
    <li><a href="?create">Créer un article</a></li>
</ul>
<?php
if(isset($error)):

else:
?>
<form action="" name="update" method="post">
    <input type="text" name="articleTitle" placeholder="Votre titre" required value="<?=$article->getArticleTitle()?>"><br>
    <input type="text" name="articleSlug" placeholder="Votre slug" value="<?=$article->getArticleSlug()?>" required ><br>
    <textarea name="articleText" placeholder="Votre texte" required><?=$article->getArticleText()?></textarea><br>
    <input type="text" name="articleAuthor" placeholder="Votre nom" value="<?=$article->getArticleAuthor()?>" required><br>
    <input type="text" name="articleDateTime" placeholder="Date de parution" value="<?=$article->getArticleDateTime()?>" required><br>
    <input type="hidden" name="idarticle" value="<?=$article->getIdarticle()?>">
    <input type="submit" value="Envoyer"><br>
</form>
<?php
endif;
?>
</body>
</html>
