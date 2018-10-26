$(document).ready(function() {

    setTimeout(function (){
        $("#wcs-flasher").animate({
            opacity: '0',
            height: '0',
            display: 'none',
        });
    }, 3000);

    $("#counter").text("X");

});