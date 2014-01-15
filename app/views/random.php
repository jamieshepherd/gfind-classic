<?php

require_once(COREPATH."loader.php");

// Get the number of rows in the table
$DB = DB::getInstance();
$count = $DB->connection->prepare("SELECT COUNT(game_id) FROM games");
$count->execute();
$count = $count->fetchColumn();

// Make a random row, check if it's in the database, if not repeat
do {
    $rnd = rand(1,$count);
    $query = $DB->connection->prepare("SELECT * FROM games WHERE game_id=:term");
    $query->execute(array('term' => $rnd));
    $rowCount = $query->rowCount();
} while ($rowCount < 1);

// Send the user to the random game
header("Location: /game/".$rnd);