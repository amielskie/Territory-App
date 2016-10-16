<?php 
    
        require('../../db/db_connect.php');
        
        // Create a query fetch territory data
        $territory_query = mysql_query(
            "SELECT * FROM `Territory`
            ORDER BY _id ASC") 
            or die(mysql_error());
      
      
        $rows = array();
        while($r = mysql_fetch_object($territory_query)) {
            $rows['territories'][] = $r;
        }
      
    header('Content-Type: application/json');
    echo json_encode($rows);
           
    mysql_close($dbc);
    
?>