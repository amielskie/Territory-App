<?php 

    require('../../db/db_connect.php');

    $username = mysql_real_escape_string($_POST["user_name"]);

    if(isset($username)) {
        $delete_user_query = mysql_query(
        "DELETE FROM `Users` 
        WHERE `username` = '$username'") 
        or die("Error deleting user". mysql_error());

        // Check if successful
        if ($delete_user_query === TRUE) {
            
            $update_territory_query = mysql_query(
            "UPDATE `Territory` 
            SET `availability`= 1,
                `date_taken`='NULL',
                `taken_by`= 'NULL',
                `last_owner`='NULL' 
            WHERE `taken_by`= '$username'") 
            or die("Error updating territory". mysql_error());
            if ($update_territory_query === TRUE) {
                echo "Account successfully deleted.";
            }
            
            else {
                echo "Could not delete user";
            }
        }// IF USER IS SUCCESSFULLY DELETED
        
    } // IF USERNAME ISSET
    
    else {
        echo "User not found.";
    }

mysql_close($dbc);
?>
