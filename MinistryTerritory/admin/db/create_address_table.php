
<?php 

    require('../../db/db_connect.php');


    // Territory number to be deleted (Name of Table)
    $territoryNumber = mysql_real_escape_string($_POST["territory"]);

    createAddressTable($territoryNumber);

    function createAddressTable($territoryNumber) {
        
            $create_table_query = mysql_query(
            "CREATE TABLE `$territoryNumber` 
                ( `id` INT(25) NOT NULL AUTO_INCREMENT , 
                  `via` VARCHAR(30) NOT NULL , 
                  `intercom` VARCHAR(25) NOT NULL , 
                  `comment` VARCHAR(100) NOT NULL , 
                  PRIMARY KEY (`id`)
            )") 
            or die("Error creating territory address table.". mysql_error());
        
            if($create_table_query == true) {
                echo "$territoryNumber was added successfully.";
            }
            else {
                echo "Error creating territory address table. ";
            }
    }
    
 mysql_close($dbc);

?>
