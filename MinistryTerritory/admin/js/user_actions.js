// Show all user info
function display_user_info() {
    
    loadingImage();
    
    var tableHead = "<tr><th>Name</th><th>Last Name</th><th>Email</th><th>Phone</th><th>Username</th><th>Password</th><th>Territories</th></tr>";
    
    // API URL
    var url = "db/get_all_user_data.php";
    
    // Open Table
    var content = "<table>";
    
    $.getJSON(url, function (data) {
        // Create the table headers
        content += tableHead;
        
        $.each(data.users, function (i, result) {

            var username = result.username;
            var password = result.password;
            var name = result.name;
            var lastName = result.last_name;
            var email = result.email;
            var phone = result.phone;
            var territories = result.territory;
            
            // PUT THIS VAR IN FOR EACJ
            var info_list = "<tr id=\""+username+"\"> <td>"+name+"</td><td>"+lastName+"</td><td>"+email+"</td><td>"+phone+"</td><td>"+username+"</td><td>"+password+"</td><td>"+territories+"</td><td><button class=\"btn-danger delete_button \">Delete</button></td></tr>";

            // Add user info to the list
            content += info_list;
            
        }); // EMD OF EACH
        
        // Close the table
        content += "</table>";
        
        // Put list on the html
        $("#user_info_div").html(content);
        
        
        // DELETE USER
        delete_user();
        
        // EDIT USER

        
    }); // END OF getJSON
}

// DELETE USER
function delete_user() {
    
    // When delete button is clicked
    $(".delete_button").on("click", function() {
        
        showDialogBox();
        
        // Get ID of the closest 'tr' which is the row where the button is in
        var username = $(this).closest("tr").attr("id");
        
        // If yes is clicked, delete user and his territories
        $("#yesButton").on("click", function() {  
            // Remove dialog box
            $("#message_box").fadeOut("fast");
            
            // User data to be passed on database
            var username_data = {user_name: username};

            // API URL
            var url = "db/delete_user.php";
            
            $.post(url, username_data, function (data) {
                
                showStatusBox(data);
                $("#message_box").fadeIn("fast");
                // IF OK IS CLICKED
                chooseNo();
            });    
        
        }); // END OF ON CLICK ON YES BUTTON
              
        // If no is clicked
        chooseNo();
            
    }); //END OF DELETE BUTTON
    
    
} // END OF DELETE USER FUNCTION

// Add users 
function add_user(name, lastName, email, phone, territory) {
    
    // Set default value for territory
    if(territory == "") {
        territory = 0;
    }
    
    // User data to be passed on database
    var username_data = {
        name: name, 
        lastName : lastName,
        email: email,
        phone: phone,
        territory: territory
    };
    
    // API URL
    var url = "db/add_user.php";
    
    $.post(url, username_data, function (data) {
        
        showStatusBox(data);
    
        // IF OK IS CLICKED
        chooseNo();
    });
    
    // Update user info list and clear fields
    clearFields();
}

// Generate a dialog box
function showDialogBox() {
    $("#admin_pages").addClass("blur_all");
    $("#message_box").fadeIn("fast");
    // Add the yes or no box
    $("#message_box").html("<div id=\"status_box\" class=\"container\"> <h3>Are you sure?</h3> <button type=\"submit\" id=\"yesButton\" class=\"btn btn-success\">Yes</button> <button type=\"submit\" id=\"noButton\" class=\"btn btn-danger\">No</button> </div>");
    $('html, body').animate({
                                scrollTop: $("#message_box").offset().top
                                }, 600);
}

// Status box
function showStatusBox(status) {
    $("#admin_pages").addClass("blur_all");
    $("#message_box").fadeIn("fast");
    // Add the yes or no box
    $("#message_box").html("<div id=\"status_box\" class=\"container\"> <h4>"+status+"</h4>  <button type=\"submit\" id=\"noButton\" class=\"btn btn-success\">Okay</button> </div>");
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
    display_user_info();
    display_pending_territories();
    display_territory_info();
    display_territory_address_info();

}

// remove dialog box
function removeDialog() {
    $("#message_box").fadeOut("fast");
    $("#admin_pages").removeClass("blur_all");
}

function clearFields() {
    $("#addName").val("");
    $("#addLastName").val("");
    $("#addEmail").val("");
    $("#addPhone").val("");
    $("#addTerritory").val("");
    $("#addTerritoryAddressId").val("");
}

function loadingImage() {
    $("#user_info_div").html("<div class=\"loadingImage\"> <img alt=\"Circle loading images.\" src=\"../images/logo/loading_image.gif\"/></div>");
}


            
