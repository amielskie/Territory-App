<?php 
    
        require('../../db/db_connect.php');
        
        
        // Create a query fetch user data
        $updates_query = mysql_query(
            "SELECT * 
            FROM `Updates`
            ORDER BY id DESC") 
            or die(mysql_error());
      
      
        $rows = array();
        while($r = mysql_fetch_object($updates_query)) {
            $rows['records'][] = $r;
        }
      
    header('Content-Type: application/json');
    echo json_encode($rows);
           
    mysql_close($dbc);
    
?>