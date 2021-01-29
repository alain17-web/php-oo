<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Voulez-vous vraiment supprimer l'article : <?=$article->getArticleTitle() ?></title>
</head>
<body>
<h1>Voulez-vous vraiment supprimer l'article : <?=$article->getArticleTitle() ?></h1>
<ul>
    <li><a href="./">Retour à l'accueil</a></li>
    <li><a href="?create">Créer un article</a></li>
</ul>
<p>
    Voulez-vous supprimer l'article dont l'id est <?=$article->getIdarticle() ?> et le slug est "<?=$article->getArticleSlug() ?>" ?
</p>
<h3>
    <a href="?delete=<?=$article->getIdarticle()?>&ok">Oui</a> - <a href="./?titre=<?=$article->getArticleSlug() ?>">Non</a>
</h3>

</body>
</html>
