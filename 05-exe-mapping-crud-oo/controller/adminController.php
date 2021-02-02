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

    // form view
    require_once "../view/admin/createAdminView.php";
    exit();
}

// homepage admin view
require_once "../view/admin/indexAdminView.php";