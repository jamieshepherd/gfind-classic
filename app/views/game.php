<?php
    require_once(COREPATH."loader.php");
    require_once(VIEWPATH."html/html_header.php");
?>


    <script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
    <script type="text/javascript">stLight.options({publisher: "ur-7f0addd2-42ef-bb6d-ae47-cd90c73dd096", doNotHash: false, doNotCopy: false, hashAddressBar: false});</script>

<menu>
    <ul>
        <?php
            $nav->newItem("add","Add new","/new");
            $nav->newItem("random","Random","/random");
            $nav->newItem("edit","Edit page","/edit/".$game->id);
            $nav->newItem("report","Report","/report/".$game->id);
        ?>
    </ul>
</menu>


<article>
    <h1><?php echo $game->title; ?></h1>
    <h2><?php echo $game->developer; ?></h2>
    <hr>
    <img src="/public/img/games/<?php echo $game->image; ?>.jpg" width="100%" height="100%">
    <hr>
    <pre><?php echo $game->article; ?></pre>
    <hr>

    <div id="disqus_thread"></div>
        <script type="text/javascript">
            /* * * CONFIGURATION VARIABLES: EDIT BEFORE PASTING INTO YOUR WEBPAGE * * */
            var disqus_shortname = 'gfind';

            /* * * DON'T EDIT BELOW THIS LINE * * */
            (function() {
                var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
                dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
                (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
            })();
        </script>
        <noscript>Please enable JavaScript to view the <a href="http://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
</article>



<aside>
    <?php
        // Widget:: Information
        $wdgt_information = new Widget_Information("Information");
        $wdgt_information -> createWidget($game);
        // Widget:: Release dates
        $wdgt_release_date = new Widget_Release_Dates("Release dates");
        $wdgt_release_date -> createWidget($game);
        // Widget:: Media
        $wdgt_media = new Widget_Media("Media");
        $wdgt_media -> createWidget($game);
        // Widget:: Reviews - RE-ADD THIS POST 1.0
        //$wdgt_reviews = new Widget_Reviews("Reviews");
        //$wdgt_reviews -> createWidget($game);
        // Social widget?
        $wdgt_share = new Widget_Share("Share");
        $wdgt_share -> createWidget($game);
        // Twitter widget?
        // Amazon buy widget?
    ?>
</aside>

<?php require_once(VIEWPATH."html/html_end.php"); ?>