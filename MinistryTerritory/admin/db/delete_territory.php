<?php 

    require('../../db/db_connect.php');

    $id = mysql_real_escape_string($_POST["id"]);

    if(isset($id)) {
        $delete_territory_query = mysql_query(
        "DELETE FROM `Territory` 
        WHERE `_id` = '$id'") 
        or die("Error deleting territory.". mysql_error());

        // Check if successful
        if ($delete_territory_query === TRUE) {
            
            
            if ($delete_territory_query === TRUE) {
                echo "Territory $id was successfully deleted.";
            }
            
            
        }// IF USER IS SUCCESSFULLY DELETED
        
        else {
             echo "Could not delete territory.";
        }
        
    } // IF USERNAME ISSET
    
    else {
        echo "Territory not found.";
    }

mysql_close($dbc);
    
?>
