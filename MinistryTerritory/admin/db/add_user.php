<?php 

    require('../../db/db_connect.php');

    // Generate random password
    function generateRandomString($length = 6) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }


    $name = mysql_real_escape_string($_POST["name"]);
    $lastName = mysql_real_escape_string($_POST["lastName"]);
    $email = mysql_real_escape_string($_POST["email"]);
    $phone = mysql_real_escape_string($_POST["phone"]);
    $territory = mysql_real_escape_string($_POST["territory"]);
    $username = str_replace(' ', '', (strtolower($lastName . $name)));
    $password = generateRandomString();

    $add_user_query = mysql_query(
        "INSERT INTO `Users`
            (`name`, `last_name`, `email`, `username`, `password`, `territory`, `phone`) 
        VALUES      ('$name','$lastName','$email','$username','$password','$territory','$phone')") 
        or die("Error adding user". mysql_error());

    // Check if successful
    if ($add_user_query === TRUE) {
        echo "$name $lastName was successfully added.";
    } else {
        echo "Could not add user";
    }

    mysql_close($dbc);
?>

