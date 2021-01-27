<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Insertion d'un nouvel Article</title>
</head>
<body>
<h1>Insertion d'un nouvel Article</h1>
<ul>
    <li><a href="./">Retour à l'accueil</a></li>
    <li><a href="?create">Créer un article</a></li>
</ul>
<form action="" name="insertion" method="post">
    <?php
    if(isset($insert)) echo $insert;
    ?>
    <input type="text" name="articleTitle" placeholder="Votre titre" required><br>
    <input type="text" name="articleSlug" placeholder="Votre slug" required><br>
    <textarea name="articleText" placeholder="Votre texte" required></textarea><br>
    <input type="text" name="articleAuthor" placeholder="Votre nom" required><br>
    <input type="submit" value="Envoyer"><br>
</form>
</body>
</html>
