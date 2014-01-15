<?php
require_once(COREPATH."loader.php");
require_once(VIEWPATH."html/html_header.php");
?>

    <menu>
        <ul>
            <?php
            $nav->newItem("add","Add new","/new");
            $nav->newItem("random","Random","/random");
            $nav->newItem("contact","Contact","http://about.me/jamieshepherd");
            $nav->newItem("github","Developers","http://www.github.com/jamieshepherd/gfind");
            ?>
        </ul>
    </menu>

    <article>
        <h1>Great success!</h1>
        <h2>Everything was sent off successfully</h2>
        <p>Thank you for your contribution to gfind, we really appreciate it. <a href="/">Click here</a> to go back to the homepage. Are you a developer? You might be interested in checking out gfind on <a href="http://www.github.com/jamieshepherd/gfind">Github</a>. We'd love your help!</p>


<?php require_once(VIEWPATH."html/html_end.php"); ?>