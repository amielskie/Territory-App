<!DOCTYPE html>

<?php 
    // Start Session
    session_start();

    // Check if session is set otherwise go back to login page
    if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] == false) {
        header("Location: ../login.php");
    }

    // Check if session is set otherwise go back to login page
    if ($_SESSION['username'] != 'Admin') {
        header("Location: ../index.php");
    }

    
?>


<html>

<head>
    <title> Admin Panel</title>
    <meta name="author" content="Amiel Gahol" />
    
    <!-- Make it scale properly on mobile 
    <meta name="viewport" content="initial-scale=1">-->
    
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <!--CUSTOM STYLESHEETS-->
    <link href="../css/admin_style.css" type="text/css" rel="stylesheet" /> </head>

<body>
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button> <a class="navbar-brand" href="#home_page">Admin <br /> Panel</a> </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li id="userPageLink"><a href="#">User <span class="sr-only">(current)</span></a></li>
                    <li id="territoryPageLink"><a href="#">Territory</a></li>
                    <li id="territoryAddressPageLink"><a href="#">Territory Address</a></li>
                </ul>
                <form class="navbar-form navbar-left">
                    <div class="form-group">
                        <input id="searchUserInput" type="text" class="form-control" placeholder="Search User"> </div>
                    <button type="submit" class="btn btn-success">Search</button>
                </form>
                
                <ul class="nav navbar-nav">
                    <li id="pendingPageLink"><a href="#">Pending Territories</a></li>
                    <li id="recordsLink"><a href="#">Records</a></li>
                    
                </ul>
                
                <ul class="nav navbar-nav navbar-right">
                    
                    
                    <li><a href="../logout.php">Log Out</a></li>
                </ul>
                
                
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>

    <div id="admin_pages">
        
        <div class="container" id="home_page">
            
                <div id="updatesAndNews">
            
                    <h2>Updates and News </h2>
                    <label> Title </label>
                    <input type="text" id="announcementTitle" />
                    <label> Message </label>
                    <textarea rows="10" cols="70" id ="announcementMessage"></textarea>
                    <input type="submit" class="btn btn-success center-block" id="addAnnouncement"/>
                    
                    
                </div>
        
                <div id="home_page_div">
                    <h2> Updates </h2>
                    <div id="updates_div"> </div>
                <!-- END OF HOME PAGE DIV -->

            </div> <!--END OF CONTAINER-->
        </div>

        <div class="container" id="add_user_page">
            <div id="add_user_div">
                <h2>Add User</h2>
                <label>Name</label>
                <input type="text" id="addName" name="addName" required/>
                <label>Last Name</label>
                <input type="text" id="addLastName" name="addLastName" required/>
                <label>Email</label>
                <input type="text" id="addEmail" name="addEmail" />
                <label>Phone</label>
                <input type="text" id="addPhone" name="addPhone" />
                <label>Territories</label>
                <input type="text" id="addTerritory" name="addTerritory" />
                <input class="btn-primary" type="submit" id="addUserButton" name="addUserButton" value="ADD" /> </div>
            <!-- END OF ADD USER DIV--->
            <h4 id="showAllUser"> <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Show all user</h4>
            <div id="user_info_div"> </div>
            <!-- END OF USER INFO DIV -->
        </div> <!--END OF CONTAINER-->

        <div class="container" id="territory_page">
            <div id="add_territory_div">
                <h2>Add Territory</h2>

                <label>Territory # </label>
                <input type="text" id="addTerritoryId" name="addTerritoryId" required/>

                <label>Name</label>
                <input type="text" id="addTerritoryName" name="addTerritoryName" required/>
                <label>Owner</label>

                <input type="text" id="addOwner" name="addOwner" placeholder="User's username" />

                <input class="btn-warning" type="submit" id="addTerritoryButton" name="addTerritoryButton" value="ADD" /> 
            </div> <!-- END OF ADD USER DIV--->
            <h4 id="showAllTerritory"> <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Show all territories</h4>

            <div id="territory_info_div"> haha </div>
            <!-- END OF TERRITORY INFO DIV -->
        </div> <!-- END OF TERRITORY CONTAINER-->


        <!-- ******* CREATE A NEW DATABASE TABLE TO STORE ADDRESS OF A SPECIFIC TERRITORY ****** -->
        <div class="container" id="territory_address_page">
            <div id="add_territory_address_div">
                <h2>Add Territory Address</h2>

                <label>Territory # </label>
                <input type="text" id="addTerritoryAddressId" name="addTerritoryAddressId" required/>

                <input class="btn-info" type="submit" id="addTerritoryAddressButton" name="addTerritoryAddressButton" value="ADD" /> 

            </div> <!-- END OF ADD USER DIV--->
            <h4 id="showAllTerritoryAddress"> <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Show all territory address</h4>

            <div id="territory_address_info_div"> 
                <ul id = "territory_address_list">

                </ul>
            </div>
            <div id="viewAddressDetails"></div>

            <!-- END OF USER INFO DIV -->
        </div> <!-- END OF TERRITORY ADDRESS CONTAINER-->





        <div class="container" id="pending_territory_page">
            <h2>Pending Territories</h2>
            <div id="pending_territories_div">
            </div> <!-- END OF PENDING TERRITORIES -->
        </div> <!-- END OF PENDING TERRITORY CONTAINER -->


        <div class="container" id="records_page">
            <h2>Territory Records</h2>
            <div id="records_div">
            </div> <!-- END OF PENDING TERRITORIES -->
        </div>



    </div> <!-- END OF ADMIN PAGES -->
    
    <div id="message_box"></div>
    
    <div id="update_form"> </div>
    
    
