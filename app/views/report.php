<?php
    require_once(COREPATH."loader.php");
    require_once(VIEWPATH."html/html_header.php");
?>

<menu>
    <ul>
        <?php
            $nav->newItem("add","Add new","/new");
            $nav->newItem("random","Random","/random");
            $nav->newItem("edit","Edit page","/edit/".$game->id);
            $nav->newItem("report","Report","/report");
        ?>
    </ul>
</menu>

<article>
    <h1>Report page</h1>
    <h2><?php echo $game->title ;?></h2>
    <p>Thanks for taking the time to make gfind a better place. Please fill out the short form below to file your report. Please confirm that you are sending a report for the <strong><?php echo $game->title; ?></strong> game page before you submit. Thank you.</p>
    <form action="/app/core/actions/game_add_report.php" method="post">
    <hr>
    <label>Reason for reporting</label>
        <select name="report_type" id="report_type">
            <option value="type_incorrect">Incorrect content</option>
            <option value="type_explicit">Explicit content</option>
            <option value="type_spam">Spam content</option>
            <option value="type_other">Other</option>
        </select>

    <label>Report description</label>
    <textarea rows="20" name="comments" type="text" placeholder="Your comments. Why are you reporting this page? Please enter as much information as possible." data-validation="required"></textarea>
    <input type="text" name="gameref" value="<?php echo $game->id; ?>" class="hidden">

        <hr>
        <input type="submit" value="Submit">

</article>

    <script>
        $.validate({
            borderColorOnError : '#F60',
            errorMessagePosition : 'top',
            scrollToTopOnError : false
        });
    </script>

<?php require_once(VIEWPATH."html/html_end.php"); ?>