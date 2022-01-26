let dev_list = [];
let database = "";
let frontend_list = [];
let backend_list = [];
$(document).ready(function(){
    $("#edit-btn").click(function(){
        $("#admin-buttons").css("display", "inline-block");
        $("#edit-btn").css("display", "none");

        $.post("get_developers.php", {}, display_edit);
    });
    $("#cancel").click(function(){
        $("#admin-buttons").css("display", "none");
        $("#edit-btn").css("display", "block");
        $(".line").remove();
        let devs = "<p class='indent'>Developers: ";
        for(let i in dev_list) {
            devs += "<span class='editable devs'>" + dev_list[i] + "</span>";
            if(i != dev_list.length - 1) {
                devs += ", ";
            }
        }
        devs += "</p>";

        let d = "<p class='indent'>Database: <span class='editable database'>" + database + "</span></p>";

        let f = "<p class='indent'>FrontEnd: ";
        for(let i in frontend_list) {
            f += "<span class='editable frontend'>" + frontend_list[i] + "</span>";
            if(i != frontend_list.length - 1) {
                f += ", ";
            }
        }
        f += "</p>";

        let b = "<p class='indent'>BackEnd: ";
        for(let i in backend_list) {
            b += "<span class='editable backend'>" + backend_list[i] + "</span>";
            if(i != backend_list.length - 1) {
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
    });

    $('#delete').click(function() {
        console.log("click");
        $.ajax({
          type: "POST",
          url: "delete.php",
          data: { id: project_id }
        })
        window.location.href = "projects.php";
      });
});

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
        $(".indent").remove();
        let dev_count = 1;
        for(let index = 0; index < editable.length; index++) {
            let to_remove = editable[index];
            let classes = to_remove.className.split(" ");
            for(let index in classes) {
                if(classes[index] == "devs") {
                    insert_element = "<div class='line'><span class='indent'>Developer " + dev_count + ":&nbsp</span><select name='devs[]'/>";
                    for(let i in rows) {
                        insert_element += "<option value='" + rows[i][0] + "'"; 
                        let name = rows[i][1] + " " + rows[i][2];
                        if(name == to_remove.innerHTML) {
                            insert_element += " selected";
                        }
                        insert_element += ">" + name + "</option>";
                    }
                    insert_element += "</div>";
                    dev_list.push(to_remove.innerHTML);
                    dev_count += 1;
                } else if(classes[index] == "database") {
                    insert_element = "<div class='line'><span class='indent'>Database:&nbsp</span><input type='text' value='" + to_remove.innerHTML+ "'/></div>";
                    database = to_remove.innerHTML;
                } else if(classes[index] == "frontend") {
                    insert_element = "<div class='line'><span class='indent'>FrontEnd:&nbsp</span><input type='text' value='" + to_remove.innerHTML+ "'/></div>";
                    frontend_list.push(to_remove.innerHTML);
                } else if(classes[index] == "backend") {
                    insert_element = "<div class='line'><span class='indent'>Backend:&nbsp</span><input type='text' value='" + to_remove.innerHTML+ "'/></div>";
                    backend_list.push(to_remove.innerHTML);
                }
            }
            $(".project-content").append(insert_element);
        }
    } else {
        console.log("an error has occured");
    }

}
