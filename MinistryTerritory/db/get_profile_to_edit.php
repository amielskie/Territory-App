<?php

        
        require('db_connect.php');
        
        $username = $_GET["username"];

        // Create a query to check if user exists
        $profile_to_edit_query = mysql_query(
            "SELECT * 
            FROM `Users` 
            WHERE username = '$username'") 
            or die(mysql_error());
        
        // Store values of query in a row
           $rows = array();
            while($r = mysql_fetch_object($profile_to_edit_query)) {
                $rows['profile'][] = $r;
            }

        header('Content-Type: application/json');
        echo json_encode($rows); 
        
        mysql_close($dbc);
        

?>
















