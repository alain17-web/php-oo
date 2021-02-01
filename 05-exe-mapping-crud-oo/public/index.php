<?php
/*
 * Front Controller
 */

// Session
session_start();

/*
 * Dependencies
 */
require_once "../config.php";
require_once "../model/MyPDO.php";
require_once "../model/theuser/Theuser.php";
require_once "../model/theuser/TheuserManager.php";
