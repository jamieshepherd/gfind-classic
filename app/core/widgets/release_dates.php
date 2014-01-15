<?php
/**
 * Created by PhpStorm.
 * User: Jamie
 * Date: 15/11/13
 * Time: 17:23
 */

class Widget_Release_Dates extends Widget {

    public function createWidget($game){
        echo "<a href=\"/release-dates/".$game->id."\" class=\"widget_edit\" title=\"Edit release dates\"></a>";
        // What this widget does

        $DB = DB::getInstance();
        $dates = $DB->connection->prepare('SELECT * FROM releases WHERE release_authorised = 1 AND game_id='.$game->id.' ORDER BY release_date ASC');
        $dates->execute();

        // Check we actually get some results
        if($dates->rowCount() > 0){
            echo "<table>";
            while ($row = $dates->fetch()){
                echo "<tr>";
                echo "<td class=\"region-highlight\">".$row['release_region']."</td>";
                echo "<td><strong>".date("d M Y", strtotime($row['release_date']))."<strong></td>";
                echo "<td>".$row['release_status']."</td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "<p>There are no known release dates for this game. <a href=\"/release-dates/".$game->id."\">Click here</a> to add dates.</p>";
        }

        // Close the widget in HTML
        echo "</section>";
    }

} 