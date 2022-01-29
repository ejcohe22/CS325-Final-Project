// Names: Samuel Munoz
// Names: Erik Cohen
// Purpose: To handle events on the

$(document).ready(function(){
    fill_class_select();

    // sends form data to update_project.php to create a new developer
    $("#add-dev").click(function(){
        const first = $("#fname").val();
        const last = $("#lname").val();
        const class_year = $("#class").val();
        // alert(first + " " +  last + " " +  typeof(parseInt(class_year)));
        $.post("update_project.php", {"fname": first, "lname": last, "year": parseInt(class_year)}, function(data, status) {
            console.log(status);
            if(status == "success") {
                console.log(data);
                alert("succesfully added developer: " + first + " " + last + " '" + class_year.substring(2,4));
            } else {
                console.log("an error has occured");
            }
        });
    });

    // sends form data to add_admin.php to create a new adminstrator
    $("#add-admin").click(function(){
        const uremail = $("#email").val();
        const secret = $("#password").val();
        $.ajax({
            type: 'POST',
            url: "add_admin.php",
            data: {
                email: uremail,
                password: secret
            },
            success: function(data){
                alert("succesfully added new admin ");
            }
            });
    });
});

// adds all class year options to the create developer form
function fill_class_select() {
    const this_year = new Date().getFullYear();
    for (let i = 0; i < 4; i++) {
        var year = this_year + i;
        var element = "<option value=" + year + ">" + year + "</option>";
        $("#class").append(element);
      }
}
