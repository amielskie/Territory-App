<?php 

    require('db_connect.php');

    $username = mysql_real_escape_string($_POST["username"]);
    $comment = mysql_real_escape_string($_POST["comment"]);
    $territory = mysql_real_escape_string($_POST["territory"]);
   

    $add_comment_query = mysql_query(
        "INSERT INTO `Updates` 
            (`message`, `date`, `type`) 
        VALUES 
            ('$username posted a COMMENT for TERRITORY $territory : $comment ', current_date(), '2')") 
        or die("Error adding comment". mysql_error());

    // Check if successful
    if ($add_comment_query === TRUE) {
        echo "Comment was successfully added.";
    } else {
        echo "Could not add comment";
    }

    mysql_close($dbc);
?>

