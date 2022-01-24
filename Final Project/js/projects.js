
let frontend = [];
let backend = [];
let database = [];
$(document).ready(function(){
    //filter open
    $("#filter-btn").click(function(){
        $(".filters").css("display", "block");
        $("#filter-btn").css("display", "none");
    })
    //filter close
    $("#close-filter").click(function(){
        $(".filters").css("display", "none");
        $("#filter-btn").css("display", "block");
    })

    //dynamically get filter value
    $(':checkbox').click(function(){
        let keyval = this.value.split("-");
        if(this.checked) {
            console.log(this.value);
            if( keyval[0] == "db" && !database.includes(keyval[1]) ) {
                database.push(keyval[1]); 
            } else if( keyval[0] == "frontend" && !frontend.includes(keyval[1])) {
                frontend.push(keyval[1]); 
            } else if( keyval[0] == "backend" && !backend.includes(keyval[1]) ) {
                backend.push(keyval[1]); 
            }
        } else {
            if( keyval[0] == "db" && database.includes(keyval[1]) ) {
                database.splice(keyval[1], 1); 
            } else if( keyval[0] == "frontend" && frontend.includes(keyval[1])) {
                frontend.splice(keyval[1], 1); 
            } else if( keyval[0] == "backend" && backend.includes(keyval[1]) ) {
                backend.splice(keyval[1], 1); 
            }
            console.log("deselected " + this.value);
        }

        // make query to database
        $.post("make_query.php", {"db": database, "frontend": frontend, "backend": backend}, create_card);

        // console.log(database);
        // console.log(frontend);
        // console.log(backend);
    });


});

function create_card(data, status) {
    if(status == "success") {
        console.log(data);
    } else {
        console.log("error occured. please run query again");
    }
}
