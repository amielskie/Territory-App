// Get username from cookies
function getUsername() {
     // Username
    var cookie = document.cookie;
    
    // Return for localhost
    var cookie_value = cookie.substring((cookie.lastIndexOf("name=")+5),cookie.length);
    
    // Return for live server
    var cleaned_cookie = cookie_value.substring(0, cookie_value.lastIndexOf(";"));
    
    return cookie_value;

}

// Add comment to a territory
function add_comment(territory) {
    $(".addGeneralComment").on("click", function() {
         
        
        
        // API URL
        
        var comment = $("#newGeneralComment").val();
        // Set default value for territory
        if(comment == "") {
            alert("Write a comment!");
        }
        else {

           // Set data to pass to server
            var username_data = {
                comment: comment, 
                territory: territory,
                username : getUsername()};


            // API URL
            var url = "db/add_comment.php";

            $.post(url, username_data, function (data) {
                // Show an alert of successful comment post    
                alert(data);
            });

            // Update user info list and clear fields
            $("#newGeneralComment").val("");
            $(".addGeneralComment").attr("disabled", true);
        }
    }); // END OF ON CLICK
}

function add_User_Territory() {
   
    // Generate loading iamge
    $("#my_list").html("<div class=\"loadingImage\"> <img alt=\"Circle loading images.\" src=\"images/logo/loading_image.gif\"/></div>");
    
    // Username 

    var cookie = document.cookie;              
    var cookie_value = cookie.substring((cookie.lastIndexOf("name=")+5),cookie.length);
    var cleaned_cookie = cookie_value.substring(0, cookie_value.lastIndexOf(";"));
    // API URL

    // Set data to pass to server
    var username_data = {username : getUsername()};

    // API URL
    var url = "db/get_user_territory.php";
    
    // Container for html mark ups
    var content = "";
    $.getJSON(url, username_data, function (data) {

        $.each(data.territory, function (i, result) {

            var territoryName = "Territory " + result._id + " - " + result.name;
            var territoryNumber = result._id;
            var territoryID = result._id + "_myTerritory";
            var territoryDateTaken = result.date_taken;
            var id = result._id;

             /* Create list details (imags, titles) */
             var createListItemDetails = "<div class=\"my_list_details\"> <img src=\"images/territory_photo/" + territoryNumber + ".jpg\"/> <h4> Date Taken: " +territoryDateTaken + " </h4> <button id= \""+territoryNumber+"\" class=\"return_btn btn btn-danger center-block btn-group-lg\"> Return </button> </div>";

            /* Create List Items with details*/
            var createListItem = "<li class=\"list_item\" id=\"" + territoryID + "\"><h2>" + territoryName + createListItemDetails + "</h2></li> <div class=\"showAddressButton\" id=\""+id+"\" ><h4>Show Address <span class=\"glyphicon glyphicon-search\" aria-hidden=\"true\"></span></h4></div>";

            content += createListItem;

        }); // EMD OF EACH
        
        // Put list on the html
        $("#my_list").html(content);
        
        // Sho waddress details when button is clicked
        display_address_details();
        
        $(".my_list_details").hide();
    }); // END OF getJSON


}

// Display address details when button is clicked
function display_address_details() {
    // When show Address Button is clicked
    $(".showAddressButton").on("click", function() {
        
        // Add loading image while page loads data from database
        $("#territoryAddress").html("<div class=\"loadingImage\"> <img alt=\"Circle loading images.\" class=\"center-block\" src=\"images/logo/loading_image.gif\"/></div>");
        
         // Blur background 
        $("#territory_pages").css("filter","blur(5px)");
        
        // Get territory id
        var territory = this.id;
        
        show_address_details(territory);
        
        }); // END OF ONCLICK
}

// Show address details
function show_address_details(territory) {
        
        
        //Show the div to display table
        $("#territoryAddress").show();
        
        // Scroll to the address details div
        $('html, body').animate({
                                scrollTop: $("#territoryAddress").offset().top
                                }, 600);
        
        // API URL
        var url = "admin/db/get_all_territory_address_details.php";
        
        // Territory data to be passed on database
        var territory_data = { territory: territory };
        
        // Open Table
        var content = "<h4>Territory "+territory+"</h4><table>";
       
        var tableHead = "<tr><th>ID</th><th>Territory Name</th><th>Intercom</th><th>Note</th></tr>";
         
        $.getJSON(url, territory_data, function (data) {
            
            // Create the table headers
            content += tableHead;
            
            $.each(data.territories, function (i, result) {
                
                var id = result.id;
                var via = result.via;
                var intercom = result.intercom;
                var comment = result.comment;


                // PUT THIS VAR IN FOR EACH
                var info_list = "<tr><td class=\"viaId\">"+id+"</td> <td>"+via+"</td><td>"+intercom+"</td><td>"+comment+"</td><td></td><td><button class=\"btn-success updateButton \">Update</button></td></tr>";

                // Add user info to the list
                content += info_list;

            }); // EMD OF EACH

            // Close the table
            content += "</table> <h2>Add Comment</h2><textarea type=\"text\"/ id=\"newGeneralComment\"></textarea><button class=\"btn-primary addGeneralComment center-block\">Add Comment</button> <button class=\"btn btn-danger center-block closeAddressDetailsButton\">Close</button>";

            // Put list on the html
            $("#territoryAddress").html(content);
            
            // Update comment
            update_comment(territory);
            
            // Add a comment to the territory
            add_comment(territory);
            
            // Hide details when close button is clicked
            close_address_details();

            // EDIT COMMENT
            
        }); // END OF getJSON
        
        
}



