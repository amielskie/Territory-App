<?php

    function fetch_user_data($username) {
        
        require('db_connect.php');
        
        // Create a query to check if user exists
        $user_info_query = mysql_query(
            "SELECT * 
            FROM `Users` 
            WHERE username = '$username'") 
            or die(mysql_error());
        
        // Store values of query in a row
        $user_info_row = mysql_fetch_array($user_info_query);
        
        // Store userdata into variables
        $name = $user_info_row['name'] . " " . $user_info_row['last_name'];
        $email = $user_info_row['email'];
        
        
        // Set user's Name on the my territory page
        echo "
        <script>
            $('#user_name').text('$name');
        </script>"; 
        
        mysql_close($dbc);
        
    } // END OF FUCNTION

?>
















