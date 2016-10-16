<?php 

    require('db_connect.php');

    $username = mysql_real_escape_string($_POST["username"]);
    $email = mysql_real_escape_string($_POST["email"]);
    $phone = mysql_real_escape_string($_POST["phone"]);
    
    
    $update_profile_query = mysql_query(
        "UPDATE `Users` 
        SET `phone` = '$phone', `email` = '$email' WHERE `Users`.`username` = '$username'") 
        or die("Error updating profile. ". mysql_error());


    // Check if successful
    if ($update_profile_query === TRUE) {
        echo "Your profile was successfully updated. ";
    } else {
        echo "Could not update profile. ";
    }

    mysql_close($dbc);
?>

