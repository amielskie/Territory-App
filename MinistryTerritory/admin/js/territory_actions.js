// Show all territory info
function display_territory_info() {
    
    territoryLoadingImage();
    
    var tableHead = "<tr><th>Territory Number</th><th> Name</th><th>Date Taken</th><th>Date Returned</th><th>Current Owner</th><th>Last Owner</th><th>Pending</th><th>Taken</th></tr>";
    
    // API URL
    var url = "db/get_all_territory.php";
    
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
            var owner = result.taken_by;
            var lastOwner = result.last_owner;
            var pending = result.pending;
            var taken = result.taken;
            
            if (pending == 0) {
                pending = "No";
            } else { pending = "Yes";}
            
            // PUT THIS VAR IN FOR EACJ
            var info_list = "<tr id=\""+number+"\"> <td>"+number+"</td><td>"+name+"</td><td>"+dateTaken+"</td><td>"+dateReturned+"</td><td>"+owner+"</td><td>"+lastOwner+"</td><td>"+pending+"</td><td>"+taken+"</td><td></td><td><button class=\"btn-danger delete_button \">Delete</button></td></tr>";

            // Add user info to the list
            content += info_list;
            
        }); // EMD OF EACH
        
        // Close the table
        content += "</table>";
        
        // Put list on the html
        $("#territory_info_div").html(content);
        
        
        // DELETE USER
        delete_territory();
        
        // EDIT USER

        
    }); // END OF getJSON
    
}

// Add territories
function add_territory(id, territoryName, owner) {
    
    // User data to be passed on database
    var username_data = {
        id: id, 
        territoryName : territoryName,
        owner: owner
    };
    
    // API URL
    var url = "db/add_territory.php";
    
    $.post(url, username_data, function (data) {
        
        showStatusBox(data);
    
        // IF OK IS CLICKED
        chooseNo();
    });
    
    // Update user info list and clear fields
    clearAddTerritoryFields();
} // END OF ADD TERRITORY


// DELETE TERRITORY
function delete_territory() {
    
    // When delete button is clicked
    $(".delete_button").on("click", function() {
        
        showDialogBox();
        
        // Get ID of the closest 'tr' which is the row where the button is in
        var id = $(this).closest("tr").attr("id");
        
        // If yes is clicked, delete user and his territories
        $("#yesButton").on("click", function() {  
            // Remove dialog box
            $("#message_box").fadeOut("fast");
            
            // User data to be passed on database
            var username_data = {id: id};

            // API URL
            var url = "db/delete_territory.php";
            
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
    
    
} // END OF DELETE TERRITORY FUNCTION


function clearAddTerritoryFields() {
    $("#addTerritoryId").val("");
    $("#addTerritoryName").val("");
    $("#addOwner").val("");
}

function territoryLoadingImage() {
    $("#territory_info_div").html("<div class=\"loadingImage\"> <img alt=\"Circle loading images.\" src=\"../images/logo/loading_image.gif\"/></div>");
}