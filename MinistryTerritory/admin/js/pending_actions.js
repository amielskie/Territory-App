function display_pending_territories() {
    $("#pending_territories_div").html("<div class=\"loadingImage\"> <img alt=\"Circle loading images.\" src=\"../images/logo/loading_image.gif\"/></div>");
    
     var tableHead = "<tr><th>Number</th><th>Territory Name</th><th>Date Taken</th><th>Date Returned</th><th>Last Owner</th></tr>";
    
    // API URL
    var url = "db/get_pending_territories.php";
    
    // Open Table
    var content = "<table>";
    
    $.getJSON(url, function (data) {
        // Create the table headers
        content += tableHead;
        
        $.each(data.territories, function (i, result) {

            var number = result._id;
            var name = result.name;
            var dateTaken = result.date_taken;
            var dateReturned = result.date_returned;
            var lastOwner = result.last_owner;
            
            // PUT THIS VAR IN FOR EACJ
            var info_list = "<tr id=\""+number+"\"> <td>"+number+"</td><td>"+name+"</td><td>"+dateTaken+"</td><td>"+dateReturned+"</td><td>"+lastOwner+"</td><td><button class=\"btn-success set_available_button\">Set Available</button></td></tr>";

            // Add user info to the list
            content += info_list;
            
        }); // EMD OF EACH
        
        // Close the table
        content += "</table>";
        
        // Put list on the html
        $("#pending_territories_div").html(content);
        
        // SET AVAILABLE
        setAvailable();
        
    }); // END OF getJSON
}
    
// SET TERRITORIES AVAILABLE
function setAvailable() {
    
    // When delete button is clicked
    $(".set_available_button").on("click", function() {
        
        showDialogBox();
        
        // Get ID of the closest 'tr' which is the row where the button is in
        var id = $(this).closest("tr").attr("id");
        
        // If yes is clicked, delete user and his territories
        $("#yesButton").on("click", function() {  
            // Remove dialog box
            $("#message_box").fadeOut("fast");
            
            // User data to be passed on database
            var territory_data = {id: id};

            // API URL
            var url = "db/set_available.php";
            
            $.post(url, territory_data, function (data) {
                showStatusBox(data);
                $("#message_box").fadeIn("fast");
                // IF OK IS CLICKED
                chooseNo();
            });    
        
        }); // END OF ON CLICK ON YES BUTTON
          
        // If no is clicked
        chooseNo();
            
    }); //END OF DELETE BUTTON
}