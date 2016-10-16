<?php 
    
        require('../../db/db_connect.php');
        
        // Fetch territories with user's name
        // Create a query fetch user data
        $user_query = mysql_query(
            "SELECT * FROM `Users`
            ORDER BY last_name ASC") 
            or die(mysql_error());
      
      
        $rows = array();
        while($r = mysql_fetch_object($user_query)) {
            $rows['users'][] = $r;
        }
      
    header('Content-Type: application/json');
    echo json_encode($rows);
           
    mysql_close($dbc);
    
?>