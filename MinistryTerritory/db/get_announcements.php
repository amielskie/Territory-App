<?php
    
    function fetch_news_and_updates() {
        
        require('db_connect.php');
           
        // Create a query to get announcements
        $announcements_query = mysql_query(
            "SELECT * FROM `Announcements`") 
            or die(mysql_error());
        
        // Check if query returns a row
        if (mysql_num_rows($announcements_query) > 0) {
            // Output data of each row
            while($row = mysql_fetch_assoc($announcements_query)) {
                // Store userdata into variables
                $title = $row['title'];
                $message = $row['message'];
                $date = $row['date'];
                
                // Create a script to put announcements on home page
                echo "
                <script>
                    $('#newsAndUpdates').append('<h3>$title <span>$date</span></h3><p>$message</p>');
                </script>";

            }
        } else {
            echo "0 results";
        }
         
        mysql_close($dbc);
        
        
       

        
        
    } // END OF FUCNTION

?>
















