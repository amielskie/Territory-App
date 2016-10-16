            /** ------------------- SHOW LIST DETAILS CONTROL ---------- */
            // Show and Hide my_list_details
            $("#my_list .list_item").click(function() {
                // GET THE ID of the list item that was clicked
                var list_item_id = this.id;

                // Show the div element of the list_item element's div (my_list_details)
                $("#"+list_item_id+(" div")).toggle();

                // Scroll down to the map location 
                $('html, body').animate({
                                scrollTop: $("#"+list_item_id).offset().top
                                }, 600);
            });// END OF CLICK

            
            $(".return_btn").click(function() {
                alert();
            });// END OF CLICK