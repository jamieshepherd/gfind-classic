<?php
    require_once(COREPATH."loader.php");
    require_once(VIEWPATH."html/html_header.php");
?>

    <nav>
        <a href="/">
            <img class="gfind_logo" src="/public/img/gfind_logo.png" title="gfind.net">
            <img class="gfind_logo_min" src="/public/img/gfind_logo_min.png" title="gfind.net">
        </a>
        <menu>
            <ul>
                <?php
                $nav->newItem("search32","Search","/search");
                $nav->newItem("plus32","Add new","/new");
                $nav->newItem("glitter32","Random","/game/1");
                $nav->newItem("mail32","Contact","/contact");
                $nav->newItem("boxdownload32","Developers","/developers");
                ?>
            </ul>
        </menu>
    </nav>

    <article>
        <h1>Start your search</h1>
        <h2>Search over 100,000 games</h2>

        <hr>
        <form action ='/search/' method='post'>
            <label>Search by:</label>
            <input type="radio" name="category" value="title" checked>Title
            <input type="radio" name="category" value="publisher">Publisher
            <input type="radio" name="category" value="developer">Developer
            <input type="radio" name="category" value="genre">Publisher
            <input type="text" id="search" autocomplete="off" autofocus="on" placeholder="Type a game title">

            <input type="submit" value="Search">
        </form>
        <hr>
        <ul id="results"></ul>
    </article>

    <aside>
        <section>
            <h2>Getting started</h2>
            <p>Welcome to gfind.net, a game database. Gfind currently hosts information on 100,000 games, and is growing every day. To get started, why not try and search for a game? Just start typing in the search box and results should appear immediately. Or, satisfy your curiosity and get a <a href="/game/1">random</a> game.</p>
        </section>
        <section>
            <h2>Getting involved</h2>
            <p>We're aiming for the biggest game database ever, and you can get involed to make this a reality. <a href="/new">Add a game</a> that you don't see listed here, or edit a game page that already exists. If you're a developer, you can even help us out, we're open source on <a href="http://github.com">github</a>.</p>
        </section>
    </aside>

<?php require_once(VIEWPATH."html/html_end.php"); ?>