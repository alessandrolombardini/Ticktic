/*Aggiorna i prezzi del carrello*/
function updateChartPrices(){
    updateEventPartial();
    updateEventTotal();
    updateChartTotal();
}

/*Aggiorna i prezzi di totale parziale nel carrello*/
function updateEventPartial(){
    $(".ticket-kind").each(function(){
        let number = Number($(this).find("p.tickets-number").text());
        let price = parseFloat($(this).find("p.ticket-price").text().substring(1));
        let parziale = (number*price).toFixed(2);
        $(this).find("p.totale-parziale").text("€" + parziale);
    });
}

/*Aggiorna i prezzi di totale evento nel carrello*/
function updateEventTotal(){
    $(".event").each(function(){
        let totaleevento = 0;
        $(this).find(".totale-parziale").each(function(){
            totaleevento += parseFloat($(this).text().substring(1));
        });
        totaleevento=totaleevento.toFixed(2);
        $(this).find(".totale-evento").text("€" + totaleevento);
    });
}

/*Aggiorna il prezzo di totale carrello nel carrello*/
function updateChartTotal(){
    let totalecarrello = 0;
    $(".totale-evento").each(function(){
        totalecarrello += parseFloat($(this).text().substring(1));
    });
    totalecarrello = totalecarrello.toFixed(2);
    $(".totale-carrello").text("€" + totalecarrello);
}

function showChartSelectedContent(){
    $(window).scrollTop(0); //!!! NOT WORKING
    let attività = $(".chart-content");
    $(attività).children().hide();
    $(attività).children(".selected").show();
}


$(document).ready(function(){

    /* Mostra e nascondi opzioni gestore in registrazione */
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

    /*Gestione delle 4 attività del carrello*/;
    showChartSelectedContent();

    /*Bottoni per procedere con l'acquisto*/
    $(".chart-content").find("button").click(function(){
        let selezionato = $(".chart-content").children(".selected");
        $(selezionato).removeClass("selected");
        $(selezionato).next().addClass("selected");
        
        let progress = $(".chart-progress").children();
        let purple = $(progress[0]).find(".color-purple");
        $(purple).removeClass("color-purple");
        $(purple).next().addClass("color-purple");
        let black = $(progress[1]).find(".color-black");
        $(black).removeClass("color-black");
        $(black).next().addClass("color-black");

        showChartSelectedContent();
    });

    /*Pulsanti per tornare indietro*/
    $(".chart-content").find("button").siblings("a").click(function(){
        let selezionato = $(".chart-content").children(".selected");
        $(selezionato).removeClass("selected");
        $(selezionato).prev().addClass("selected");

        let progress = $(".chart-progress").children();
        let purple = $(progress[0]).find(".color-purple");
        $(purple).removeClass("color-purple");
        $(purple).prev().addClass("color-purple");
        let black = $(progress[1]).find(".color-black");
        $(black).removeClass("color-black");
        $(black).prev().addClass("color-black");

        showChartSelectedContent();
    });

    /*Selettore per le carte di credito*/
    $("#card-selector img").click(function(){
        $("#card-selector img.purpleborder").removeClass("purpleborder");
        $(this).addClass("purpleborder");
    });

    /*Inizializza i prezzi del carrello*/
    updateEventPartial();
    updateEventTotal();
    updateChartTotal();

    /*Aumenta il numero di biglietti*/
    $(".fa-plus-circle").click(function(){
        let ticketkind = $(this).parent().parent();
        let number = Number($(ticketkind).find("p.tickets-number").text());
        if(number < 8){
            number++;
            $(ticketkind).find("p.tickets-number").text(number);
            updateChartPrices();
        } else {
            ;
        }
    });

    /*Diminuisce il numero di biglietti*/
    $(".fa-minus-circle").click(function(){
        let ticketkind = $(this).parent().parent();
        let number = Number($(ticketkind).find("p.tickets-number").text());
        if(number > 1){
            number--;
            $(ticketkind).find("p.tickets-number").text(number);
            updateChartPrices();
        } else {
            ;
        }
    });

    /*Toglie dal carrello i biglietti per un evento aggiornando il totale*/
    $(".close").parent().click(function(){
        let container = $(this).parent().parent();
        $(container).remove();
        updateChartPrices();
    });

    /*Aggiorna i prezzi del resume del carrello*/
    $("#resume-btn").click(function(){
        var spedizione = parseFloat($("input[name='spedizione']:checked").val());
        $(".resume").find(".spedizione").text("€" + spedizione.toFixed(2));
        var totalecarello = parseFloat($(".resume").find(".totale-carrello").text().substring(1));
        var totalespesa =(totalecarello + spedizione).toFixed(2);
        $(".totale-spesa").text("€" + totalespesa);
    });

});
