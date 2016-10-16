<?php 
    
        require('../../db/db_connect.php');
        
        
        // Create a query fetch user data
        $pendint_territories_query = mysql_query(
            "SELECT * 
            FROM `Territory` 
            WHERE `pending` = 1
            ORDER BY date_returned DESC") 
            or die(mysql_error());
      
      
        $rows = array();
        while($r = mysql_fetch_object($pendint_territories_query)) {
            $rows['territories'][] = $r;
        }
      
    header('Content-Type: application/json');
    echo json_encode($rows);
           
    mysql_close($dbc);
    
?>