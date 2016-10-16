<?php 
        
        require('db_connect.php');

        $username = $_POST["username"];
        $territory = $_POST["territory"];
        
        // Add to records
        addToRecords($username, $territory);

        // Check  how many territories a user has
        $territory_check = mysql_query(
            "SELECT `territory` 
            FROM `Users` 
            WHERE `username` = '$username'")
            or die("Can't find user. ".mysql_error());
        
        // Get user territory count
        $row = mysql_fetch_array($territory_check);
        $territory_count = intval($row['territory']);

            // Add to successful territory records

            // Query to update returned territory
            $return_query = mysql_query(
            "UPDATE `Territory` 
            SET `pending`='1',
            `date_returned`= current_date(),
            `taken_by`= '',
            `last_owner`= '$username' 
            WHERE `_id` = '$territory'")
            or die("Error returning territory". mysql_error()); 
            
            // Return message if successful
            if ($return_query === TRUE) {
                // Update the territory count when user gets a territory
                $territory_count -= 1;
                $update_territory_count = mysql_query(
                "UPDATE `Users` 
                SET `territory`='$territory_count' 
                WHERE `username` = '$username'")
                or die("Can't find user. ".mysql_error());

                echo "Territory was returned successfully.";
                
            } else {
                echo "Error returning territory.";
            }

        function addToRecords($username, $territory) {
            
            // Get date taken 
            $date_taken_query = mysql_query(
            "SELECT `date_taken` 
            FROM `Territory` 
            WHERE `_id`= '$territory'")
            or die("Can't find user. ".mysql_error());
        
            // Get user territory count
            $row = mysql_fetch_array($date_taken_query);
            $date_taken = $row['date_taken'];

            
            // Check  how many territories a user has
            $territory_check = mysql_query(
                "INSERT INTO `Records` 
                    (`taken_by`, `territory`, `date_taken`, `date_returned`)
                    VALUES 
                        ('$username', '$territory', '$date_taken', current_date())")
                or die("Can't find user. ".mysql_error());
            
            // Update records
                $update_notif_query = mysql_query(
                "INSERT INTO `Updates` 
                    (`message`, `date`, `type`) 
                VALUES 
                    ('$username has returned TERRITORY $territory', current_date(), '4')") 
                or die("Error updating new address. ". mysql_error());

        }
    
?>