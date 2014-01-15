<?php

require_once $_SERVER['DOCUMENT_ROOT']."/app/core/DB.php";
$DB = DB::getInstance();
$DB->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$current_id = $_POST['query'];

$statement = $DB->connection->prepare("
    UPDATE releases
    SET release_authorised=1
    WHERE release_id =:term");

$statement->execute(array('term' => $current_id));