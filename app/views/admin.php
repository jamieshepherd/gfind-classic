<?php
require_once(COREPATH."loader.php");
require_once(VIEWPATH."html/html_header.php");

session_start();

if(isset($_GET['id'])){
    $adminType = $_GET['id'];
} else {
    $adminType = null;
}

// Check if we're logged in as admin
$admin = false;

if(isset($_SESSION['sess_user_id'])){
    $admin = true;
}
?>



    <menu>
        <ul>
            <?php

            if($admin == true){
                $nav->newItem("admin","Admin","/admin");
                $nav->newItem("pending","Pending Games","/admin/pending");
                $nav->newItem("updates","Pending Updates","/admin/edits");
                $nav->newItem("report","Reports","/admin/reports");
                $nav->newItem("releases","Releases","/admin/releases");
                $nav->newItem("reviews","Reviews","/admin/reviews");
                $nav->newItem("signout","Sign out","/logout");
            } else {
                $nav->newItem("add","Add new","/new");
                $nav->newItem("random","Random","/random");
                $nav->newItem("contact","Contact","http://about.me/jamieshepherd");
                $nav->newItem("github","Developers","http://www.github.com/jamieshepherd/gfind");
            }
            ?>
        </ul>
    </menu>

    <?php
        switch($adminType){
            case "pending":
                include_once(VIEWPATH."admin/pending.php");
                break;
            case "edits":
                include_once(VIEWPATH."admin/edits.php");
                break;
            case "reports":
                include_once(VIEWPATH."admin/reports.php");
                break;
            case "releases":
                include_once(VIEWPATH."admin/releases.php");
                break;
            default:
                echo "<article>";
                echo "<h1>Welcome</h1>";
                if($admin == false){
                    echo "<h2>Please log in below.</h2>";
                    include_once(VIEWPATH . "html/login_form.html");
                } else {
                    echo "<h2>You are logged in</h2>";
                    echo "<p>Welcome <strong>".$_SESSION['sess_username']."</strong>. You are logged in successfully.</p><p> Please use any of the admin options available to you on the left.</p>";
                }
        }
    ?>


<?php require_once(VIEWPATH."html/html_end.php"); ?>