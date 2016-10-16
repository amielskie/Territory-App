<!DOCTYPE html>

<?php 
    // Start Session
    session_start();

    // Check if session is set otherwise go back to login page
    if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] == false) {
        header("Location: login.php");
    }

    if($_SESSION['username'] == 'Admin'){
       header("Location: admin/index.php"); 
    }
?>


<html>
<head>
    <title>Territory App</title>
    <meta name="author" content="Amiel Gahol" />
    
    <!-- Make it scale properly on mobile -->
    <meta name="viewport" content="initial-scale=1">
    
    
    
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous"> 
    
    <!-- Social Footer, Colour Matching Icons -->
    <!-- Include Font Awesome Stylesheet in Header -->
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet" integrity="sha256-MfvZlkHCEqatNoGiOXveE8FIwMzZg4W85qfrfIFBfYc= sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ==" crossorigin="anonymous">
    
    <!-- CUSTOM STYLESHEET -->
    <link href="css/style.css" type="text/css" rel="stylesheet"/>  

</head>

    

<body class="dark_theme">
    
    <div class="navbar">
        
            <nav class="navbar navbar-inverse">
              <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                  </button>
                  <a class="navbar-brand" href="#home_page"><img id="brand-logo" alt="Brand Logo" src="images/logo/logoBrand.png"/></a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    
                  <form class="navbar-form navbar-left">
                    <div class="form-group">
                      <input type="text" class="form-control" placeholder="Search Territory" required/>
                    </div>
                    <button type="submit" class="btn btn-success">Search</button>
                  </form>    
                    
                  <ul class="nav navbar-nav">
                    <li id="_myTerritory"><a href="#my_territory">My Territory</a></li>
                    <li id="_availableTerritory"><a href="#available_territory">Available Territory</a></li>
                  </ul>
                  
                  <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Settings <span class="caret"></span></a>
                      <ul class="dropdown-menu">
                        <li id="editProfileLink"><a href="#">Edit Profile</a></li>
                        <li><a href="#"><input type="checkbox" class="pull-right" id="theme_change" value="dark_theme" checked>Dark Theme</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="logout.php">Log Out</a></li>
                      </ul>
                    </li>
                  </ul>
                </div><!-- /.navbar-collapse -->
              </div><!-- /.container-fluid -->
            </nav>
         <!-- END OF CONTAINER -->
    
    </div>
    
    
    
    
    <div id="territory_pages"> <!-- COVERS ALL THE PAGES IN THE PAGE -->
    <div id="home_page">
        <div class="container">
            <div id="newsAndUpdates" class="row">
                <h1>News &amp; Updates </h1>
                
                <h3>Paano Gamitin </h3>
                <iframe width="560" height="315" src="https://www.youtube.com/embed/ZvwHdiJ0utY" frameborder="0" allowfullscreen></iframe>
                
            </div> <!-- END OF ROW-->
            
        </div> <!-- END OF COTNAINER-->
    
    </div> <!-- END OF HOME PAGE-->
    
    
    <div id="my_territory">
        <div class="container">
            <div class="row">
                <h1> My Territory </h1>
                <div class="user_details col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <img class="img-rounded profile_pic pull-left" src="images/user_photo/default-photo.jpg"/>
                    <h3 id="user_name"></h3>
                </div> <!-- USER NAME AND PICTURE-->
                
                <div class="my_territory_list col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    
                    <ul id="my_list"> 
                        <!-- LIST CONTAINER -->
                        <!-- INSIDE HERE IS THE my_list_details div generated in the add-data.js file -->
                        
                    </ul>
                </div> <!--END OF MY TERRITORY LIST -->
                
            </div> <!-- END OF ROW-->
            
        </div> <!-- END OF COTNAINER-->
    
    </div> <!-- END OF MY TERRITORY-->
    
    <div id="available_territory">
        <div class="container">
            <div class="row">
                <h1> Available Territories </h1>
                <div class="available_territory_list col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    
                    <ul id="available_list">
                        <!-- AVAILABLE LIST CONTAINER-->
                        <!-- INSIDE HERE IS THE available_list_details div generated in the add_available_territory.js file -->
                    </ul>
                </div> <!-- USER NAME AND PICTURE-->
                
            </div> <!-- END OF ROW-->
            
        </div> <!-- END OF COTNAINER-->
    
    </div> <!-- END OF MY TERRITORY-->
    
    
    

