<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Administration: Modification de l'article <?=$article->getTheNewsTitle()?></title>
    <link rel="stylesheet" href="css/bootstrap.css" media="screen">
    <link rel="stylesheet" href="css/custom.min.css" media="screen">
    <link rel="shortcut icon" href="images/favicon.ico">
</head>
<body id="page-top">
<div class="navbar navbar-expand-lg fixed-top navbar-dark bg-dark">
    <div class="container">
        <a href="./" class="navbar-brand">Accueil de l'administration</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link disabled text-white">Vous êtes connecté avec le login <?=$_SESSION['theUserLogin']?></a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="?disconnect">Déconnexion</a>
                </li>
            </ul>

        </div>
    </div>
</div>

<div class="container">

    <div class="page-header" id="banner">
        <div class="row">
            <div class="col-lg-12 mx-auto">

                <h1>Administration: Modification de l'article <?=$article->getTheNewsTitle()?></h1>
                <hr>

                <?php
                if(isset($message)):
                ?>
                    <button type="button" class="btn btn-warning"><?=$message?></button>
                <?php
                endif;
                ?>
                <hr>
                <form action="" name="connection" method="post">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Le titre :</label>
                        <input name="theNewsTitle" type="text" class="form-control" id="exampleInputEmail1"
                               aria-describedby="emailHelp" placeholder="Entrez votre titre" value="<?=htmlspecialchars($article->getTheNewsTitle(),ENT_QUOTES)?>" required>

                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Votre texte</label>
                        <textarea name="theNewsText" type="text" class="form-control" id="exampleInputPassword1"
                                  placeholder="Entrez du texte" required><?=$article->getTheNewsText()?></textarea>
                        <input name="theUser_idtheUser" type="hidden" value="<?=$article->getTheUser_idtheUser()?>" required>
                        <input name="idtheNews" type="hidden" value="<?=$article->getIdtheNews()?>" required>
                    </div>
                    <div class="form-group">
                        <label for="theNewsDate">Date :</label>
                        <input name="theNewsDate" type="text" class="form-control" required id="dateoftheday" value="<?=$article->getTheNewsDate()?>">

                    </div>
                    <button type="submit" class="btn btn-primary">Envoyer</button>
                </form>
                <hr>
            </div>

        </div>
    </div>

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/custom.js"></script>
</body>
</html>
