<?php
$DB = DB::getInstance();
$releases = $DB->connection->prepare("SELECT * FROM releases WHERE release_authorised=0");
$releases->execute();
$releasesSize = $releases->rowCount();

// Check we actually get some results

?>
<script src="/public/lib/admin_functions.js"></script>
<article>
    <h1>Release dates</h1>
    <h2>There are <?php echo $releasesSize; ?> release dates to review</h2>
    <hr>
    <?php
    if($releasesSize!=0){
    echo "<table border=\"1\">
        <tr class=\"head\">
            <td>ID</td>
            <td>Game</td>
            <td>Region</td>
            <td>Release date</td>
            <td>Status</td>
            <td>Source</td>
            <td>Accept</td>
            <td>Reject</td>
        </tr>";

        for($i=0;$i<$releasesSize;$i++){
            $row = $releases->fetch();

            echo "<tr id=\"item".$row['release_id']."\">";
            echo "<td>".$row['release_id']."</td>";
            echo "<td><a href=\"/game/".$row['game_id']."\">".$row['game_id']."</a></td>";
            echo "<td>".$row['release_region']."</td>";
            echo "<td>".$row['release_date']."</td>";
            echo "<td>".$row['release_status']."</td>";
            echo "<td class=\"source\">".$row['release_source']."</td>";
            echo "<td><a href=\"javascript:release_accept(".$row['release_id'].");\"><input type=\"button\" value=\"Accept\"></a></td>";
            echo "<td><a href=\"javascript:release_reject(".$row['release_id'].");\"><input type=\"button\" value=\"Reject\"></a></td>";
            echo "</tr>";

        }

        echo "</table>";
    }
    ?>

</article>