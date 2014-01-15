
<script>
    $("#search").autocomplete(
        {   source:"/app/core/actions/game_search.php", minLength: 1},
        {   appendTo: "#results"},
        {   autoFocus: true},
        {   select: function(event,ui){window.location = "/game/"+ui.item.id}}
    );

    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-47143242-1', 'gfind.net');
    ga('send', 'pageview');

</script>

</body>
</html>