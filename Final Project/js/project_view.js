$(document).ready(function(){
    $("#edit-btn").click(function(){
        $("#admin-buttons").css("display", "block");
        $("#edit-btn").css("display", "none");
    });
    $("#submit").click(function(){
        $("#admin-buttons").css("display", "none");
        $("#edit-btn").css("display", "block");

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