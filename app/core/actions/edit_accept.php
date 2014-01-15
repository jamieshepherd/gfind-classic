<?php

require_once $_SERVER['DOCUMENT_ROOT']."/app/core/DB.php";
$DB = DB::getInstance();
$DB->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$current_id = $_POST['query'];

$statement = $DB->connection->prepare("
    UPDATE games, pending
    SET games.game_title = pending.pending_title,
        games.game_developer = pending.pending_developer,
        games.game_publisher = pending.pending_publisher,
        games.game_genre = pending.pending_genre,
        games.game_platforms = pending.pending_platforms,
        games.game_engine = pending.pending_engine,
        games.game_website = pending.pending_website,
        games.game_video = pending.pending_video,
        games.game_content = pending.pending_content
    WHERE games.game_id = pending.game_ref");

try{
    $statement->execute(array('term' => $current_id));

    // Delete item from pending
    $delete = $DB->connection->prepare("DELETE FROM pending WHERE pending_id=:term");
    $delete->execute(array('term' => $current_id));
} catch(Exception $e){
    $errors = true;
    echo $e;
}

if($errors == false){
    header('Location: /success');
} else {
    header('Location: /failure');
}