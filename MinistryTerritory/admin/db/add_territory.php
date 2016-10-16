<?php 

    require('../../db/db_connect.php');


    $id = mysql_real_escape_string($_POST["id"]);
    $territoryName = mysql_real_escape_string($_POST["territoryName"]);
    $owner = mysql_real_escape_string($_POST["owner"]);
    $availablility = 1;

    // Set value for availability depending if owner is supplied or not
    if($owner == "") {
        $availability = 1;
    } else { $availability = 0; }

    
    $add_territory_query = mysql_query(
        "INSERT INTO 
            `Territory`
                (`_id`, `name`, `availability`, `date_taken`, `date_returned`, `taken_by`, `last_owner`, `pending`) 
            VALUES 
                ('$id', '$territoryName', '$availablility', '', '','$owner','','0')") 
        or die("Error adding territory". mysql_error());

    // Check if successful
    if ($add_territory_query === TRUE) {
        echo "Territory $id ($territoryName) was successfully added.";
    } else {
        echo "Could not add user";
    }

    mysql_close($dbc);
?>

