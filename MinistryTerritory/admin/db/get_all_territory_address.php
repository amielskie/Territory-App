
<?php 
    
        require('../../db/db_connect.php');
        
        // For live server
        $db_name = "a2469621_milano";

        // For localhost
        $db_name = "crescenzago";

        // Create a query fetch territory data
        $territory_query = mysql_query(
            "SELECT table_name FROM INFORMATION_SCHEMA.TABLES
            WHERE table_schema = '$db_name'
            AND table_name REGEXP '^[0-9]'
                  ORDER BY table_name") 
            or die(mysql_error());
      
        if($territory_query == true)  {
            $rows = array();
            while($r = mysql_fetch_object($territory_query)) {
                $rows['territories'][] = $r;
            }
      
            header('Content-Type: application/json');
            echo json_encode($rows);
        }
    else {
        echo "Error";
    }
      
       
           
    mysql_close($dbc);
    
?>
