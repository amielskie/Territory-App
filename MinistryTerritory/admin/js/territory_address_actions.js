// Show all territory address info
function display_territory_address_info() {
    
    $("#territory_address_info_div").html("<div class=\"loadingImage\"> <img alt=\"Circle loading images.\" class=\"center-block\" src=\"../images/logo/loading_image.gif\"/></div>");
    
  
    // API URL
    var url = "db/get_all_territory_address.php";
    
    // Open Table
    var content = "";
    
    $.getJSON(url, function (data) {
        
        $.each(data.territories, function (i, result) {

            var territoryNumber = result.table_name;
            
            
            // PUT THIS VAR IN FOR EACJ
            var info_list = "<li class=\"territoryAddress\" id=\""+territoryNumber+"\">Territory " + territoryNumber +  "<span class=\"glyphicon glyphicon-remove delete_territory_table_button\" aria-hidden=\"true\"></span></li>";

            // Add user info to the list
            content += info_list;
            
        }); // EMD OF EACH
        
        // Put list on the html
        $("#territory_address_info_div").html(content);
        $("#territory_address_info_div").show("normal");
        
        // Add details to the table
        show_address_details();
        
        // DELETE USER
        delete_territory_address();

        
    }); // END OF getJSON
    
}

// Calls when territoryAddress list item is clicked
function show_address_details() {
    $(".territoryAddress").on("click", function() {
        
        $("#viewAddressDetails").html("<div class=\"loadingImage\"> <img alt=\"Circle loading images.\" class=\"center-block\" src=\"../images/logo/loading_image.gif\"/></div>");
        
        // Get ID of the closest 'li' which is the row where the button is in
        var territory = $(this).closest("li").attr("id"); 
        
        view_address_details(territory);
    });// END OF ON CLICK
}

function view_address_details(territory) {
            
        // Go to the list of territory address details
        $('html, body').animate({
                                scrollTop: $("#viewAddressDetails").offset().top
                                }, 600);
        
               
        
        // API URL
        var url = "db/get_all_territory_address_details.php";
        
        // Territory data to be passed on database
        var territory_data = { territory: territory };
        
        // Open Table
        var content = "<h2>Territory "+territory+"</h2><table>";
        
        var tableHead = "<tr><th>ID</th><th>Territory Name</th><th>Intercom</th><th>Comment</th></tr>";
         
        $.getJSON(url, territory_data, function (data) {
            // Create the table headers
            content += tableHead;

            $.each(data.territories, function (i, result) {
                
                var id = result.id;
                var via = result.via;
                var intercom = result.intercom;
                var comment = result.comment;


                // PUT THIS VAR IN FOR EACH
                var info_list = "<tr><td class=\"viaId\">"+id+"</td> <td>"+via+"</td><td>"+intercom+"</td><td>"+comment+"</td><td></td><td><button class=\"btn-success update_button \">Update</button></td><td><button class=\"btn-danger delete_address__button \">Delete</button></td></tr>";

                // Add user info to the list
                content += info_list;

            }); // EMD OF EACH

            // Close the table
            content += "</table><h2>Add Address</h2><label>Via</<label><input type=\"text\"/ id=\"newVia\"> <label>Intercom</<label><input type=\"text\"/ id=\"newIntercom\"><label>Comment</<label><input type=\"text\"/ id=\"newComment\"><button class=\"btn-primary addMoreAddress center-block\">Add New Address</button>";

            // Put list on the html
            $("#viewAddressDetails").html(content);
            $("#viewAddressDetails").hide().show("normal");


            // Add dmore address
            add_more_address(territory);
            
            // Delete a via
            delete_territory_address_via(territory);
            
            // Update details
            update_address_details(territory);
            
        }); // END OF getJSON
          
}

// Add new address to territory
function add_more_address(territory) {
    $(".addMoreAddress").on("click", function() {
        var newVia = $("#newVia").val();
        var newIntercom = $("#newIntercom").val();
        var newCOmment = $("#newComment").val();
        
        // Check if via is empty
        if(newVia == "") {
            var status = "Please specify the address.";
            showStatusBox(status);
            chooseNo();
        }
        else {
            // Show the dialog box
            showDialogBox();
            
            // If yes is clicked, delete user and his territories
            $("#yesButton").on("click", function() {  
                // Remove dialog box
                $("#message_box").fadeOut("fast");

                // User data to be passed on database
                var address_data = {
                    territoryID: territory,
                    via: newVia,
                    intercom: newIntercom,
                    comment: newCOmment};

                // API URL
                var url = "db/add_new_address.php";

                $.post(url, address_data, function (data) {

                    showStatusBox(data);
                    $("#message_box").fadeIn("fast");
                    // IF OK IS CLICKED
                    chooseNo();
                    view_address_details(territory);
                });   
                

            }); // END OF ON CLICK ON YES BUTTON
            
            chooseNo();
        }
      
    }); // END OF ADD MORE ADDRESS ONCLICK
}





