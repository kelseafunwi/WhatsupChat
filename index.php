<?php

    session_start();

    // redirecting to the login page if the user session does not exist
    if ( !isset($_SESSION['whatsupchat_user_id']) ) {
        // redirect the user to login page if they did not sign in
        header("Location: ./views/login.php");
        exit;
    } else {
        header("Location: views/chatpage.php");
        exit;
    }
    
?>