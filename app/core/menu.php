<?php
/**
 *  Class that creates the menu object
 */

class Menu {

    public function __construct(){
        // Create all the items here instead
    }

    public static function newItem($icon,$label,$link){
        echo "  <a href=\"".$link."\" title>";
        echo "  <li>";
        echo "  <img src=\"/public/img/icons/".$icon.".png\" title=\"".$label."\">";
        echo "  <span>".$label."</span>";
        echo "  </li>";
        echo "  </a>\n";
    }
}