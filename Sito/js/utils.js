/*Aggiorna i prezzi di totale parziale, totale evento e totale carrello nel carrello*/
function updateChartPrices(ticketkind, number, price){
    let event = $(ticketkind).parent();
    let chart = $(event).parent().parent().parent();

    let parziale = (number*price).toFixed(2);
    $(ticketkind).find("p.totale-parziale").text("€" + parziale);

    let totaleevento = 0;
    $(event).find("p.totale-parziale").each(function(){
        totaleevento += Number($(this).text().substring(1));
    });
    totaleevento=totaleevento.toFixed(2);
    $(event).find("p.totale-evento").text("€" + totaleevento);

    let totalecarrello = 0;
    $(chart).find("p.totale-evento").each(function(){
        totalecarrello += Number($(this).text().substring(1));
    });
    totalecarrello=totalecarrello.toFixed(2);
    $(chart).find("p.totale-carrello").text("€" + totalecarrello);
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

    // $("#chart-content").hasClass("selected").hide();

    /*Selettore per le carte di credito*/
    $("#card-selector img").click(function(){
        $("#card-selector img.selected").removeClass("selected");
        $(this).addClass("selected");
    });

    /*Aumenta il numero di biglietti*/
    $(".fa-plus-circle").click(function(){
        let ticketkind = $(this).parent().parent();
        let number = Number($(ticketkind).find("p.tickets-number").text());
        let price = parseFloat($(ticketkind).find("p.ticket-price").text().substring(1));

        if(number < 8){
            number++;
            $(ticketkind).find("p.tickets-number").text(number);
            updateChartPrices(ticketkind, number, price);
        } else {
            //TO-DO
        }
    });

    /*Diminuisce il numero di biglietti*/
    $(".fa-minus-circle").click(function(){
        let ticketkind = $(this).parent().parent();
        let number = Number($(ticketkind).find("p.tickets-number").text());
        let price = parseFloat($(ticketkind).find("p.ticket-price").text().substring(2));
        if(number > 1){
            number--;
            $(ticketkind).find("p.tickets-number").text(number);
            updateChartPrices(ticketkind, number, price);
        } else {
            //TO-DO
        }
    });
});
