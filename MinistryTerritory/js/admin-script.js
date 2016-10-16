$(".edit_user_form").hide();

$("#edit_user_btn").click(function() {
    $("#edit_user_btn").slideUp("normal");
    $("#edit_user_name").disabled;
    $(".edit_user_form").slideDown("normal");
});// END OF CLICK