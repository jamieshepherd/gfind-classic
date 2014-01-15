<?php
/**
 * Created by PhpStorm.
 * User: Jamie
 * Date: 15/11/13
 * Time: 17:23
 */

class Widget_Getting_Started extends Widget {

    public function createWidget(){
        // What this widget does
        echo <<<HTML
        <p>Welcome to gfind.net, a large game database that aims to do some cool shit. To get started, why not try and </p>
HTML;


        // Close the widget in HTML
        echo "</ul></section>";
    }

} 