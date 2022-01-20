
$(document).ready(function(){
    //navbar
    $("#mobile-menu").click(function(){
        if( $("#myLinks").css('display') == 'none'){
            $("#myLinks").css('display', 'block');
        }else{
            $("#myLinks").css('display', 'none');
        }
    });
});