// Update the comment
function update_comment(territory) {
    
    $(".updateButton").on("click", function() {
        
        // Get the value of the id column in the row of the clicked button
        var id = $(this).closest('tr').children('td.viaId').text(); 
        
        // Loading iamge
        $("#update_form").html("<div class=\"loadingImage\"> <img alt=\"Circle loading images.\" class=\"center-block\" src=\"images/logo/loading_image.gif\"/></div>");
        
        // Blur background
        $("#territoryAddress").css("filter","blur(5px)");
        // Disable all input elements
        $("#territoryAddress :input").attr("disabled", true);
        
        // Show the update box
        $("#update_form").show("normal");  
        
        // Go to the list of territory address details
        $('html, body').animate({
                                scrollTop: $("#update_form").offset().top
                                }, 600);
        
               
        
        // API URL
        var url = "admin/db/update_address.php";
        
        // Territory data to be passed on database
        var territory_data = {
            territory: territory,
            viaId: id };
        
        // Open Table
        var content = "<h4> Territory "+territory+"<span class=\"glyphicon glyphicon-remove close_update_form\" aria-hidden=\"true\"></span> </h4>";
        
         
        $.getJSON(url, territory_data, function (data) {
            
            $.each(data.territories, function (i, result) {
                
                var id = result.id;
                var via = result.via;
                var intercom = result.intercom;
                var comment = result.comment;
                
                content += "<label>Via</label><input disabled value=\""+via+"\" type=\"text\" id=\"updateVia\"/><label>Intercom</label><input disabled  value=\""+intercom+"\" type=\"text\" id=\"updateIntercom\"/> <label>Comment</label><input value=\""+comment+"\" type=\"text\" id=\"updateComment\"/> <input type=\"submit\" value=\"Save\" class=\"btn btn-success updateAddressDetailsButton\"/>";

            }); // EMD OF EACH
            
            // Put list on the html
            $("#update_form").html(content);
            
            // Apply changes
            apply_changes(territory, id);
            
            // When the x buttons i clicked close the form
            $(".close_update_form").on("click", function() {
                close_form();
            }); // END OF CLOSE UPDATE FORM 
            
            
        }); // END OF getJSON      
        
    }); // END OF IF UPDATE BUTTON IS CLICKED
    
}



// If update button is clicked
function apply_changes(territory, id) {
    $(".updateAddressDetailsButton").on("click", function() {
           
        var newVia = $("#updateVia").val();
        var newIntercom = $("#updateIntercom").val();
        var newCOmment = $("#updateComment").val();
        

                // User data to be passed on database
                var address_data = {
                    territoryID: territory,
                    viaId: id,
                    via: newVia,
                    intercom: newIntercom,
                    comment: newCOmment};

                // API URL
                var url = "db/update_address_details.php";

                $.post(url, address_data, function (data) {

                    updateStatusBox(data);
                    $("#message_box").fadeIn("fast");
                    // IF OK IS CLICKED
                    chooseNo();
                    
                    // Reload details
                    show_address_details(territory);
                });   
               
                // Close the form
                close_form();
        
             
    });// END OF IF SUBMIT IS CLICKED
}



function close_form() {
            // Hide update form
            $("#update_form").hide("normal");
            
            // Remove blur background
            $("#territoryAddress").css("filter","blur(0px)");
            // Enable all input elements
            $("#territoryAddress :input").attr("disabled", false);  
}


// When close is clicked
function close_address_details() {
    $(".closeAddressDetailsButton").on("click", function() {
        // Unblur background
        $("#territory_pages").css("filter","blur(0px)");
        
        // Hide address details
        $("#territoryAddress").hide();
    });// END OF ONCLICK
}



// IF NO IS CLICKED
function chooseNo() {
    $("#noButton").on("click", function() {
            removeDialog();
            updateList();
    });// END OF IF NO IS CLICKED
}

// Update list
function updateList() {
   
    show_address_details();

}

// remove dialog box
function removeDialog() {
    $("#message_box").fadeOut("fast");
    $("#territory_pages").removeClass("blur_all");
}


// Status box
function updateStatusBox(status) {
    $("#message_box").fadeIn("fast");
    // Add the yes or no box
    $("#message_box").html("<div id=\"status_box\" class=\"container\"> <h4>"+status+"</h4>  <button type=\"submit\" id=\"noButton\" class=\"btn btn-success\">Okay</button> </div>");
}






