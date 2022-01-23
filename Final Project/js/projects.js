
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
        if(this.checked){
            console.log(this.value);
        // use this to query db

        }else{
            console.log("deselected " + this.value);
        }

    });


});

