<?php

require_once $_SERVER['DOCUMENT_ROOT']."/app/core/DB.php";
$DB = DB::getInstance();
$DB->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if(empty($_POST['title']) || empty($_POST['developer']) || empty($_POST['publisher']) || empty($_POST['genre']) || empty($_POST['platform']) || empty($_POST['description']) || empty($_POST['game_id'])){
    echo "No data sent";
    exit();
} else {

    /*
     * Title
     */

    $game_title = $_POST['title'];

    /*
     * Developer
     */

    $game_developer = $_POST['developer'];

    /*
     * Publisher
     */

    $game_publisher = $_POST['publisher'];

    /*
     * Genre
     */
    $game_genre = "";
    $genre = $_POST['genre'];
    $i = 0;
    while($i < count($genre)){
        $game_genre .= $genre[$i];
        $i++;
        if($i != count($genre)){
            $game_genre .= ", ";
        }
    }

    /*
     * Platform
     */
    $game_platforms = "";
    $platforms = $_POST['platform'];
    $i = 0;
    while($i < count($platforms)){
        $game_platforms .= $platforms[$i];
        $i++;
        if($i != count($platforms)){
            $game_platforms .= ", ";
        }
    }

    /*
     * Engine
     */

    if(isset($_POST['engine'])){
        $game_engine = $_POST['engine'];
    } else {
        $game_engine = NULL;
    }

    /*
     * Website
     */

    if(isset($_POST['website'])){
        $game_website = $_POST['website'];
    } else {
        $game_website = NULL;
    }

    /*
     * Content
     */

    $game_content = $_POST['description'];

    /*
     * Video
     */

    if(isset($_POST['video'])){
        $game_video = $_POST['video'];
    } else {
        $game_video = NULL;
    }

    /*
     * Game reference
     */

    $game_ref = $_POST['game_id'];

    /*
     * DATABASE - Insert statement
     */

    $insert = $DB->connection->prepare("
        INSERT INTO pending(pending_title, pending_developer, pending_publisher, pending_genre, pending_platforms, pending_engine, pending_website, pending_content, pending_video, game_ref, pending_type)
        VALUES(:game_title, :game_developer, :game_publisher, :game_genre, :game_platforms, :game_engine, :game_website, :game_content, :game_video, :game_ref, 'edit')
        ");

    // Bind parameters

    $insert->bindParam(':game_title',$game_title,PDO::PARAM_STR);
    $insert->bindParam(':game_developer',$game_developer,PDO::PARAM_STR);
    $insert->bindParam(':game_publisher',$game_publisher,PDO::PARAM_STR);
    $insert->bindParam(':game_genre',$game_genre,PDO::PARAM_STR);
    $insert->bindParam(':game_platforms',$game_platforms,PDO::PARAM_STR);
    $insert->bindParam(':game_engine',$game_engine,PDO::PARAM_STR);
    $insert->bindParam(':game_website',$game_website,PDO::PARAM_STR);
    $insert->bindParam(':game_content',$game_content,PDO::PARAM_STR);
    $insert->bindParam(':game_video',$game_video,PDO::PARAM_STR);
    $insert->bindParam(':game_ref',$game_ref,PDO::PARAM_INT);

    // Execute

    try {
        $insert->execute();
        $errors = false;
    } catch(Exception $e){
        $errors = true;
        echo $e;
    }

    if($errors == false){
        header('Location: /success');
    } else {
        header('Location: /failure');
    }

}