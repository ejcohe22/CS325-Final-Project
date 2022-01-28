// Names: Samuel Munoz
// Names: Erik Cohen

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
        
    $.post("make_query.php", {"db": database, "frontend": frontend, "backend": backend}, create_card);

    //dynamically get filter value
    $(':checkbox').click(function(){
        $('#grid').empty();
        let keyval = this.value.split("-");
        console.log(keyval);
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
                database.splice(database.indexOf(keyval[1]), 1); 
            } else if( keyval[0] == "frontend" && frontend.includes(keyval[1])) {
                frontend.splice(frontend.indexOf(keyval[1]), 1); 
            } else if( keyval[0] == "backend" && backend.includes(keyval[1]) ) {
                backend.splice(backend.indexOf(keyval[1]), 1); 
            }
            console.log("deselected " + this.value);
        }

        // make query to database
        $.post("make_query.php", {"db": database, "frontend": frontend, "backend": backend}, create_card);
    });
});

function create_card(data, status) {
    if(status == "success") {
        let projects = [];
        let frontend = [];
        let backend = [];
        let devs = [];
        let rows = data.split("\n");
        rows = rows.slice(1, rows.length-1);
        for(let row = 0; row < rows.length-1; row += 4) {
            projects[row / 4] = rows[row].split(",");
            frontend[row / 4] = rows[row + 1].split(",");
            backend[row / 4] = rows[row + 2].split(",");
            devs[row / 4] = rows[row + 3].split(",");

            frontend[row / 4] = frontend[row / 4].slice(0, frontend[row/4].length - 1);
            backend[row / 4] = backend[row / 4].slice(0, backend[row/4].length - 1);
            devs[row / 4] = devs[row / 4].slice(0, devs[row/4].length - 1);

        }
        
        // construct card
        for(let index in projects) {
            let link = "<a class='proj-link' href='project_view.php?id=" + projects[index][0] + "' />";
            let head = "<h2>" + projects[index][1] + "</h2>";
            let dev_list = "";
            for(let dev = 0; dev < devs[index].length; dev += 3)  {
                dev_list += "<p class='card-element'>" + devs[index][dev] + " " + devs[index][dev + 1] + "</p>";
                dev_list += "<p class='card-element indent'>" + devs[index][dev + 2] + "</p>";
            }
            let db = "<p class='card-element'>" + projects[index][4] + "</p>";
            let backend_list = "<p class='card-element'>";
            for(let i = 0; i < backend[index].length; i++)  {
                backend_list += backend[index][i];
                if(i != backend[index].length - 1) {
                    backend_list += ", ";
                }
            }
            backend_list += "</p>";
            let frontend_list = "<p class='bottom-card'>";
            for(let i = 0; i < frontend[index].length; i++)  {
                frontend_list += frontend[index][i];
                if(i != frontend[index].length - 1) {
                    frontend_list += ", ";
                }
            }
            frontend_list += "</p>";

            let card = link + "<div class='card secondary'>" + head + dev_list + db + backend_list + frontend_list + "</div>";
            $("#grid").append(card);
        }
        
    } else {
        console.log("error occured. please run query again");
    }
}
