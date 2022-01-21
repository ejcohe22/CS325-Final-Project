$(document).ready(function() {
    $.get("connect_db.php", {}, connect_to_db);
});

function connect_to_db(data, status) {
    if(status == "success") {
        console.log("database has connected sucessfully");
    }
    else {
        console.log(data);
    }
}
