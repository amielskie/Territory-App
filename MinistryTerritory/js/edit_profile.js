// Execute edit profile funtion
edit_profile();

function edit_profile() {
    $("#editProfileLink").on("click", function() {
       
        // Set data to pass to server
        var username_data = {username : getUsername()};
        var username = getUsername();
        
        // Generate loading iamge
        $("#edit_profile").html("<div class=\"loadingImage\"> <img alt=\"Circle loading images.\" src=\"images/logo/loading_image.gif\"/></div>");


        // Blur background
        $("#territory_pages").css("filter","blur(5px)");
        // Disable all input elements
        $("#territory_pages :input").attr("disabled", true);
        
        // Show edit profile box
        $("#edit_profile").show();
        
        // Scroll to the my_territory element automatically
        $('html, body').animate({
            scrollTop: $("#edit_profile").offset().top
            }, 600);
        
            
        // API URL
        var url = "db/get_profile_to_edit.php";
        
        // Open Table
        var content = "<h2>Edit Profile <span class=\"glyphicon glyphicon-remove pull-right close_edit_profile \"</span></h2>";
        
         
        $.getJSON(url, username_data, function (data) {
           
            $.each(data.profile, function (i, result) {
                 
                var email = result.email;
                var phone = result.phone;

                /* Show user data */
                content += "<label>Email</label><input value=\""+email+"\" type=\"text\" id=\"editEmail\" /> <label>Phone</label> <input value=\""+phone+"\" type=\"text\" id=\"editPhone\" /><input type=\"submit\" value=\"Save\" class=\"btn btn-success saveUserInfo\"/>";

            }); // EMD OF EACH
            
            // Put list on the html
            $("#edit_profile").html(content);
            
            // Apply changes
            apply_profile_changes(username);
            
            // When the x buttons i clicked close the form
            $(".close_edit_profile").on("click", function() {
                close_edit_profile();
            }); // END OF CLOSE UPDATE FORM 
            
            
        }); // END OF getJSON 
        
        
        
    }); // END OF ON CLICK EDIT PROFILE
}


// If save button is clicked
function apply_profile_changes(username) {
    $(".saveUserInfo").on("click", function() {
           
        var newEmail = $("#editEmail").val();
        var newPhone = $("#editPhone").val();
        
                // User data to be passed on database
                var profile_data = {
                    username: username,
                    email: newEmail,
                    phone: newPhone
                    };

                // API URL
                var url = "db/update_profile_details.php";

                $.post(url, profile_data, function (data) {

                    updateStatusBox(data);
                    $("#message_box").fadeIn("fast");
                    // IF OK IS CLICKED      
                });   
               
                // Close the form
                close_edit_profile();
        
             
    });// END OF IF SUBMIT IS CLICKED
}



function close_edit_profile() {
            // Hide update form
            $("#edit_profile").hide("normal");
            
            // Remove blur background
            $("#territory_pages").css("filter","blur(0px)");
            // Enable all input elements
            $("#territory_pages :input").attr("disabled", false);  
}