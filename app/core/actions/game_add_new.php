<?php

require_once $_SERVER['DOCUMENT_ROOT']."/app/core/DB.php";
$DB = DB::getInstance();
$DB->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if(empty($_POST['title']) || empty($_POST['developer']) || empty($_POST['publisher']) || empty($_POST['genre']) || empty($_POST['platform']) || empty($_POST['description'])){
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
     * Image - Create a random image string to identify our image with, check the games + pending table that it doesn't exist
     */


    $avail = false;
    while($avail == false){
        $imageString = base_convert(rand(1,100000000),10,36);
        $query = $DB->connection->prepare("SELECT game_image FROM games WHERE game_image=:term");
        $query->execute(array('term' => $imageString));
        if($query->rowCount() == 0){
            $query = $DB->connection->prepare("SELECT pending_image FROM pending WHERE pending_image=:term");
            $query->execute(array('term' => $imageString));
            if($query->rowCount() == 0){
                $avail = true;
            }
        }
    }



    /*
     * -------------------------- File upload once the entry has been created --------------------------
     */

    $ext = pathinfo($_FILES['gameimage']['name'], PATHINFO_EXTENSION);
    $uploaddir = $_SERVER['DOCUMENT_ROOT']."/public/temp/games/";
    $uploadfile = $uploaddir . $imageString.".".$ext;


    if (move_uploaded_file($_FILES['gameimage']['tmp_name'], $uploadfile)) {
        $imageUploadStatus = true;

        $imgSize = getimagesize($_SERVER['DOCUMENT_ROOT']."/public/temp/games/".$imageString.".jpg");

        if($imgSize[0] != 1024 && $imgSize[1] != 300){
            header('Location: /failure');
            unlink($_SERVER['DOCUMENT_ROOT']."/public/temp/games/".$imageString.".jpg");
            exit();
        }

    } else {
        $imageUploadStatus = false;
        $errors = true;
        header('Location: /failure');
        exit();
    }





    /*
     * DATABASE - Insert statement
     */

    $insert = $DB->connection->prepare("
        INSERT INTO pending(pending_title, pending_developer, pending_publisher, pending_genre, pending_platforms, pending_engine, pending_website, pending_content, pending_video, pending_image, pending_type)
        VALUES(:game_title, :game_developer, :game_publisher, :game_genre, :game_platforms, :game_engine, :game_website, :game_content, :game_video, :game_image, 'new')
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
    $insert->bindParam(':game_image',$imageString,PDO::PARAM_STR);

    // Execute

    if($imageUploadStatus==true){
        try{
            $insert->execute();
            $errors = false;
        } catch(Exception $e){
            $errors = true;

        }
    }
    if($errors == false){
        header('Location: /success');
    } else {
        header('Location: /failure');
    }
}