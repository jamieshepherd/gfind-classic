<?php
/**
 * Created by PhpStorm.
 * User: Jamie
 * Date: 15/11/13
 * Time: 14:03
 */

// Include any widgets we MIGHT want to use
include_once COREPATH . 'widgets/information.php';
include_once COREPATH . 'widgets/release_dates.php';
include_once COREPATH . 'widgets/reviews.php';
include_once COREPATH . 'widgets/media.php';
include_once COREPATH . 'widgets/getting_started.php';
include_once COREPATH . 'widgets/social_share.php';
include_once COREPATH . 'widgets/twitter_activity.php';

class Widget {

    public $name;

    public function __construct($name){
        $this->name = $name;

        // This will be in every widget
        echo "\n\n<section>";
        echo "<h2>".$this->name."</h2>";
    }

}