<!DOCTYPE html>

<?php 
    require ('db/user_login.php');
?>

<html>
    <head>
        <meta name="description" content="Login Page for users, you can't access the main page if you are not logged in." />
        <meta name="keywords" content="crescenzago, milano tagalog, jw, jehovah's witnesses, italia, italy"/>
        <meta name="author" content="Amiel Gahol"/>
        
        <!-- Make it scale properly on mobile -->
        <meta name="viewport" content="initial-scale=1">
        
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
        
        <!-- CUSTOM STYLE SHEETS -->
        <link href="css/loginStyle.css" type="text/css" rel="stylesheet"/>
        
        <title>Log In</title>
    </head>
    
    <body class="dark_theme">
        
        <div class="container">
        
            <div class="login_form">
                
                <h1> Log In </h1>
                <form action="login.php" method="POST">

                    <label for="username">Username</label>
                    <input type = "text" id="username" name="username" required/>
                    <br/>
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required/>
                    <br/>
                    <div id="error_message">
                    <h5></h5>
                    </div>
                    <input id="login_button" class="btn btn-success" type="submit" value="Log in" />
                </form>
            </div>
        </div>
        
        
        
        <!-- ******************** FOOTER HERE ******************-->
        <!-- Social Footer, Colour Matching Icons -->
<!-- Include Font Awesome Stylesheet in Header -->
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet" integrity="sha256-MfvZlkHCEqatNoGiOXveE8FIwMzZg4W85qfrfIFBfYc= sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ==" crossorigin="anonymous">
<!-- // -->
<div class="container">
        <hr>
            <div class="text-center center-block">
                <p class="txt-railway">Login Problems? Contact Us:</p>
                <div id="contact_us">
                    <div id="contact_amiel">
                        <p>Amiel</p>
                        <a href="mailto:amielskie1@gmail.com"><i id="social-em" class="fa fa-envelope-square fa-3x social"></i></a>
                    </div>

                    <div id="contact_patric">
                        <p>Patrick</p>
                        <a href="mailto:patrick@gmail.com"><i id="social-em" class="fa fa-envelope-square fa-3x social"></i></a>
                    </div>
                 
                </div> <!-- END OF CONTACT US-->
            </div>
        </div> <!-- END OF CONTAINER-->
    
        <!--***************** SCRIPTS DOWN HERE *************-->
    
        <!--JQuery -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

        <script src="js/add-data.js"></script>
        
    </body>

</html>
























