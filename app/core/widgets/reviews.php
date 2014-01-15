<?php
/**
 * Created by PhpStorm.
 * User: Jamie
 * Date: 15/11/13
 * Time: 17:06
 */

class Widget_Reviews extends Widget {

    public function createWidget($game){
        echo "<a href=\"#\" class=\"widget_edit\" title=\"Edit reviews\"></a>";

        $DB = DB::getInstance();
        $reviews = $DB->connection->prepare('SELECT * FROM reviews WHERE game_id='.$game->id);
        $reviews->execute();

        // Check we actually get some results
        if($reviews->rowCount() > 0){
            while ($row = $reviews->fetch()){
                echo "<blockquote>";
                echo "<a href=\"".$row['review_url']."\"><q>";
                echo $row['review_short'];
                echo "</q><cite>";
                echo $row['review_reference'];
                echo "</cite></a></blockquote>";
            }
        } else {
            echo "<p>No reviews have been added for ".$game->title." yet. Would you like to <a href=\"/#\">add a review</a>?</p>";
        }


        // Close the widget in HTML
        echo "</section>";
    }
} 