<?php
/**
 * Created by PhpStorm.
 * User: Jamie
 * Date: 30/11/13
 * Time: 22:59
 */

class Widget_Share extends Widget {
    public function createWidget($game){
        echo <<<share
        <div class="socialbuttons">
        <span class='st_facebook_hcount' displayText='Facebook'></span>
        <span class='st_twitter_hcount' displayText='Tweet'></span>
        <span class='st_googleplus_hcount' displayText='Google +'></span>
        </div>
share;

        // Close the widget in HTML
        echo "</section>";
    }
} 