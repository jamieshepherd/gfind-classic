

<script>
$("#search").autocomplete(
        {   source:"/app/core/actions/game_search.php", minLength: 1},
        {   appendTo: "#results"},
        {   autoFocus: true},
        {   select: function(event,ui){window.location = "/game/"+ui.item.id}}
    );
</script>