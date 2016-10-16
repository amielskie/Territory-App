<?php 

    require('../../db/db_connect.php');

    $territoryId = mysql_real_escape_string($_GET["territory"]);
    $viaId = mysql_real_escape_string($_GET["viaId"]);

  
        $update_address_query = mysql_query(
        "SELECT * 
        FROM `$territoryId` 
        WHERE `id` = '$viaId'") 
        or die("Error updating address.". mysql_error());

        $rows = array();
        while($r = mysql_fetch_object($update_address_query)) {
            $rows['territories'][] = $r;
        }
      
        header('Content-Type: application/json');
        echo json_encode($rows);
        
        mysql_close($dbc);
    
?>
