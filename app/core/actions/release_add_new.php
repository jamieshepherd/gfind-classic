<?php

require_once $_SERVER['DOCUMENT_ROOT']."/app/core/DB.php";
$DB = DB::getInstance();
$DB->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if(empty($_POST['game_id']) || empty($_POST['release_region']) || empty($_POST['release_date']) || empty($_POST['release_status']) || empty($_POST['release_source'])){
    echo "No data sent";
    exit();
} else {

    /*
     * Game ID
     */

    $release_game = $_POST['game_id'];

    /*
     * Region
     */

    $release_region = $_POST['release_region'];

    /*
     * Date
     */

    $release_date = $_POST['release_date'];

    /*
     * Status
     */

    $release_status = $_POST['release_status'];

    /*
     * Source
     */

    $release_source = $_POST['release_source'];


    /*
     * DATABASE - Insert statement
     */

    $insert = $DB->connection->prepare("
        INSERT INTO releases(game_id, release_region, release_date, release_status, release_source)
        VALUES(:game_id, :release_region, :release_date, :release_status, :release_source)
        ");

    // Bind parameters

    $insert->bindParam(':game_id',$release_game,PDO::PARAM_STR);
    $insert->bindParam(':release_region',$release_region,PDO::PARAM_STR);
    $insert->bindParam(':release_date',$release_date,PDO::PARAM_STR);
    $insert->bindParam(':release_status',$release_status,PDO::PARAM_STR);
    $insert->bindParam(':release_source',$release_source,PDO::PARAM_STR);

    // Execute

    try{
        $insert->execute();
        $errors = false;
    } catch(Exception $e){
        $errors = true;
    }

    if($errors == false){
        header('Location: /success');
    } else {
        header('Location: /failure');
    }
}