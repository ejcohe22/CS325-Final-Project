// Names: Samuel Munoz
// Names: Erik Cohen

$(document).ready(function(){
    // password reveal button
    $("#reveal").click(function(){
        if('password' == $('#password').attr('type')){
            $('#password').prop('type', 'text');
       }else{
            $('#password').prop('type', 'password');
       }
    });

    // sends form data to database to check if the user data matches stored adminstrators info
    $("#submit").click(function() {
        $.ajax({
            url: 'authenticate.php',
            type: 'post',
            success: function() {
                //make admin
            },
            error: function(xhr){
                console.log("bad");
                alert("An error occured: " + xhr.status + " " +
                       xhr.statusText);
            }
        });
    });
})
