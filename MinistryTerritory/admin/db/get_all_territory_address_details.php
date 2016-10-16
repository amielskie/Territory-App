<?php 
    
        /** GET ALL TERRITORY ADDRESS DETAILS */

        require('../../db/db_connect.php');

        $id = mysql_real_escape_string($_GET["territory"]);

        // Create a query fetch territory data
        $territory_query = mysql_query(
            "SELECT * 
            FROM `$id` 
            ORDER BY 'id' ASC") 
            or die(mysql_error());
      
      
        $rows = array();
        while($r = mysql_fetch_object($territory_query)) {
            $rows['territories'][] = $r;
        }
      
        header('Content-Type: application/json');
        echo json_encode($rows);
        
        mysql_close($dbc);
    
?>