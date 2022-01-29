// Names: Samuel Munoz
// Names: Erik Cohen
// Purpose: To add javascript code to 

$(document).ready(function(){
    // this handles the click event when the "Add more Back-End Tools" button is pressed
    // it adds the correct HTML elements under the Back-End selection
    $("#add_backend").click(function(){
        var structure = '<div><input class="project-backend" type="text" name="backend[]" placeholder="Enter a back-end tool used" /> <i class="fa fa-times-circle delete-field"> remove</i><br /></div>';
        $("#back_end_tools").append(structure);
    });

    // this handles the click event when the "Add more Front-End Tools" button is pressed
    // it adds the correct HTML elements under the Front-End selection
    $("#add_frontend").click(function(){
        var structure = '<div><input class="project-frontend" type="text" name="frontend[]" placeholder="Enter a front-end tool used" /> <i class="fa fa-times-circle delete-field"> remove</i><br /></div>';
        $("#front_end_tools").append(structure);
    });

    // this handles the click event when the "Add developer" button is pressed
    // it adds the correct HTML elements under the Developer selection
    $("#add_developer").click(function(){
        var developer = $('#developer_select').find(":selected").text();
        var dev_id = $('#developer_select').val();
        var structure = '<p class="developer">' + developer 
        + ' <i class="fa fa-times-circle delete-field"> remove</i>' 
        + "<input type='hidden' name='devs[]' value='" + dev_id + "' /><br />" 
        + '<label class="indent" for="developer-role">Role: &nbsp;</label>'
        + '<input class="developer-role" name="devrole[]" type="text" placeholder="Developer Role" /> </p>';
        $("#developer-list").append(structure);
    });

    // removes elements of the form that are not wanted
    $(document).on('click', '.delete-field', function(){
        $(this).parent().remove(); 
    });
});
