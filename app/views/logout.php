<?php

session_start();
// Simply, if we have a session of someone, destroy it

if(isset($_SESSION['sess_user_id'])){
    unset($_SESSION['sess_user_id']);
    session_destroy();
    header("Location: /admin");
} else {
    echo "No session";
}