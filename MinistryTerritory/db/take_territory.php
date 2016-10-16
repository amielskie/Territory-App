<?php 
        
        require('db_connect.php');

        $username = $_POST["username"];
        $territory = $_POST["territory"];
        
        // Check  how many territories a user has
        $territory_check = mysql_query(
            "SELECT `territory` 
            FROM `Users` 
            WHERE `username` = '$username'")
            or die("Can't find user. ".mysql_error());

        $taken_query = mysql_query(
            "SELECT `taken`, `availability`
            FROM `Territory` 
            WHERE `_id` = '$territory'");


        // Get how many times the territory was taken
 
        $take_row = mysql_fetch_array($taken_query);
        $taken_count = intval($take_row['taken']);

        // Check territory availability
        $isAvailable = intval($take_row['availability']);
        
        // Get user territory count
        $row = mysql_fetch_array($territory_check);
        $territory_count = intval($row['territory']);

    // If territroy is available
    if ($isAvailable == 1) {
        // Check if user has less than 3 territories
        if($territory_count < 3){
            
            // Update how many times territory was taken
            $taken_count += 1;
            
            // Query to update returned territory
            $return_query = mysql_query(
            "UPDATE `Territory` 
            SET `availability`='0',
            `date_taken`= current_date(),
            `date_returned`= '',
            `taken_by`= '$username',
            `last_owner`= '', 
            `taken`= '$taken_count'
            WHERE `_id` = '$territory'")
            or die("Error returning territory". mysql_error()); 
            
            // Update records
            $update_notif_query = mysql_query(
            "INSERT INTO `Updates` 
                (`message`, `date`, `type`) 
            VALUES 
                ('$username has taken TERRITORY $territory', current_date(), '3')") 
            or die("Error updating new address. ". mysql_error());
            
            // Return message if successful
            if ($return_query === TRUE) {
                // Update the territory count when user gets a territory
                $territory_count += 1;
                $update_territory_count = mysql_query(
                "UPDATE `Users` 
                SET `territory`='$territory_count' 
                WHERE `username` = '$username'")
                or die("Can't find user. ".mysql_error());
                
                echo "Territory was taken successfully.";
            } else {
                echo "Error taking territory. ";
            }
        }

        else {
            echo "You already have 3 territories.";
        }
       
     }
    else {
        echo "Territory is already taken.";
    }

    mysql_close($dbc);
    
?>