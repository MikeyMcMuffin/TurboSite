$(document).ready(function(){

    $(".btn_1").click(function () {
        console.log("button click");
        $(".help").slideToggle();


        if ($(window).width() < 800){
            $('html, body').animate({
                scrollTop: $(".container").offset().top
            }, 1000);
        }
        else{
            $('html, body').animate({
                scrollTop: $(".terminal-background").offset().top
            }, 1000);
        }
    });
});