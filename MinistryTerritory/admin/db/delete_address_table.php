
<?php 

    require('../../db/db_connect.php');


    // Territory number to be deleted (Name of Table)
    $territoryNumber = mysql_real_escape_string($_POST["territory"]);

    deleteAllTerritoryAddress($territoryNumber);
    
    // Delete territory address table
    function deleteAllTerritoryAddress($territoryNumber) {
       
            $delete_table_query = mysql_query(
            "DROP TABLE `$territoryNumber`") 
            or die("Error creating territory address table.". mysql_error());
        
            if($delete_table_query == true) {
                echo "$territoryNumber was deleted successfully.";
            }
            else {
                echo "Error deleting territory address table.";
            }
    }
 mysql_close($dbc);

?>
