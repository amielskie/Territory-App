<?php 
    session_start();

    require('db_connect.php');
    

    // Check if session is available then redirect to the main page
    if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) {
        header("Location: index.php");
    }

    // Check if username and password matches
    if (isset($_POST['username']) && isset($_POST['password'])) {
        
        // Store values of the form if they are not empty and sanitize it
        $username = mysql_real_escape_string($_POST['username']);
        $password = mysql_real_escape_string($_POST['password']);
        
        if($username == "Admin" && $password == "1234") {
            // Enable session
            $_SESSION['logged_in'] = true;
            $_SESSION['username'] = $username;
            
            // Redirect to main page 
            header("Location: admin/index.php"); 
            
            
        }// END IF ADMIN CHECK
        
        // Create a query to check user credentials
        $check_user_exists_query = mysql_query(
            "SELECT * 
            FROM `Users` 
            WHERE username = '$username'
            AND password = '$password'") 
            or die(mysql_error());
        
        // CHeck if usrname and password matches
        if(mysql_num_rows($check_user_exists_query) > 0) {
            // Enable session
            $_SESSION['logged_in'] = true;
            
            // Set username session
            $_SESSION['username'] = $username;
            
            // Set username cookie
            setcookie('username', $username, time() + (86400 * 30), "/"); // 86400 = 1 day
            
            // Redirect to main page 
            header("Location: index.php");     
            
        } // END OF IF Username exists
        else {
            echo "<script>alert('Login Failed! Please try again.');</script>";
        } // END OF IF user is not found
            
    }// END OF IF username and password is set


    mysql_close($dbc);
?>