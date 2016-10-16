<?php 

    require('../../db/db_connect.php');

    $id = mysql_real_escape_string($_POST["id"]);

    if(isset($id)) {
        $update_territory_query = mysql_query(
            "UPDATE 
                `Territory` 
            SET 
                `availability`=1,
                `date_taken`='NULL',
                `date_returned`='NULL',
                `taken_by`='',
                `pending`= 0 
            WHERE 
            `_id` = '$id'") 
            or die("Error updating territory". mysql_error());

        // Check if successful
        if ($update_territory_query === TRUE) {
                echo "Territory $id is now available.";      
            
        }// IF USER IS SUCCESSFULLY DELETED
        
        else {
                echo "Could not delete user.";
            }
    } // IF ID ISSET
    
    else {
        echo "Territory not found.";
    }

mysql_close($dbc);
    
?>
