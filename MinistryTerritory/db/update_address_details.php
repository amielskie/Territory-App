<?php 

    require('db_connect.php');

    $territory = mysql_real_escape_string($_POST["territoryID"]);
    $id = mysql_real_escape_string($_POST["viaId"]);
    $via = mysql_real_escape_string($_POST["via"]);
    $intercom = mysql_real_escape_string($_POST["intercom"]);
    $comment = mysql_real_escape_string($_POST["comment"]);
    
    $update_address_query = mysql_query(
        "UPDATE `$territory` 
        SET 
        `via` = '$via',
        `intercom` = '$intercom', 
        `comment` = '$comment' 
        WHERE `$territory`.`id` = '$id'") 
        or die("Error updating new address. ". mysql_error());

    $update_notif_query = mysql_query(
        "INSERT INTO `Updates` 
            (`message`, `date`, `type`) 
        VALUES 
            ('$via, INTERCOM - $intercom of TERRITORY $territory has been updated: $comment', current_date(), '1')") 
        or die("Error updating new address. ". mysql_error());

    // Check if successful
    if ($update_address_query === TRUE) {
        echo "$via was successfully updated. ";
    } else {
        echo "Could not update address. ";
    }

    mysql_close($dbc);
?>

