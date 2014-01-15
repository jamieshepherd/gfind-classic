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

<main>
    <div class="introduction">
        <img src="/public/img/start-here.png" class="start-here">
        <h1>Welcome to gfind</h1>
        <h2>a game database</h2>
        <br><a href="/new">Add a game</a> - <a href="/random">Random game</a> - <a href="http://about.me/jamieshepherd">Who made this?</a>
    </div>

    <section>
        <h2>Get started</h2>
        <br><img src="/public/img/games/7rmlc.jpg">
        <p>Welcome to gfind.net, a game database. Gfind hosts information on a ton of games, and is growing every day. To get started, why not try and search for a game? Just start typing in the search box and results should appear immediately. Or, satisfy your curiosity and get a <a href="/random">random</a> game.</p>
    </section>

    <section class="middle">
        <h2>Get involved</h2>
        <br><img src="/public/img/games/7u72o.jpg">
        <p>We're aiming for the biggest game database ever, and you can get involed to make this a reality. <a href="/new">Add a game</a> that you don't see listed here, or edit a game page that already exists. If you're a developer, you can also help us out, we're open source on <a href="http://github.com/jamieshepherd/gfind">github</a>.</p>
    </section>

    <section>
        <h2>Get talking</h2>
        <br><img src="/public/img/games/1ky0im.jpg">
        <p>We've enabled comments on all of the game pages, to encourage you to discuss your favourite games, strategies, levels and get involved in the community. Share game hubs on <a target="_blank" href="http://www.facebook.com/sharer/sharer.php?u=gfind.net">Facebook</a> and <a href="http://www.twitter.com/share?text=Check out gfind, a game database!&hashtags=gaming&url=http://www.gfind.net/">Twitter</a> too. Help us grow gfind into a truly massive game database.</p>
    </section>


</main>




<?php require_once(VIEWPATH."html/html_end.php"); ?>