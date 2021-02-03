<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Tous les articles de <?= (isset($message))?$message:$user->getTheUserLogin() ;?></title>
    <link rel="stylesheet" href="css/bootstrap.css" media="screen">
    <link rel="stylesheet" href="css/custom.min.css" media="screen">
    <link rel="shortcut icon" href="images/favicon.ico">
</head>
<body id="page-top">
<div class="navbar navbar-expand-lg fixed-top navbar-dark bg-dark">
    <div class="container">
        <a href="./" class="navbar-brand">Accueil</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav">

                <li class="nav-item">
                    <a class="nav-link" href="?connect">Connexion</a>
                </li>
            </ul>

        </div>
    </div>
</div>

<div class="container">

    <div class="page-header" id="banner">
        <div class="row">
            <div class="col-lg-12 mx-auto">

                    <h1>Tous les articles de <?= (isset($message))?$message:$user->getTheUserLogin() ;?></h1>
                <hr>
                <h3>Exercice: Ici votre liste d'articles de l'auteur sélectionné</h3>
                <p>Au format comme les 2 articles ci-dessous, ils sont classés par la date descendante et n'appartiennent qu'à l'auteur connecté</p>
                <p>Quand on clique sur lire la suite on a le détail de l'article avec des retours à la ligne automatique!</p>
                <p>Pour afficher les articles, vous devrez avoir au préalable remplir les modèles <strong>Thenews</strong> (pour l'hydratation et les vérifications avec les setters et l'affichage grâce aux getters) et <strong>ThenewsManager</strong> (pour la sélection des articles dont l'id de l'utilisateur correspond) </p>
                <p>La partie <i>// author detail view</i> du <strong>publicController</strong> devra également être modifié</p>
                <?php
                if(isset($message)):
                    ?>
                    <button type="button" class="btn btn-warning"><?=$message?></button>
                <?php
                else:
                ?>
                <hr>
                <h4>Titre News 2</h4>
                <p>Ici un autre texte de maximum 150 caractères avec un ... <a href="?idarticle=2">Lire la suite</a></p>
                <h5>Le 2020-01-02 09:11:47</h5>
                <hr>
                <h4>Titre News 1</h4>
                <p>Ici le texte de maximum 150 caractères avec un ... <a href="?idarticle=1">Lire la suite</a></p>
                <h5>Le 2020-02-01 16:40:22</h5>
                <?php
                endif;
                ?>
                <hr>
                <a href="#page-top">Retour en haut</a>
                <hr>
            </div>

        </div>
    </div>

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/custom.js"></script>
</body>
</html>
