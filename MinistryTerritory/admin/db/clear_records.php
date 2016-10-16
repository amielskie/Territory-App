<?php 

    require('../../db/db_connect.php');

  
        $delete_records_query = mysql_query(
        "TRUNCATE TABLE Records") 
        or die("Error deleting records. ". mysql_error());

        // Check if successful
        if ($delete_records_query === TRUE) {
            
             echo "All records were deleted.";
        
        }// IF USER IS SUCCESSFULLY DELETED
        
        else {
             echo "Could not delete records.";
        }
        

mysql_close($dbc);
    
?>
