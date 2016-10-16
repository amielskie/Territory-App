function display_records() {
    $("#records_div").html("<div class=\"loadingImage\"> <img alt=\"Circle loading images.\" src=\"../images/logo/loading_image.gif\"/></div>");
    
     var tableHead = "<tr><th>Taken By</th><th>Territory Number</th><th>Date Taken</th><th>Date Returned</th></tr>";
    
    // API URL
    var url = "db/get_records.php";
    
    // Open Table
    var content = "<table>";
    
    $.getJSON(url, function (data) {
        // Create the table headers
        content += tableHead;
        
        $.each(data.records, function (i, result) {

            var takenBy = result.taken_by;
            var territory = result.territory;
            var dateTaken = result.date_taken;
            var dateReturned = result.date_returned;
            
            // PUT THIS VAR IN FOR EACJ
            var info_list = "<tr> <td>"+takenBy+"</td><td>"+territory+"</td><td>"+dateTaken+"</td><td>"+dateReturned+"</td></tr>";

            // Add user info to the list
            content += info_list;
            
        }); // EMD OF EACH
        
        // Close the table
        content += "</table> <button class=\"btn btn-danger pull-right clearRecords\">Clear Records</button>";
        
        // Put list on the html
        $("#records_div").html(content);
        
        // Clear records
        clear_records();
   
    }); // END OF getJSON
}

// Clear updates
function clear_records() {
    $(".clearRecords").on("click", function() {
        
        
        showDialogBox();
        
        // If yes is clicked, delete user and his territories
        $("#yesButton").on("click", function() {  
            // Remove dialog box
            $("#message_box").fadeOut("fast");


            // API URL
            var url = "db/clear_records.php";
            
            $.post(url, function (data) {
                
                showStatusBox(data);
                $("#message_box").fadeIn("fast");
                // IF OK IS CLICKED
                chooseNo();
            });
                 
       display_records();
        
        }); // END OF ON CLICK ON YES BUTTON
              
        // If no is clicked
        chooseNo();
        
    }); // END OF ONCLICK
}
