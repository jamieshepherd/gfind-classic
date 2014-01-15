<?php

/*
 * www.gfind.net
 * By Jamie Shepherd
 * GitHub: www.github.com/user/jamieshepherd/gfind
 

/*
 * Constants
 */

defined('BASEPATH') or define('BASEPATH', dirname(realpath(__FILE__)));
defined('VIEWPATH') or define('VIEWPATH', BASEPATH."/app/views/");
defined('COREPATH') or define('COREPATH', BASEPATH."/app/core/");
defined('CONFPATH') or define('CONFPATH', BASEPATH."/app/config/");

/*
 * Check if we're on a specific page
 * If we are, include that page (if it exists)
 * If not, we're on the index page (include that).
 */



if(isset($_GET['page'])){

    $viewType = $_GET['page'];

    if(file_exists(VIEWPATH.$viewType.".php")){
        require_once (VIEWPATH.$viewType.".php");
    } else {
        echo "This page does not exist";
    }

} else {
    $viewType = "home";
        require_once (VIEWPATH."home.php");
}