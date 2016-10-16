<?php 

    require('../../db/db_connect.php');

    $title = mysql_real_escape_string($_POST["title"]);
    $message = mysql_real_escape_string($_POST["message"]);
    
    
    $add_announcement_query = mysql_query(
        "INSERT INTO `Announcements` 
            (`title`, `message`, `date`) 
        VALUES 
            ('$title', '$message', current_date())") 
        or die("Error adding new address. ". mysql_error());

    // Check if successful
    if ($add_announcement_query === TRUE) {
        echo "Announcement was successfully posted. ";
    } else {
        echo "Could not add address. ";
    }

    mysql_close($dbc);
?>

