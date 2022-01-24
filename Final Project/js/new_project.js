$(document).ready(function(){
    $("#add_frontend").click(function(){
        var structure = '<input class="project-frontend" type="text" placeholder="Enter a front-end tool used" /> <i class="fa fa-times-circle delete-field"> remove</i><br />';
        $("#front_end_tools").append(structure);
    });

    $(".delete-field").click(function(){
        console.log("click");
    });

    $("form").submit(function( event ) {
        console.log( $(this).serializeArray() );
        event.preventDefault();
      });
});