<?php 
        
        require('db_connect.php');

        $username = $_GET["username"];
        
        // Fetch territories with user's name
        // Create a query fetch user data
        $territory_query = mysql_query(
            "SELECT * 
            FROM `Territory` 
            WHERE taken_by = '$username'") 
            or die(mysql_error());
      
      
        $rows = array();
        while($r = mysql_fetch_object($territory_query)) {
            $rows['territory'][] = $r;
        }
      
    header('Content-Type: application/json');
    echo json_encode($rows);
           
    mysql_close($dbc);
    
?>