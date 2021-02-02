<?php
/*
 * Public's controller
 */

// connect view
if(isset($_GET['connect'])){
    require_once "../view/public/connectPublicView.php";
    exit();
}
// home view
require_once "../view/public/indexPublicView.php";