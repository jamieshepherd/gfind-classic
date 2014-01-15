<?php

$pageTitle = "A game database";

if(isset($viewType)){
    if($viewType=="game" || $viewType=="edit" || $viewType=="report" || $viewType=="release-dates"){
        // Check we have a game id
        $gameid = 1;
        if(isset($_GET['id'])){
            $gameid = $_GET['id'];
        } else {
            echo "This is not a valid game id (eventually forward this to a page)";
        }

        // Construct a new game object with the game_id as the attribute
        $game = new Game($gameid);
        $game->getGame();
    }

    // Page title
    switch ($viewType){
        case "game":
            $pageTitle = $game->title;
            break;
        case "edit":
            $pageTitle = "(Edit) ".$game->title;
            break;
        case "report":
            $pageTitle = "(Report) ".$game->title;
            break;
        case "report":
            $pageTitle = "(Release Dates) ".$game->title;
            break;
    }
}

// We always have a menu
$nav = new Menu();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>gfind.net - <?php echo $pageTitle; ?></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/normalize/2.1.3/normalize.min.css" type="text/css">
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Merriweather+Sans:400,700|Merriweather:400,400italic,700,700italic" type="text/css">
    <link rel="stylesheet" href="/public/css/style.css">
    <?php
        if(isset($viewType)){
            if($viewType=="home") {
                echo "<link rel=\"stylesheet\" href=\"/public/css/home.css\">";
            }
            if($viewType=="new" || $viewType=="edit" || $viewType=="report" || $viewType=="release-dates"){
                echo "<link rel=\"stylesheet\" href=\"/public/css/forms.css\">";
            }
            if($viewType=="admin"){
                echo "<link rel=\"stylesheet\" href=\"/public/css/admin.css\">";
            }
        }
    ?>

    <!--[if lt IE 9]>
    <script type="text/javascript" src="///cdnjs.cloudflare.com/ajax/libs/html5shiv/r29/html5.min.js"></script>
    <![endif]-->
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.1.27/jquery.form-validator.min.js"></script>
</head>

<body>

<header>
    <a href="/" class="gfind_logo_min"></a>
        <label>Find</label>
        <input type="text" id="search" autocomplete="off" autofocus="on" placeholder="Type a game title">
        <input type="submit" value="Search">

        <ul id="results"></ul>
    </form>

</header>