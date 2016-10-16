<?php 

    require('../../db/db_connect.php');

    $territoryId = mysql_real_escape_string($_POST["territory"]);
    $viaId = mysql_real_escape_string($_POST["id"]);

  
        $delete_address_query = mysql_query(
        "DELETE FROM `$territoryId` 
        WHERE `id` = '$viaId'") 
        or die("Error deleting address.". mysql_error());

        // Check if successful
        if ($delete_address_query === TRUE) {
            
            
            if ($delete_address_query === TRUE) {
                echo "Address was successfully deleted.";
            }
            
            
        }// IF USER IS SUCCESSFULLY DELETED
        
        else {
             echo "Could not delete territory.";
        }
  
mysql_close($dbc);
    
?>
