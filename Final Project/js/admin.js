function fill_class_select() {
    const this_year = new Date().getFullYear();
    for (let i = 0; i < 4; i++) {
        var year = this_year + i;
        var element = "<option value=" + year + ">" + year + "</option>";
        $("#class").append(element);
      }
}

$(document).ready(function(){
    fill_class_select();
    $("#add-dev").click(function(){
        const first = $("#fname").val();
        const last = $("#lname").val();
        const class_year = $("#class").val();
        console.log(first, last, class_year);
        $.ajax({
            type: 'POST',
            url: "add_dev.php",
            data: {
                fname: first,
                lname: last,
                year: class_year
            },
            success: function(data){
                alert("succesfully added developer: " + first + " " + last + " '" + class_year.substring(2,4));
            }
            });
    });

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
