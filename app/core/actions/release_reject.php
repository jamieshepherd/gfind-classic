<?php

require_once $_SERVER['DOCUMENT_ROOT']."/app/core/DB.php";
$DB = DB::getInstance();
$DB->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$current_id = $_POST['query'];

// delete
$delete = $DB->connection->prepare("DELETE FROM releases WHERE release_id=:term");
$delete->execute(array('term' => $current_id));