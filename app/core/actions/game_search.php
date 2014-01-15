<?php

require_once $_SERVER['DOCUMENT_ROOT']."/app/core/DB.php";

// if the 'term' variable is not sent with the request, exit

if ( !isset($_REQUEST['term']) ){ exit; }
else { $request = $_REQUEST['term']; }

// Prepare and execute our query, get all fields from game where game id = id
$DB = DB::getInstance();
$query = $DB->connection->prepare("SELECT game_id,game_title, game_developer FROM games WHERE game_title LIKE :term LIMIT 5");
$query->execute(array('term' => '%'.$request.'%'));

if($query->rowCount() > 0){
    while ($row = $query->fetch()){
        $data[] = array(
            'value' => $row['game_title'],
            'developer' => $row['game_developer'],
            'id' => $row['game_id']
        );
    }
}

// jQuery wants JSON data
echo json_encode($data);
flush();