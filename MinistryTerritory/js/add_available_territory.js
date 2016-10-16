

function get_Available_Territory() {

    $("#available_list").html("<div class=\"loadingImage\"> <img alt=\"Circle loading images.\" src=\"images/logo/loading_image.gif\"/></div>");
    // API URL
    var url = "db/get_available_territory.php";
    var content = "";
    $.getJSON(url, function (data) {
        
        $.each(data.territory, function (i, result) {

            var territoryName = "Territory " + result._id + " - " + result.name;
            var territoryNumber = result._id;
            var territoryID = result._id + "_myTerritory";

             /* Create list details (imags, titles) */
             var createListItemDetails = "<div class=\"my_list_details\"> <img src=\"images/territory_photo/" + territoryNumber + ".jpg\"/> <h4> </h4> <button id=\""+territoryNumber+"\" class=\"get_btn btn btn-success center-block btn-group-lg\"> Take </button> </div>";

            /* Create List Items with details*/
            var createListItem = "<li class=\"list_item\" id=\"" + territoryID + "\"><h2>" + territoryName + createListItemDetails + "</h2></li>";

            content += createListItem;
            //Hide loading image
        }); // EMD OF EACH
        
        
        // Put list on the html
        $("#available_list").html(content);
        
        // Hide list details
        $(".my_list_details").hide();
        
    }); // END OF getJSON

}





    







