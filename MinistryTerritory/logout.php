<?php 

    session_start();
    
    // Log out and unset sessions if user is logged in
     if (isset($_SESSION['logged_in']) || $_SESSION['logged_in'] == true) {
                $_SESSION['logged_in'] = false;
                // Remove all sessions
                session_unset();
                //Redirects to main page
                header("Location: index.php");
        }

    header("Location: index.php");
?>