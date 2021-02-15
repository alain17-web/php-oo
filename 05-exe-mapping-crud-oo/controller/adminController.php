<?php
/*
 * Admin's controller
 */

// Disconnect
if(isset($_GET['disconnect'])){
    if(TheuserManager::disconnectUser()){
        header("Location: ./");
        exit();
    }
}

// create article
if(isset($_GET['create'])){

    // exercice's action
    if(isset($_POST['theNewsTitle'])){
        $newsInstance = new Thenews($_POST);
        $insert = $newsManager->insertArticleAdmin($newsInstance,$_SESSION['idtheUser']);
        if($insert){
            header("Location: ./");
            exit();
        }else{
            $message = "Vos champs doivent être a un format valide";
        }
    }
    // form view
    require_once "../view/admin/createAdminView.php";
    exit();
}

// detail admin article
if(isset($_GET['idarticle'])&&ctype_digit($_GET['idarticle'])){

    // exercice's action
    $idarticle = (int) $_GET['idarticle'];
    $iduserAdmin = (int) $_SESSION['idtheUser'];
    $recup = $newsManager->readOneNewsAdminById($idarticle,$iduserAdmin);

    if(!empty($recup)){
        $article = new Thenews($recup);
    }else{
        // la personne n'a pas le droit de voir cet article
        TheuserManager::disconnectUser();
        header("Location: ./"); exit;
    }

    // form view
    require_once "../view/admin/articleAdminView.php";
    exit();
}

// Delete Article by id and by author

if(isset($_GET['delete'])&&ctype_digit($_GET['delete'])){
    // real delete
    if(isset($_GET['ok'])){
        $delete = $newsManager->deleteArticleAdmin($_GET['delete'],$_SESSION['idtheUser']);
        if($delete){
            // la personne n'a pas le droit de supprimer cet article
            TheuserManager::disconnectUser();
            header("Location: ./"); exit;
        }else{
            echo "error";
        }
    }
    $recup = $newsManager->readOneNewsAdminById($_GET['delete'],$_SESSION['idtheUser']);
    if(!empty($recup)){
        $article = new Thenews($recup);
    }else{
        // la personne n'a pas le droit de supprimer cet article
        TheuserManager::disconnectUser();
        header("Location: ./"); exit;
    }

    require_once "../view/admin/deleteAdminView.php";
    exit;
}


// Homepage with all articles by connected user
$recup = $newsManager->readAllNewsByIdUser($_SESSION['idtheUser']);
if(empty($recup)){
    $message = "Pas encore d'article écrit par {$_SESSION['theUserLogin']}";
}else{
    foreach ($recup as $article){
        $item[]= new Thenews($article);
    }
}

// homepage admin view
require_once "../view/admin/indexAdminView.php";