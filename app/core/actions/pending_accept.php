<?php

require_once $_SERVER['DOCUMENT_ROOT']."/app/core/DB.php";
$DB = DB::getInstance();
$DB->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$current_id = $_POST['query'];

$statement = $DB->connection->prepare("
    INSERT INTO games (game_title, game_developer, game_publisher, game_genre, game_website, game_content, game_platforms, game_engine, game_video, game_image)
    SELECT pending_title, pending_developer, pending_publisher, pending_genre, pending_website, pending_content, pending_platforms, pending_engine, pending_video, pending_image FROM pending
    WHERE pending_id =:term");

$statement->execute(array('term' => $current_id));

// Move image from temp to games

$imageString = $DB->connection->prepare("SELECT pending_image FROM pending WHERE pending_id =:term");
$imageString -> execute(array('term' => $current_id));
$imageString = $imageString -> fetchColumn();
rename($_SERVER['DOCUMENT_ROOT']."/public/temp/games/".$imageString.".jpg",$_SERVER['DOCUMENT_ROOT']."/public/img/games/".$imageString.".jpg");

// Delete item from pending
$delete = $DB->connection->prepare("DELETE FROM pending WHERE pending_id=:term");
$delete->execute(array('term' => $current_id));