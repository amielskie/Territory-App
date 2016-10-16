// Invoke funtions
add_announcement();

function display_updates() {
    $("#updates_div").html("<div class=\"loadingImage\"> <img alt=\"Circle loading images.\" src=\"../images/logo/loading_image.gif\"/></div>");
   
     var tableHead = "<tr><th>Message</th><th>Date</th></tr>";
    
    // API URL
    var url = "db/get_page_updates.php";
    
    // Open Table
    var content = "<table>";
    
    $.getJSON(url, function (data) {
        // Create the table headers
        content += tableHead;
        
        $.each(data.records, function (i, result) {

            var message = result.message;
            var date = result.date;
            var type = result.type;
            
            switch(type) {
                case "1":
                    type = "viaComment";
                    break;
                    
                case "2":
                    type = "generalComment";
                    break;
                    
                case "3":
                    type = "territoryTaken";
                    break;
                    
                case "4":
                    type = "territoryReturned";
                    break;
            } // END OF SWITCH
            
            // PUT THIS VAR IN FOR EACJ
            var info_list = "<tr class=\""+type+"\"> <td>"+message+"</td><td>"+date+"</td></tr>";

            // Add user info to the list
            content += info_list;
            
        }); // EMD OF EACH
        
        // Close the table
        content += "</table> <button class=\"btn btn-danger pull-right clearUpdates\">Clear Updates</button>";
        
        // Put list on the html
        $("#updates_div").html(content);
        
        // Clear updates
        clear_updates();
   
    }); // END OF getJSON
}


// Clear updates
function clear_updates() {
    $(".clearUpdates").on("click", function() {
        
        
        showDialogBox();
        
        // If yes is clicked, delete user and his territories
        $("#yesButton").on("click", function() {  
            // Remove dialog box
            $("#message_box").fadeOut("fast");


            // API URL
            var url = "db/clear_updates.php";
            
            $.post(url, function (data) {
                
                showStatusBox(data);
                $("#message_box").fadeIn("fast");
                // IF OK IS CLICKED
                chooseNo();
            });
                 
       display_updates();
        
        }); // END OF ON CLICK ON YES BUTTON
              
        // If no is clicked
        chooseNo();
        
    }); // END OF ONCLICK
}

// Add Announcements
// Add new address to territory
function add_announcement() {
    $("#addAnnouncement").on("click", function() {
        var title = $("#announcementTitle").val();
        var message = $("#announcementMessage").val();
        
        // Check if via is empty
        if(title == "" || message == "") {
            var status = "Please fill out all the empty fields.";
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
                var announcement_data = {
                    title: title,
                    message: message };

                // API URL
                var url = "db/add_announcement.php";

                $.post(url, announcement_data, function (data) {

                    showStatusBox(data);
                    $("#message_box").fadeIn("fast");
                    // IF OK IS CLICKED
                    chooseNo();
                });   
                
                $("#announcementTitle").val("");
                $("#announcementMessage").val("");
            }); // END OF ON CLICK ON YES BUTTON
            
            chooseNo();
        }
      
    }); // END OF SUBMIT ANNOUNCEMENT BUTTON CLICKED
}







