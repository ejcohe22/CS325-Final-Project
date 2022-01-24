$(document).ready(function(){
    $("#add_backend").click(function(){
        var structure = '<div><input class="project-backend" type="text" placeholder="Enter a back-end tool used" /> <i class="fa fa-times-circle delete-field"> remove</i><br /></div>';
        $("#back_end_tools").append(structure);
    });

    $("#add_frontend").click(function(){
        var structure = '<div><input class="project-frontend" type="text" placeholder="Enter a front-end tool used" /> <i class="fa fa-times-circle delete-field"> remove</i><br /></div>';
        $("#front_end_tools").append(structure);
    });

    $("#add_developer").click(function(){
        var developer = $('#developer_select').find(":selected").text();
        var structure = '<p class="developer">' + developer + ' <i class="fa fa-times-circle delete-field"> remove</i></p>';
        $("#developer-list").append(structure);
    });

    $(document).on('click', '.delete-field', function(){
        $(this).parent().remove(); 
    });

    $("form").submit(function( event ) {
        console.log( $(this).serializeArray() );
        event.preventDefault();
      });
});