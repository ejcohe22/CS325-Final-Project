// Names: Samuel Munoz
// Names: Erik Cohen

$(document).ready(function(){
    $("#add_backend").click(function(){
        var structure = '<div><input class="project-backend" type="text" name="backend[]" placeholder="Enter a back-end tool used" /> <i class="fa fa-times-circle delete-field"> remove</i><br /></div>';
        $("#back_end_tools").append(structure);
    });

    $("#add_frontend").click(function(){
        var structure = '<div><input class="project-frontend" type="text" name="frontend[]" placeholder="Enter a front-end tool used" /> <i class="fa fa-times-circle delete-field"> remove</i><br /></div>';
        $("#front_end_tools").append(structure);
    });

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

    $(document).on('click', '.delete-field', function(){
        $(this).parent().remove(); 
    });
});

    // $("form").submit(function( event ) {
    //     var developers = [];
    //     $("#developer-list").children('p').each(function(){
    //         developers.push( $(this).text().slice(0, -8) );
    //     })
    //     var serialized = $(this).serializeArray();
    //     const formdata= {
    //         "name" : serialized[0]['value'],
    //         "db" : serialized[1]['value'],
    //         "frontend" : serialized[2]['value'],
    //         "backend" : serialized[3]['value'],
    //         "year" : serialized[4]['value'],
    //         "class" : serialized[5]['value'],
    //         "description" : serialized[6]['value'],
    //         "developers": developers
    //     }
    //     console.log(formdata);
    //     event.preventDefault();
    //   });
//});
