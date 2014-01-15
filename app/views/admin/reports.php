<?php
$DB = DB::getInstance();
$reports = $DB->connection->prepare("SELECT * FROM reports");
$reports->execute();
$reportsSize = $reports->rowCount();

// Check we actually get some results

?>
<script src="/public/lib/admin_functions.js"></script>
<article>
    <h1>Reports</h1>
    <h2>There are <?php echo $reportsSize; ?> reports to review</h2>
    <hr>

    <?php

    for($i=0;$i<$reportsSize;$i++){
        $row = $reports->fetch();
        echo "<div class=\"pending_item\" id=\"item".$row['report_id']."\">";
        echo "<a href=\"javascript:report_clear(".$row['report_id'].");\"><input type=\"button\" value=\"Clear\"></a>";
        echo "<h3>".$row['report_type']."</h3>";
        echo "<p><strong><a href=\"/game/".$row['report_game']."\">(Game ID: ".$row['report_game'].")</a></strong></p>";

        echo "  <p>".$row['report_comments']."</p>";
        echo "</div>\n\n";
    }