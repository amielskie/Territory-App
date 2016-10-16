
// Get territory from database
function return_Territory(territoryNumber) {
    
    // Username 

    var cookie = document.cookie;              
    var cookie_value = cookie.substring((cookie.lastIndexOf("name=")+5),cookie.length);
    var cleaned_cookie = cookie_value.substring(0, cookie_value.lastIndexOf(";"));
    // API URL

    //FOR LIVE SERVER 
    //var username_data = {username : cleaned_cookie,territory : territoryNumber};

    // FOR LOCALHOST
    var username_data = {username : cookie_value, territory : territoryNumber};

    // API URL
    var url = "db/return_territory.php";
    
    $.post(url, username_data, function (data) {
        // Blur background
        $("#territory_pages").addClass("blur_all");    
        showStatusBox(data);
    });
    
    add_User_Territory();
}

// Return territory to database
function get_Territory(territoryNumber) {
    
    // Username 

    var cookie = document.cookie;              
    var cookie_value = cookie.substring((cookie.lastIndexOf("name=")+5),cookie.length);
    var cleaned_cookie = cookie_value.substring(0, cookie_value.lastIndexOf(";"));
    // API URL

    //FOR LIVE SERVER 
    //var username_data = {username : cleaned_cookie,territory : territoryNumber};

    // FOR LOCALHOST
    var username_data = {username : cookie_value, territory : territoryNumber};

    // API URL
    var url = "db/take_territory.php";
    
    $.post(url, username_data, function (data) {
        // Blur background
        $("#territory_pages").addClass("blur_all");
        showStatusBox(data);
    });
    
    get_Available_Territory();
}

// Generate a dialog box
function showDialogBox(button_id, action) {
    // Add the yes or no box
                $("#message_box").html("<div id=\"status_box\" class=\"container\"> <h3>Are you sure you want to "+action+" Territory "+button_id+"?</h3> <button type=\"submit\" id=\"yesButton\" class=\"btn btn-success\">Yes</button> <button type=\"submit\" id=\"noButton\" class=\"btn btn-danger\">No</button> </div>");
}

// Status box
function showStatusBox(status) {
    // Add the yes or no box
                $("#message_box").html("<div id=\"status_box\" class=\"container\"> <h4>"+status+"</h4>  <button type=\"submit\" id=\"noButton\" class=\"btn btn-success\">Okay</button> </div>");
}