<?php
    require_once(COREPATH."loader.php");
    require_once(VIEWPATH."html/html_header.php");

    $DB = DB::getInstance();
    $dates = $DB->connection->prepare('SELECT * FROM releases WHERE release_authorised = 1 AND game_id='.$game->id.' ORDER BY release_date ASC');
    $dates->execute();
?>

<menu>
    <ul>
        <?php
        $nav->newItem("game","Game page","/game/".$game->id);
        $nav->newItem("edit","Edit page","/edit/".$game->id);
        $nav->newItem("random","Random","/random");
        $nav->newItem("contact","Contact","http://about.me/jamieshepherd");
        $nav->newItem("github","Developers","http://www.github.com/jamieshepherd/gfind");
        ?>
    </ul>
</menu>

<article>
    <h1>Release dates</h1>
    <h2><?php echo $game->title ;?></h2>
    <p>Here are a list of the current release dates for <strong><?php echo $game->title; ?></strong>. If you would like to add new release dates for this game, please complete the form below.</p>
    <?php

    if($dates->rowCount() > 0){
        echo "<hr><table>";
        echo "<tr class=\"head\"><td>Region</td><td>Date</td><td>Status</td></tr>";
        while ($row = $dates->fetch()){
            echo "<tr>";
            echo "<td class=\"region-highlight\">".$row['release_region']."</td>";
            echo "<td><strong>".date("d M Y", strtotime($row['release_date']))."<strong></td>";
            echo "<td>".$row['release_status']."</td>";
            echo "</tr>";
        }
        echo "</table>";
    }

    ?>
    <hr>
    <form action="/app/core/actions/release_add_new.php" method="post" >
        <label>Game title</label>
        <input type="text" name="game_title" value="<?php echo $game->title; ?>" disabled>
        <input type="text" name="game_id" value="<?php echo $game->id; ?>" class="hidden">
        <label>Release region (e.g. EU or NA or WW worldwide)</label>
        <input type="text" maxlength="3" name="release_region" class="shortinput">
        <input type="date" name="release_date" class="medinput">
        <select name="release_status" id="release_status">
            <option value="Tentative">Tentative</option>
            <option value="Confirmed">Confirmed</option>
        </select>
        <label>Source (Where can this release date be confirmed)</label>
        <input type="text" name="release_source">
    <hr>
    <input type="submit" value="Submit">
    </form>

</article>

    <script>
        $.validate({
            borderColorOnError : '#F60',
            errorMessagePosition : 'top',
            scrollToTopOnError : false
        });
    </script>

<?php require_once(VIEWPATH."html/html_end.php"); ?>