<?php 
    
        require('db_connect.php');
        
        // Fetch territories with user's name
        // Create a query fetch user data
        $territory_query = mysql_query(
            "SELECT * 
            FROM `Territory` 
            WHERE `availability` = 1 
            ORDER BY _id ASC") 
            or die(mysql_error());
      
      
        $rows = array();
        while($r = mysql_fetch_object($territory_query)) {
            $rows['territory'][] = $r;
        }
      
    header('Content-Type: application/json');
    echo json_encode($rows);
           
    mysql_close($dbc);
    
?>