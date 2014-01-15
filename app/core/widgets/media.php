<?php
/**
 * Created by PhpStorm.
 * User: Jamie
 * Date: 15/11/13
 * Time: 17:23
 */

class Widget_Media extends Widget {

    public function createWidget($game){
        // What this widget does
        if(!empty($game->video)){
            echo "<div class=\"videowrapper\">";
            echo "<iframe width=\"400\" height=\"30\" src=\"//www.youtube.com/embed/".$game->video."\" frameborder=\"0\" allowfullscreen></iframe>";
            echo "</div>";
        } else {
            echo "<p>There is no media listed for ".$game->title.". <a href=\"/edit/".$game->id."\">Click here</a> to add a video for this game.</p>";
        }
        // Close the widget in HTML
        echo "</section>";
    }

} 