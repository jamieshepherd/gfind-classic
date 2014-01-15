<?php

require_once $_SERVER['DOCUMENT_ROOT']."/app/core/DB.php";
$DB = DB::getInstance();
$DB->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if(empty($_POST['gameref']) || empty($_POST['report_type']) || empty($_POST['comments'])){
    echo "Form not submitted correctly<br>";

    if (empty($_POST['gameref'])){
        echo "Game reference not passed<br>";
    }
    if (empty($_POST['report_type'])){
        echo "Report type is empty<br>";
    }
    if (empty($_POST['comments'])){
        echo "Report comments is empty<br>";
    }
    exit();
} else {

    /*
     * Game reference
     */

    $report_game = $_POST['gameref'];

    /*
     * Report type
     */

    $report_type = $_POST['report_type'];

    /*
     * Report comments
     */

    $report_comments = $_POST['comments'];

    /*
     * DATABASE - Insert statement
     */

    $insert = $DB->connection->prepare("
        INSERT INTO reports(report_game, report_type, report_comments)
        VALUES(:report_game, :report_type, :report_comments)
        ");

    // Bind parameters

    $insert->bindParam(':report_game',$report_game,PDO::PARAM_STR);
    $insert->bindParam(':report_type',$report_type,PDO::PARAM_STR);
    $insert->bindParam(':report_comments',$report_comments,PDO::PARAM_STR);

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
