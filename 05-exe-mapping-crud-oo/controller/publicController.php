<?php
/*
 * Public's controller
 */

// connect view
if(isset($_GET['connect'])){
    // click to submit
    if(!empty($_POST)){
        // create an instance and hydrate Theuser
        $recupUser = new Theuser($_POST);
        // try to connect
        $connectUser = $userManager->connectUser($recupUser);
        // connect ok (strict true)
        if($connectUser===true){
            header("Location: ./");
            exit();
        }
        // connect not ok without sql error (false)
        if(!$connectUser){
            $message = "Login et/ou mot de passe incorrecte";
        // sql error
        }else{
            $message = $connectUser;
        }
    }
    require_once "../view/public/connectPublicView.php";
    exit();
}
// home view
require_once "../view/public/indexPublicView.php";