<!-- ************* FOOTER ******** -->
<div class="container">
        <hr>
            <div class="text-center center-block">
                <p class="txt-railway">Contact us</p>
                
                    <a href="https://www.facebook.com/amieljairo.gahol"><i id="social-fb" class="fa fa-facebook-square fa-3x social"></i></a>
                    <a href="mailto:amielskie1@gmail.com"><i id="social-em" class="fa fa-envelope-square fa-3x social"></i></a>
                
                <!-- FOR TWITTER AND GOOGLE PLUS
                <a href="#"><i id="social-tw" class="fa fa-twitter-square fa-3x social"></i></a>
                    <a href="#"><i id="social-gp" class="fa fa-google-plus-square fa-3x social"></i></a>
                -->
            </div>
        <hr>
</div> <!-- END OF CONTAINER -->
</div> <!-- END OF TERRITORY PAGES -->
    
    <div id="territoryAddress"> </div>
    
    <!--STATUS AND DIALOG BOX-->
    <div id="message_box"> </div>
    
    <!-- UPDATE FORM-->
    <div id="update_form"> </div>
    
    <!-- EDIT PROFILE-->
    <div id="edit_profile"> </div>
    
    <!--***************** SCRIPTS DOWN HERE *************-->
    
    <!--JQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    
    <!-- ADD LISTS TO THE TERRITORY PAGES -->
    <script src="js/add-data.js"></script>
    <script src="js/add_available_territory.js"></script>
    <script src="js/edit_profile.js"></script>
    
    <!-- RETURN AND TAKE TERRITORY SCRIPS-->
    <script src="js/territory_actions.js"></script>
    <script>
        $(document).ready(function() {
            // Make navbar size constant
            $(".navbar").css("font-size","1.1em");
            
            // Hide Pages
            $("#my_territory").hide();
            $("#available_territory").hide();  
            $("#territoryAddress").hide();
            $("#update_form").hide();
            $("#edit_profile").hide();
            
            /*-------------------THEME CHANGE ------------*/
            function change_theme() {
                $("#theme_change").click(function() {
                    // Get Checkbox Status
                    var dark_theme = document.getElementById("theme_change").checked;

                    // Change theme to light
                    if (dark_theme == false) {
                        // Change brand logo
                        $("#brand-logo").attr("src", "images/logo/logoBrand-light.png");

                        // Change the navbar class
                        $("nav").removeClass("navbar-inverse");
                        $("nav").addClass("navbar-default");

                        // Change body to light theme
                        $("body").removeClass("remove_theme");
                        $("body").addClass("light_theme");
                    
                    }// END OF if
                    
                    
                    // Change theme to dark
                    else {
                        // Change logo
                        $("#brand-logo").attr("src", "images/logo/logoBrand.png");
                        
                        // Change the navbar class
                        $("nav").removeClass("navbar-default");
                        $("nav").addClass("navbar-inverse");

                        // Change body to dark theme
                        $("body").removeClass("light_theme");
                        $("body").addClass("dark_theme");
 
                    }// END OF ELSE
                }); // END OF click
            } /*-------------------THEME CHANGE ------------*/
            
            /*------------------- CHOSE PAGE --------------------*/
            function choose_page() {
                
                // When logo is clicked
                $(".navbar-brand img").click(function() {
                    // Hide Pages
                    $("#home_page").show("fast");
                    $("#my_territory").hide("normal");
                    $("#available_territory").hide("normal");
                    
                    // Remove active classes
                    $("#_myTerritory").removeClass("active");
                    $("#_availableTerritory").removeClass("active");
                    
                    // Scroll to the my_territory element automatically
                    $('html, body').animate({
                    scrollTop: $("#home_page").offset().top
                    }, 600);
                    
                }); //END OF CLICK 
                
                // Ny Territory Page
                $("#_myTerritory").click(function() {
                    // CHange the active link
                    $(this).addClass("active");
                    $("#_availableTerritory").removeClass("active");
                    
                    // Show My Territory Content and hide other pages
                    $("#my_territory").show();
                    $("#available_territory").hide();
                    $("#home_page").hide();
                    
                    // Scroll to the my_territory element automatically
                    $('html, body').animate({
                    scrollTop: $("#my_territory").offset().top
                    }, 600);
                    
                    // Update user territory everytime user goes to my territory page
                    add_User_Territory();
                    
                }); // END OF CLICK
                
                // Available Territory Page
                $("#_availableTerritory").click(function() {
                    // Change the active link
                    $(this).addClass("active");
                    $("#_myTerritory").removeClass("active");
                    
                    // Show Available Territory Content and hide other pages
                    $("#available_territory").show();
                    $("#my_territory").hide();
                    $("#home_page").hide();
                    
                    // Scroll to the my_territory element automatically
                    $('html, body').animate({
                    scrollTop: $("#available_territory").offset().top
                    }, 600);
                    
                    // Update available Territory every time the user goes to available territroy page
                    get_Available_Territory();
                    
                    
                }); // END OF CLICK
                
                
            }/*------------------- CHOSE PAGE --------------------*/
            
            /** ------------------- SHOW LIST DETAILS CONTROL ---------- */
            // Show and Hide my_list_details
            $(document).on("click", "li.list_item" , function() {
                // GET THE ID of the list item that was clicked
                var list_item_id = this.id;

                // Show the div element of the list_item element's div (my_list_details)
                $("#"+list_item_id+(" div")).toggle();

                // Scroll down to the map location 
                $('html, body').animate({
                                scrollTop: $("#"+list_item_id).offset().top
                                }, 600);
            });
            
            
            // WHEN RETURN BUTTON IS CLICKED
            $(document).on("click", "button.return_btn" , function() {
                var button_id = this.id;
                
                // Blur background
                $("#territory_pages").addClass("blur_all");
                
                // Action string to display on dialog box
                var action = "return";
                // Add the yes or no box
                showDialogBox(button_id,action);
                
                // Go to dialog box
                $('html, body').animate({
                                scrollTop: $("#message_box").offset().top
                                }, 600);
                
                // If yes is selected 
                $("#yesButton").on("click", function() {
                    // Call the return function in the territory_actions.js
                    return_Territory(button_id);
                    // Reload the list
                    add_User_Territory();
                     
                });
                // Reload the list *Uncomment if loading list gives problems*
                //add_User_Territory();
                
            }); // END OF if return button is clicked
            
            // WHEN TAKE BUTTON IS CLICKED
            $(document).on("click", "button.get_btn" , function() {
                var button_id = this.id;
                
                // Blur background
                $("#territory_pages").addClass("blur_all");
                
                // Action string to display on dialog box
                var action = "take";
                // Add the yes or no box
                showDialogBox(button_id,action);
                
                // Go to dialog box
                $('html, body').animate({
                                scrollTop: $("#message_box").offset().top
                                }, 600);
                
                // If yes is selected 
                $("#yesButton").on("click", function() {
                    // Call the return function in the territory_actions.js
                    get_Territory(button_id);
                    // Reload the list
                    get_Available_Territory();
                     
                });
                // Reload the list *Uncomment if loading list gives problems*
                //get_Available_Territory();
                
            }); // END OF if return button is clicked
            
            
            // Always hide status box if body is clicked
            $("body").on("click" , function() {
                $("#status_box").fadeOut("fast");
                $("#territory_pages").removeClass("blur_all");
            });
            
            /* ------------ CALL METHODS -----------*/
            change_theme();
            choose_page();
            
            // Load Territory when page loads
            add_User_Territory();
            get_Available_Territory();
            
        }); // END OF ready
        
    </script>
    
    
</body>


<!-- **************** SCRIPT FOR USER DATA *************** -->
<?php 

    // Hide all warnings from showing up
    error_reporting(E_ERROR);

    // Import the get_user_data file
    require('db/get_user_data.php');
    require('db/get_announcements.php');
    
    // Get username 
    $username = $_SESSION['username'];

    // Send username to get_user_data to fetch the user info
    fetch_user_data($username);
    
    // Fetch news and updates
    fetch_news_and_updates();

?>

</html>

























