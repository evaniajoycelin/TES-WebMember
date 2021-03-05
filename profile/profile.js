$( document ).ready(function() {
    $("#bisnis").click(function(e){
        e.preventDefault()
        $("#bisnis").addClass("active");
        $("#profile").removeClass("active");
    });
 });