<?php 
    
        require('../../db/db_connect.php');
        
        
        // Create a query fetch user data
        $records_query = mysql_query(
            "SELECT * 
            FROM `Records`
            ORDER BY territory, id DESC") 
            or die(mysql_error());
      
      
        $rows = array();
        while($r = mysql_fetch_object($records_query)) {
            $rows['records'][] = $r;
        }
      
    header('Content-Type: application/json');
    echo json_encode($rows);
           
    mysql_close($dbc);
    
?>