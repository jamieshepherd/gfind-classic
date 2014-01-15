<?php

/*
 * Load database, initialise connection
 */

require_once(COREPATH . "DB.php");

/*
 * Load any specific classes we are going to need
 */

require_once COREPATH . 'menu.php'; // Required on every page

if(isset($viewType)){
    switch ($viewType){
        case "game":
            require_once COREPATH . 'game.php';
            require_once COREPATH . 'widget.php';
            break;
        case "edit":
            require_once COREPATH . "game.php";
            break;
        case "release-dates":
            require_once COREPATH . "game.php";
            break;
        case "report":
            require_once COREPATH . "game.php";
            break;
    }
}