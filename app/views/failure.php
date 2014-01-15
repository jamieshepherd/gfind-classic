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
        <h1>We're really sorry</h1>
        <h2>Something went wrong</h2>
        <p>This is probably our fault, we're sorry. If you care enough to help us try and fix it, we'd love to know what happened. Chances are we broke something and are working on it already, but <a href="/failure">we'd appreciate an email</a>.</p>


<?php require_once(VIEWPATH."html/html_end.php"); ?>