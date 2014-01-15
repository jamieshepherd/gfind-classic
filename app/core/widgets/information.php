<?php
/**
 * Created by PhpStorm.
 * User: Jamie
 * Date: 15/11/13
 * Time: 17:23
 */

class Widget_Information extends Widget {

    public function createWidget($game){
        echo "<a href=\"/edit/".$game->id."\" class=\"widget_edit\" title=\"Edit information\"></a>";
        // What this widget does
        echo "<ul>";
        if(!empty($game->developer)){
            echo "<li><strong>Developer: </strong>".$game->developer."</li>";
        }
        if(!empty($game->publisher)){
            echo "<li><strong>Publisher: </strong>".$game->publisher."</li>";
        }
        if(!empty($game->genre)){
            echo "<li><strong>Genre: </strong>".$game->genre."</li>";
        }
        if(!empty($game->platforms)){
            echo "<li><strong>Platforms: </strong>".$game->platforms."</li>";
        }
        if(!empty($game->engine)){
            echo "<li><strong>Engine: </strong>".$game->engine."</li>";
        }
        if(!empty($game->website)){
            echo "<li><strong>Website: </strong><a href=\"".$game->website."\" target=\"_blank\">Open website</a></li>";
        }

        // Close the widget in HTML
        echo "</ul></section>";
    }

} 