<!-- END OF ADMIN PAGES-->
    <!-- AJAX -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    <!-- CUSTOM SCRIPTS-->
    <script src="js/user_actions.js"></script>
    <script src="js/pending_actions.js"></script>
    <script src="js/territory_actions.js"></script>
    <script src="js/territory_address_actions.js"></script>
    <script src="js/records_actions.js"></script>
    <script src="js/home_page_actions.js"> </script>
    
    
    <!-- PAGE SCRIPT -->
    <script>
    
        $(document).ready(function() {
            // Hide user info and territory info
            $("#user_info_div").hide();
            $("#territory_info_div").hide();
            $("#territory_address_info_div").hide();
            $("#viewAddressDetails").hide().show();
            $("#update_form").hide();

            
            // Hide other pages when territory loads
            $("#add_user_page").hide();
            $("#territory_page").hide();
            $("#pending_territory_page").hide();
            $("#territory_address_page").hide();
            $("#records_page").hide();
            
            // Fill the UPDATES when page loads
           display_updates();
            
            /* ----------------- CHOOSE PAGE ----------------*/
            
            $(".navbar-brand").click(function() {
                
                // Change active page
                $("#userPageLink").removeClass("active");
                $("#territoryPageLink").removeClass("active");
                $("#territoryAddressPageLink").removeClass("active");
                $("#pendingPageLink").removeClass("active");
                $("#recordsLink").removeClass("active");
                
               // Show territory page
                $("#home_page").show("normal");
                
                // Hide other pages
                $("#territory_page").hide("fast");
                $("#add_user_page").hide("fast");
                $("#pending_territory_page").hide("fast");
                $("#territory_address_page").hide("normal");
                $("#records_page").hide("normal");
                
                // Scroll down to page
                $('html, body').animate({
                                scrollTop: $("#territory_page").offset().top
                                }, 600);
                
                display_updates();
                
            }); // END OF HOME PAGE CLICK
            
            
            $("#userPageLink").click(function() {
                // Update List
                display_user_info();
                
                // Change active page
                $("#userPageLink").addClass("active");
                $("#territoryPageLink").removeClass("active");
                $("#territoryAddressPageLink").removeClass("active");
                $("#pendingPageLink").removeClass("active");
                $("#recordsLink").removeClass("active");
                
                // Show user pages
                $("#add_user_page").show("normal");
                
                // Hide other pages
                $("#home_page").hide("fast");
                $("#territory_page").hide("fast");
                $("#pending_territory_page").hide("fast");
                $("#territory_address_page").hide("normal");
                $("#records_page").hide("normal");
                
                // Scroll down to page
                $('html, body').animate({
                                scrollTop: $("#add_user_page").offset().top
                                }, 600);
                
            }); // END OF IF NAV USER IS CLICKED
            
            
            
            $("#territoryPageLink").click(function() {
                // Update List
                display_territory_info();
                // Change active page
                $("#territoryPageLink").addClass("active");
                $("#territoryAddressPageLink").removeClass("active");
                $("#userPageLink").removeClass("active");
                $("#pendingPageLink").removeClass("active");
                $("#recordsLink").removeClass("active");
                
                // Show territory page
                $("#territory_page").show("normal");
                
                // Hide other pages
                $("#home_page").hide("fast");
                $("#add_user_page").hide("fast");
                $("#pending_territory_page").hide("fast");
                $("#territory_address_page").hide("normal");
                $("#records_page").hide("normal");
                
                // Scroll down to page
                $('html, body').animate({
                                scrollTop: $("#territory_page").offset().top
                                }, 600);
            }); // END OF IF NAV TERRITORY IS CLICKED
            
            
            
            $("#territoryAddressPageLink").click(function() {
                // Update List
                display_territory_address_info();
                // Change active page
                $("#territoryAddressPageLink").addClass("active");
                $("#territoryPageLink").removeClass("active");
                $("#userPageLink").removeClass("active");
                $("#pendingPageLink").removeClass("active");
                $("#recordsLink").removeClass("active");
                
                // Show territory page
                $("#territory_address_page").show("normal");
                
                // Hide other pages
                $("#home_page").hide("fast");
                $("#add_user_page").hide("fast");
                $("#territory_page").hide("normal");
                $("#pending_territory_page").hide("fast");
                $("#records_page").hide("normal");
                
                // Scroll down to page
                $('html, body').animate({
                                scrollTop: $("#territory_address_page").offset().top
                                }, 600);
            }); // END OF IF NAV TERRITORY IS CLICKED
            
            
            
            $("#pendingPageLink").click(function() {
                // Update List
                display_pending_territories();
                // Change active page
                $("#pendingPageLink").addClass("active");
                $("#territoryAddressPageLink").removeClass("active");
                $("#territoryPageLink").removeClass("active");
                $("#userPageLink").removeClass("active");
                $("#recordsLink").removeClass("active");
                // Show territory page
                $("#pending_territory_page").show("normal");
                
                // Hide other pages
                $("#home_page").hide("fast");
                $("#add_user_page").hide("fast");
                $("#territory_page").hide("fast");
                $("#territory_address_page").hide("normal");
                $("#records_page").hide("normal");
                
                // Scroll down to page
                $('html, body').animate({
                                scrollTop: $("#territory_page").offset().top
                                }, 600);
                    
            }); // END OF IF NAV PENDING TERRITORY IS CLICKED
            
            
            
            $("#recordsLink").click(function() {
                // Update List
                display_records();
                // Change active page
                $("#recordsLink").addClass("active");
                $("#territoryAddressPageLink").removeClass("active");
                $("#territoryPageLink").removeClass("active");
                $("#userPageLink").removeClass("active");
                $("#pendingPageLink").removeClass("active");
                
                // Show territory page
                $("#records_page").show("normal");
                
                // Hide other pages
                $("#home_page").hide("fast");
                $("#add_user_page").hide("fast");
                $("#territory_page").hide("fast");
                $("#territory_address_page").hide("normal");
                $("#pending_territory_page").hide("normal");
                
                // Scroll down to page
                $('html, body').animate({
                                scrollTop: $("#records_page").offset().top
                                }, 600);
                
                
                
            }); // END OF IF NAV PENDING TERRITORY IS CLICKED
            
            /* ------------------END CHOOSE PAGE ------------*/
            
            // Show dialog box when add is clicked
            $("#addUserButton").on("click", function() {
                
                // Show dialog box and unblur background
                showDialogBox();
                
                $("#yesButton").on("click", function() {
                    
                    var name = $("#addName").val();
                    var lastName = $("#addLastName").val();
                    var email = $("#addEmail").val();
                    var phone = $("#addPhone").val();
                    var territory = $("#addTerritory").val();
                    
                    
                    //Check if name and last name is not empty
                    if(name == "" || lastName == "") {
                        var status = "Name and last name can't be empty."
                        showStatusBox(status);
                        
                        // IF OK IS CLICKED
                        chooseNo();
                    }
                    else {
                        // Add user account to database
                        add_user(name, lastName, email, phone,territory); 
                         
                    }
                });// END OF IF YES IS CLICKED
                
                // IF NO IS CLICKED
                chooseNo();
                
            }); // END OF ADD USER BUTTON CLICK
       
            
            // Show user when link is clicked
            $("#showAllUser").on("click", function() {
                display_user_info();
                $("#user_info_div").slideToggle("fast");
                // Go to dialog box
                $('html, body').animate({
                                scrollTop: $("#user_info_div").offset().top
                                }, 600);
                
            }); // END OF ON CLICK
            
            
            /************************* TERRITOREY PAGE ********************/
            // Show dialog box when add is clicked
            $("#addTerritoryButton").on("click", function() {
                
                // Show dialog box and unblur background
                showDialogBox();
                
                $("#yesButton").on("click", function() {
                    
                    var id = $("#addTerritoryId").val();
                    var territoryName = $("#addTerritoryName").val();
                    var owner = $("#addOwner").val();
                    
                    //Check if name and last name is not empty
                    if(id == "" || territoryName == "" || isNaN(id) == true ) { 
                        var status = "ID and territory name can't be empty."
                        showStatusBox(status);
                        
                        // IF OK IS CLICKED
                        chooseNo();
                    }
                    else {
                        // Add territory to database
                         add_territory(id, territoryName, owner);
                         
                    }
                });// END OF IF YES IS CLICKED
                
                // IF NO IS CLICKED
                chooseNo();
                
            }); // END OF ADD TERRITORY BUTTON CLICK
       
            
            // Show territory when link is clicked
            $("#showAllTerritory").on("click", function() {
                display_territory_info();
                $("#territory_info_div").slideToggle("fast");
                // Go to dialog box
                $('html, body').animate({
                                scrollTop: $("#territory_info_div").offset().top
                                }, 600);
                
            }); // END OF ON CLICK
            
            // Show address when link is clicked
            $("#showAllTerritoryAddress").on("click", function() {
                display_territory_address_info();
                $("#territory_address_info_div").slideToggle("fast");
                $("#territory_address_info_list").slideToggle("fast");
                
                // Go to dialog box
                $('html, body').animate({
                                scrollTop: $("#territory_address_info_div").offset().top
                                }, 600);
                
            }); // END OF ON CLICK
            
            
            
            
            
            
            
            /******************** TERRITOREY ADDRESS PAGE *****************/
            // Show dialog box when add is clicked
            $("#addTerritoryAddressButton").on("click", function() {
                
                // Show dialog box and unblur background
                showDialogBox();
                
                $("#yesButton").on("click", function() {
                    
                    var id = $("#addTerritoryAddressId").val();
                    
                    //Check if name and last name is not empty
                    if(id == "" || isNaN(id) == true ) { 
                        var status = "ID can't be empty."
                        showStatusBox(status);
                        
                        // IF OK IS CLICKED
                        chooseNo();
                    }
                    else {
                        // Add territory to database
                        add_territory_address(id);
                         
                    }
                });// END OF IF YES IS CLICKED
                
                // IF NO IS CLICKED
                chooseNo();
                
            }); // END OF ADD TERRITORY BUTTON CLICK
            
            
            
            
            

        });// END OF READY
        
    </script>
    
</body>

</html>












