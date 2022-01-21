$(document).ready(function() {
    $.get("start_session.php", {}, function(data, status) {
        if(status == "successful") {
            console.log("database connected successfully");
        }
        else {
            console.log("database did not connect successfully");
        }
    });
});
