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
foreach ($afficheAllArticle as $item):
?>
<h3><?=$item->getArticleTitle()?></h3>
<p><?=$item->getArticleText()?></p>
<h5></h5>
<?php
endforeach;
?>
</body>
</html>