function delete_territory_address_via(territory) {
    
    $(".delete_address__button").on("click", function() {
        // Get the value of the id column in the row of the clicked button
        var id = $(this).closest('tr').children('td.viaId').text();
        
        showDialogBox();
        
        // If yes is clicked, delete user and his territories
        $("#yesButton").on("click", function() {  
            // Remove dialog box
            $("#message_box").fadeOut("fast");
            
            // User data to be passed on database
            var address_data = {
                id: id,
                territory: territory};

            // API URL
            var url = "db/delete_address.php";
            
            $.post(url, address_data, function (data) {
                
                showStatusBox(data);
                $("#message_box").fadeIn("fast");
                // IF OK IS CLICKED
                chooseNo();
                view_address_details(territory);
            });    
        
        }); // END OF ON CLICK ON YES BUTTON
              
        // If no is clicked
        chooseNo();
        
        
                           
    }); // END OF IF DELETE BUTTON IS CLICKED
    
    
}


// Update Address Details
function update_address_details(territory) {
    $(".update_button").on("click", function() {
      
        // Loading iamge
        $("#update_form").html("<div class=\"loadingImage\"> <img alt=\"Circle loading images.\" class=\"center-block\" src=\"../images/logo/loading_image.gif\"/></div>");
        
        // Blur background
        $("#admin_pages").css("filter","blur(5px)");
        // Disable all input elements
        $("#admin_pages :input").attr("disabled", true);
        
        // Get the value of the id column in the row of the clicked button
        var id = $(this).closest('tr').children('td.viaId').text();
        
        // Show the update box
        $("#update_form").show("normal");  
        
        // Go to the list of territory address details
        $('html, body').animate({
                                scrollTop: $("#update_form").offset().top
                                }, 600);
        
               
        
        // API URL
        var url = "db/update_address.php";
        
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
                
                content += "<label>Via</label><input value=\""+via+"\" type=\"text\" id=\"updateVia\"/><label>Intercom</label><input value=\""+intercom+"\" type=\"text\" id=\"updateIntercom\"/> <label>Comment</label><input value=\""+comment+"\" type=\"text\" id=\"updateComment\"/> <input type=\"submit\" class=\"btn btn-success updateAddressDetailsButton\"/>";

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
    
    }); // END OF CLICK
    
}



// If update button is clicked
function apply_changes(territory, id) {
    $(".updateAddressDetailsButton").on("click", function() {
           
        var newVia = $("#updateVia").val();
        var newIntercom = $("#updateIntercom").val();
        var newCOmment = $("#updateComment").val();
        
        // Check if via is empty
        if(newVia == "") {
            var status = "Please specify the address.";
            showStatusBox(status);
            chooseNo();
        }
        else {
            // Show the dialog box
            showDialogBox();
            
            // If yes is clicked, delete user and his territories
            $("#yesButton").on("click", function() {  
                // Remove dialog box
                $("#message_box").fadeOut("fast");

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

                    showStatusBox(data);
                    $("#message_box").fadeIn("fast");
                    // IF OK IS CLICKED
                    chooseNo();
                    
                    // Reload details
                    view_address_details(territory);
                });   
               
                // Close the form
                close_form();
            
            }); // END OF ON CLICK ON YES BUTTON
            
            chooseNo();
        }
             
    });// END OF IF SUBMIT IS CLICKED
}


function close_form() {
            // Hide update form
            $("#update_form").hide("normal");
            
            // Remove blur background
            $("#admin_pages").css("filter","blur(0px)");
            // Enable all input elements
            $("#admin_pages :input").attr("disabled", false);
            
    
}


// DELETE TERRITORY
function delete_territory_address() {
    
    // When delete button is clicked
    $(".delete_territory_table_button").on("click", function() {
        
        showDialogBox();
        
        // Get ID of the closest 'tr' which is the row where the button is in
        var territory = $(this).closest("li").attr("id");
        
        // If yes is clicked, delete user and his territories
        $("#yesButton").on("click", function() {  
            // Remove dialog box
            $("#message_box").fadeOut("fast");
            
            // User data to be passed on database
            var territory_data = {territory: territory};

            // API URL
            var url = "db/delete_address_table.php";
            
            $.post(url, territory_data, function (data) {
                
                showStatusBox(data);
                $("#message_box").fadeIn("fast");
                // IF OK IS CLICKED
                chooseNo();
            });    
        
            $("#viewAddressDetails").hide("normal");
            
        }); // END OF ON CLICK ON YES BUTTON
              
        // If no is clicked
        chooseNo();
            
    }); //END OF DELETE BUTTON
    
    
} // END OF DELETE TERRITORY ADDRESS FUNCTION


// Edit selected territory address
function addAddressDetails() {
   
}


// ADD TERRITORY ADDRESS TABLE
function add_territory_address(territory) {
    
    
    // User data to be passed on database
    var territory_data = { territory: territory };
    
    // API URL
    var url = "db/create_address_table.php";
    
    $.post(url, territory_data, function (data) {
        
        showStatusBox(data);
    
        // IF OK IS CLICKED
        chooseNo();
    });
    
    // Update user info list and clear fields
    clearFields();
    
}



function territoryAddressLoadingImage() {
    $("#viewAddressDetails").html("<div class=\"loadingImage\"> <img alt=\"Circle loading images.\" class=\"center-block\" src=\"../images/logo/loading_image.gif\"/></div>");
}


















