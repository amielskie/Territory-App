<?php 

    require('../../db/db_connect.php');

  
        $delete_updates_query = mysql_query(
        "TRUNCATE TABLE Updates") 
        or die("Error deleting updates. ". mysql_error());

        // Check if successful
        if ($delete_updates_query === TRUE) {
            
             echo "All updates were deleted.";
        
        }// IF USER IS SUCCESSFULLY DELETED
        
        else {
             echo "Could not delete updates.";
        }
        

mysql_close($dbc);
    
?>
