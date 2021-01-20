<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Accueil de notre affichage de table</title>
</head>
<body>
<h1>Nos articles</h1>
<?php
if (isset($error)):
?>
<h2><?=$error?></h2>
<?php
else:
    foreach ($afficheAllArticle as $item):
        ?>
        <h3><?= $item->getArticleTitle() ?></h3>

        <p><?= ArticleManager::cutTheText($item->getArticleText(),30) ?> ... <a href="?titre=<?=$item->getArticleSlug()?>">Lire l'article complet</a></p><!--
        On aurait du avoir une instance $ArticleManager pour utiliser cutTheText si on n'avait pas utilisé le mot static devant la méthode cutTheText
        <p><?= $ArticleManager->cutTheText($item->getArticleText(),30) ?></p>-->
        <h5>Ecrit par <?= $item->getArticleAuthor() ?> le <?= $item->getArticleDateTime() ?></h5>
    <?php
    endforeach;
endif;
?>
</body>
</html>
