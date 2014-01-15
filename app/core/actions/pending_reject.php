<?php

require_once $_SERVER['DOCUMENT_ROOT']."/app/core/DB.php";
$DB = DB::getInstance();
$DB->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$current_id = $_POST['query'];

try{
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

