<?php
$DB = DB::getInstance();
$pending = $DB->connection->prepare("SELECT * FROM pending WHERE pending_type='new'");
$pending->execute();
$pendingSize = $pending->rowCount();

// Check we actually get some results

?>
<script src="/public/lib/admin_functions.js"></script>
<article>
    <h1>Pending Games</h1>
    <h2>There are <?php echo $pendingSize; ?> pending items to review</h2>
    <hr>

    <?php

    for($i=0;$i<$pendingSize;$i++){
        $row = $pending->fetch();
        echo "<div class=\"pending_item\" id=\"item".$row['pending_id']."\">";
        echo "<h3>".$row['pending_title']."</h3>";
        echo "<a href=\"javascript:reject_pending(".$row['pending_id'].");\"><input type=\"button\" value=\"Reject\"></a>";
        echo "<a href=\"javascript:accept_pending(".$row['pending_id'].");\"><input type=\"button\" value=\"Accept\"></a>";
        echo "<img src=\"/public/temp/games/".$row['pending_image'].".jpg\" width=\"700\" height=\"200\">";
        echo "  <ul>";
        echo "  <li><strong>Title: </strong>".$row['pending_title']."</li>";
        echo "  <li><strong>Developer: </strong>".$row['pending_developer']."</li>";
        echo "  <li><strong>Publisher: </strong>".$row['pending_publisher']."</li>";
        echo "  <li><strong>Genre: </strong>".$row['pending_genre']."</li>";
        echo "  <li><strong>Platforms: </strong>".$row['pending_platforms']."</li>";
        echo "  <li><strong>Engine: </strong>".$row['pending_engine']."</li>";
        echo "  <li><strong>Website: </strong>".$row['pending_website']."</li>";
        echo "  <li><strong>Video: </strong>".$row['pending_video']."</li>";
        echo "  </ul>";
        echo "  <p>".$row['pending_content']."</p>";
        echo "</div>\n\n";
    }