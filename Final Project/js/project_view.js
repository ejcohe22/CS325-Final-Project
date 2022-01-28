// Names: Samuel Munoz
// Names: Erik Cohen

let dev_list = [];
let database = "";
let frontend_list = [];
let backend_list = [];
let dev_role_list = [];
let is_editing = false;
$(document).ready(function() {
    $("#edit-btn").click(function(){
        $("#admin-buttons").css("display", "inline-block");
        $("#edit-btn").css("display", "none");

        is_editing = true;

        $.post("get_developers.php", {}, display_edit);
    });

    $("#cancel").click(function(){
        display_view(dev_list, frontend_list, backend_list, dev_role_list, database);

        is_editing = false; 
    });

    $("#submit").click(function(){
        if(is_editing) {
           let devs = $(".dev-field"); 
           let f = $(".frontend-field"); 
           let d = $(".database-field")[0]; 
           let b = $(".backend-field"); 
           let r = $(".role-field");
           let id = $("#project-id")[0].value;

           let d_values = [];
           for(let i = 0; i < devs.length; i++) {
                d_values.push(devs[i].value);
           }
           let f_values = [];
           for(let i = 0; i < f.length; i++) {
                f_values.push(f[i].value);
           }
           let b_values = [];
           for(let i = 0; i < b.length; i++) {
                b_values.push(b[i].value);
           }
           let r_values = [];
           for(let i = 0; i < r.length; i++) {
                r_values.push(r[i].value);
           }


           console.log(id);
           console.log(d.value);
           console.log(f_values);
           console.log(d_values);
           console.log(b_values);
           console.log(r_values);
           is_editing = false;
           $.post("update_project.php", {"id": id, "db": d.value, "frontend": f_values, "devs": d_values, "backend": b_values, "roles": r_values}, pre_display_view);
        }
    });

    $('#delete').click(function() {
        let project_id = $("#project-id").val();

        $.ajax({
          type: "POST",
          url: "delete.php",
          data: { "id": project_id },
         success: function(data) {
            window.location.href = "projects.php";
          }
        });
      });
});

// function debug(data, status) {
//     if(status == "success") {
//     } else {
//         alert("failure");
//     }
// }

function pre_display_view(data, status) {
    if(status == "success") {
        console.log(data);
        let rows = data.split("\n");
        rows = rows.slice(0, rows.length-1);
        for(let index in rows) {
            rows[index] = rows[index].split(",");
        }
        let dd = "";
        let dl = [];
        let fl = [];
        let bl = [];
        let drl = [];
        for(let i in rows) {
            console.log("row " + i + " has length " + rows[i].length);
            for(let j = 1; j < rows[i].length; j++) {
                if(rows[i][0] == "dev") {
                    dl.push(rows[i][j]);
                } else if(rows[i][0] == "db") {
                    dd = rows[i][j];
                } else if(rows[i][0] == "frontend") {
                    fl.push(rows[i][j]);
                } else if(rows[i][0] == "backend") {
                    bl.push(rows[i][j]);
                } else if(rows[i][0] == "role") {
                    drl.push(rows[i][j]);
                }
            }
        }

        display_view(dl, fl, bl, drl, dd);
    } else {
        console.log("an error has occured");
    }
}

function display_edit(data, status) {
    if(status == "success") {
        // parse data
        let rows = data.split("\n");
        rows = rows.slice(0, rows.length - 1);
        for(let index in rows) {
            rows[index] = rows[index].split(",");
        }
        // console.log(rows);

        // replace text with input box
        let editable = $("span.editable");
        console.log(editable);
        $(".profile-content").remove();
        let dev_count = 1;
        for(let index = 0; index < editable.length; index++) {
            let to_remove = editable[index];
            let classes = to_remove.className.split(" ");
            for(let index in classes) {
                if(classes[index] == "devs") {
                    insert_element = "<div class='line'><span class='indent'>Developer " + dev_count + ":&nbsp</span><select class='dev-field' name='devs[]'/>";
                    for(let i in rows) {
                        insert_element += "<option value='" + rows[i][0] + "'"; 
                        let name = rows[i][1] + " " + rows[i][2];
                        if(name == to_remove.innerHTML) {
                            insert_element += " selected";
                        }
                        insert_element += ">" + name + "</option>";
                    }
                    insert_element += "</select>";
                    insert_element += "</div>";
                    dev_list.push(to_remove.innerHTML);
                    dev_count += 1;
                } else if(classes[index] == "database") {
                    insert_element = "<div class='line'><span class='indent'>Database:&nbsp</span><input type='text' class='database-field' value='" + to_remove.innerHTML+ "'/></div>";
                    database = to_remove.innerHTML;
                } else if(classes[index] == "frontend") {
                    insert_element = "<div class='line'><span class='indent'>FrontEnd:&nbsp</span><input class='frontend-field' type='text' value='" + to_remove.innerHTML+ "'/></div>";
                    frontend_list.push(to_remove.innerHTML);
                } else if(classes[index] == "backend") {
                    insert_element = "<div class='line'><span class='indent'>Backend:&nbsp</span><input class='backend-field' type='text' value='" + to_remove.innerHTML+ "'/></div>";
                    backend_list.push(to_remove.innerHTML);
                } else if(classes[index] == "roles") {
                    insert_element = "<div class='line'><span class='super-indent'>Role:&nbsp</span><input class='role-field' type='text' value='" + to_remove.innerHTML+ "'/></div>";
                    dev_role_list.push(to_remove.innerHTML);
                }
            }
            $(".project-content").append(insert_element);
        }
    } else {
        console.log("an error has occured");
    }

}
function display_view(dl, fl, bl, drl, dd) {
    $("#admin-buttons").css("display", "none");
    $("#edit-btn").css("display", "block");

    $(".line").remove();

    let devs = "";
    for(let i in dl) {
        devs += "<p class='profile-content indent'>Developers " + (parseInt(i)+1) + ": ";
        devs += "<span class='editable devs'>" + dl[i] + "</span>";
        devs += "</p><p class='profile-content super-indent'>Roles: <span class='editable roles'>" + drl[i] + "</span></p>";
    }

    let d = "<p class='profile-content indent'>Database: <span class='editable database'>" + dd + "</span></p>";

    let f = "<p class='profile-content indent'>FrontEnd: ";
    for(let i in fl) {
        f += "<span class='editable frontend'>" + fl[i] + "</span>";
        if(i != fl.length - 1) {
            f += ", ";
        }
    }
    f += "</p>";

    let b = "<p class='profile-content indent'>BackEnd: ";
    for(let i in bl) {
        b += "<span class='profile-content editable backend'>" + bl[i] + "</span>";
        if(i != bl.length - 1) {
            b += ", ";
        }
    }
    b += "</p>";

    $(".project-content").append(devs);
    $(".project-content").append(d);
    $(".project-content").append(f);
    $(".project-content").append(b);

    frontend_list = [];
    dev_list = []; 
    backend_list = []; 
    dev_role_list = [];
    database = ""; 
}
