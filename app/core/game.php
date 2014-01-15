<?php
/**
 * The Game object
 */

class Game {
    public $id;
    public $title;
    public $developer;
    public $publisher;
    public $genre;
    public $engine;
    public $platforms;
    public $website;
    public $article;
    public $video;
    public $image;

    private static $thisid;

    public function __construct($id){
        $this->id = $id;
    }

    public function getID(){
        return $this->id;
    }

    public function getGame(){

        // Prepare and execute our query, get all fields from game where game id = id
        $DB = DB::getInstance();
        $query = $DB->connection->prepare("SELECT * FROM games WHERE game_id=:term");
        $query->execute(array('term' => $this->id));

        // Check we actually get some results

        if($query->rowCount() > 0){
            while ($row = $query->fetch()){
                $this->title = $row['game_title'];
                $this->developer = $row['game_developer'];
                $this->publisher = $row['game_publisher'];
                $this->genre = $row['game_genre'];
                $this->engine = $row['game_engine'];
                $this->platforms = $row['game_platforms'];
                $this->website = $row['game_website'];
                $this->article = $row['game_content'];
                $this->video = $row['game_video'];
                $this->image = $row['game_image'];
            }
        } else {
            // Something went wrong, scream at them
            $this->title = "OH FUCK ERROR";
        }
    }

    public function getReviews(){
        $DB = DB::getInstance();
        $reviews = $DB->connection->prepare("SELECT * FROM reviews WHERE game_id=:term");
        $reviews->execute(array('term' => $this->id));

        // Check we actually get some results
        if($reviews->rowCount() > 0){
            while ($row = $reviews->fetch()){
                echo $row['review_short'];
            }
        }
    }

    public function getReleaseDates(){

    }
} 