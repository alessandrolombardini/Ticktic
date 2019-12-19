/* Mostra e nascondi opzioni gesore in registrazione */
$(document).ready(function(){
    let nascosto = 1;
    $("div.areagestore").hide();
    $("input[name='gestore']").click(function(){
        if(nascosto == 0){
            $("div.areagestore").hide();
            nascosto = 1;
        } else {
            nascosto = 0;
            $("div.areagestore").show();
        }
    });

    // $("#chart-content").hasClass("selected").hide();

    $("#card-selector img").click(function(){
        $("#card-selector img.selected").removeClass("selected");
        $(this).addClass("selected");
    });

});