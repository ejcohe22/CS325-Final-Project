
$(document).ready(function(){
    //navbar
    $("#mobile-menu").click(function(){
        console.log($(".myLinks"));
        if( $(".myLinks").css('display') == 'none'){
            $(".myLinks").css('display', 'block');
        }else{
            $(".myLinks").css('display', 'none');
        }
    });
});
