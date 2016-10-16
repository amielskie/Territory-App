<?php 

    require('../../db/db_connect.php');

    $territory = mysql_real_escape_string($_POST["territoryID"]);
    $via = mysql_real_escape_string($_POST["via"]);
    $intercom = mysql_real_escape_string($_POST["intercom"]);
    $comment = mysql_real_escape_string($_POST["comment"]);
    
    $add_address_query = mysql_query(
        "INSERT INTO `$territory` 
            (`via`, `intercom`, `comment`) VALUES ('$via', '$intercom', '$comment')") 
        or die("Error adding new address. ". mysql_error());

    // Check if successful
    if ($add_address_query === TRUE) {
        echo "$via was successfully added. ";
    } else {
        echo "Could not add address. ";
    }

    mysql_close($dbc);
?>

