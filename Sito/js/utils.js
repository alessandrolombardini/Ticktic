/*variabile con stringa con il value dell'option della select che significa nessuna selezione*/
notselected="none";

/*selettore dei giorni nell'inserimento evento*/
daySelect = $(".eventdate#day"); 

/*Aggiorna i prezzi del carrello*/
function updateChartPrices(){
    updateEventTotal();
    updateChartTotal();
}

/*Aggiorna i prezzi di totale evento nel carrello*/
function updateEventTotal(){
    $(".event").each(function(){
        let totaleevento = 0;
        let ticketsnumber = parseFloat($(this).find(".tickets-number").text());
        let ticketprice = parseFloat($(this).find(".ticket-price").text().substring(1));
        totaleevento = (ticketprice*ticketsnumber).toFixed(2);
        $(this).find(".totale-evento").text("€" + totaleevento);
        let eventid = $(this).attr('id').substring(12);
        $(".resume").find(".totale-evento-resume-" + eventid).text("€" + totaleevento);
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

/*Naviga fre le varie sezioni del carrello*/
function showChartSelectedContent(){
    $(window).scrollTop(0);
    let attività = $(".chart-content");
    $(attività).children().hide();
    $(attività).children(".selected").show();
}

/*Controlla che sia stato selezionato almeno un artista*/
function checkArtistiSelected(){
    let option = $( "select[name='artisti_1'] option:selected" ).val();
    if (option == notselected){
        $(".artista_presente").hide();
    } else {
        $(".artista_presente").show();
    }
}

/*Popola i giorni in base al mese e l'anno*/
function populateDays($month){
    let daySelect = $(".eventdate#day");
    let selectedDay = $(".eventdate#day").val();
    daySelect.find("option").remove();
    let max = 31;

    if ($month=="11" || $month=="04" || $month=="09" || $month=="06"){
        max = 30;
    } else if ($month=="02"){
        let year = $(".eventdate#year :selected").text(); 
        if (((year % 4 == 0) && (year % 100 != 0)) || (year % 400 == 0)){
            max = 29;
        } else {
            max = 28;
        }
    }

    for(let i = 1; i <= max; i++) {
        let option = document.createElement('option');
        option.textContent = i;
        option.value = i;
        if (selectedDay == i){
            $(option).attr('selected','selected');
        }
        daySelect.append(option);
    }
}

/* Open when someone clicks on the span element */
function openNav() {
    document.getElementById("nav").style.width = "90%";
}
    
/* Close when someone clicks on the "x" symbol inside the overlay */
function closeNav() {
    document.getElementById("nav").style.width = "0%";
} 

/*Torna indietro nelle pagine del carrello*/
function chartChangePageBack(){
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

    /*Gestione inserimento evento*/
    checkArtistiSelected();
    $("select[name='artisti_1']").change(function(){
        checkArtistiSelected();
    });

    /*Possibilità di associare più artisti ad un evento*/
    $(".reset hide").hide();
    $(".more-artists").click(function(){
        let c = $(".select_artisti").length + 1;
        let html = `<div class="col-md-4 mb-3">
                        <select name="artisti_${c}" class="form-control select_artisti" required>
                            
                        </select>
                    </div>`;
        let options = $("select[name='artisti_1'] option").clone();
        $(".select_artisti").last().parent().after(html);
        $(".select_artisti").last().append(options);
        $(".select_artisti").last().val("none").attr('selected','selected');

        if (c == 2){
            $(".reset").show();
        }
    });

    /*Reset artisti*/
    $(".reset").click(function(){
        $(".select_artisti[name!='artisti_1']").parent().remove();
        $(".select_artisti[name='artisti_1']").val(notselected);
        checkArtistiSelected();
        $(".reset").hide();
    });

    /*Popola gli anni nell'inserimento e modifica evento*/
    let date = new Date();
    let year = date.getFullYear();
    let yearSelect = $(".eventdate#year"); 
    let selectedyear = year;
    if ($(".eventdate#year").hasClass("updateevent")){
        selectedyear = $(".eventdate#year").text();
    }
    for(var i = 0; i <= 5; i++) {
        var option = document.createElement('option');
        option.textContent = year+i;
        option.value = year+i;
        yearSelect.append(option);
    }
    $(".eventdate#year").find('option[value="' + selectedyear + '"]').attr('selected','selected');

    /*Popola i giorni nell'inserimento e modifica evento*/
    let monthSelect = $(".eventdate#month");
    let day = $(".eventdate#day").first().text();
    if ($(".eventdate#day").hasClass("updateevent")){
        day = $(".eventdate#day").text();
        if (day.substring(0,1) == 0){
            day = day.substring(1,2);
        } 
    }
    populateDays(monthSelect.find(":selected").val());
    $(".eventdate#day").find('option[value="' + day + '"]').attr('selected','selected');


    /*Ripopola correttamente i giorni quando si cambia mese o anno*/
    monthSelect.change(function(){
        populateDays(monthSelect.find(":selected").val())
    });
    yearSelect.change(function(){
        populateDays(monthSelect.find(":selected").val())
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
        chartChangePageBack()
    });
    $(".chart-content").find("input[type='submit']").siblings("a").click(function(){
        chartChangePageBack()
    });

    /*Selettore per le carte di credito*/
    $("#card-selector img").click(function(){
        $("#card-selector img.purpleborder").removeClass("purpleborder");
        $(this).addClass("purpleborder");
    });

    /*Inizializza i prezzi del carrello*/
    let price = "€" + (parseFloat($(".ticket-price").text().substring(1))).toFixed(2);
    $(".ticket-price").html(price);
    updateEventTotal();
    updateChartTotal();

    /*Aumenta il numero di biglietti*/
    $(".fa-plus-circle").click(function(){
        let ticketkind = $(this).parent().parent();
        let number = Number($(ticketkind).find("p.tickets-number").text());
        if(number < 8){
            number++;
            $(ticketkind).find("p.tickets-number").text(number);
            $(ticketkind).children("hidden").attr("value", number)
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
            $(ticketkind).children("hidden").attr("value", number)
            updateChartPrices();
        } else {
            ;
        }
    });

    /*Toglie dal carrello i biglietti per un evento aggiornando il totale*/
    $(".close").parent().click(function(){
        let container = $(this).parent().parent();
        $(container).remove();  /* Usare const in questi casi */
        updateChartPrices();
    });

    /*Aggiorna i prezzi del resume del carrello*/
    $("#resume-btn").click(function(){
        var spedizione = parseFloat($("input[name='spedizione']:checked").val());
        $(".resume").find(".spedizione").text("€" + spedizione.toFixed(2));
        var totalecarello = parseFloat($(".resume").find(".totale-carrello").text().substring(1));
        var totalespesa =(totalecarello + spedizione).toFixed(2);
        $(".totale-spesa").text("€" + totalespesa);
        $(this).after("<input type='hidden' name='totale-spesa' value=" + totalespesa + "/>");
    });

    /* Gestisce la pressione del pulsante con cui le notifiche vengono dichiarate viste */
    $(".click_nuove_notifiche").click(function(){
        $.post("./api-notifica-visualizzata.php",
        {
            IDNotificaPersonale: $(this).attr("data-IDNotificaPersonale")
        });
        $(this).parent().parent().parent().parent().remove();
    });

    $(".btn_aggiungi_al_carrello").click(function(){
        const IDEvento = $(".contenitoreID").attr("data-idevento");
        const numeroBiglietti = $(".tickets-number").html();
        $.post("processa_aggiungi_evento_al_carrello.php", 
        {
            numeroBiglietti: numeroBiglietti,
            IDEvento: IDEvento
        });
    });

    /************************************ CUORE ******************************** */

    $(".cuore-pieno").click(svuotaCuore);
    $(".cuore-vuoto").click(riempiCuore);

    function svuotaCuore(){
        let IDEvento = $(this).parent().attr("data-IDEvento");
        $(this).off();
        $(this).removeClass('cuore-pieno');
        $(this).removeClass('fas');
        $(this).addClass('far');
        $(this).addClass('cuore-vuoto');
        $.post("./processa_interessati_rimuovi_evento.php", 
        {
            IDEvento: IDEvento
        });
        $(".cuore-vuoto").click(riempiCuore);
    }
    function riempiCuore(){
        let IDEvento = $(this).parent().attr("data-IDEvento");
        $(this).off();
        $(this).removeClass('cuore-vuoto');
        $(this).removeClass('far');
        $(this).addClass('fas');
        $(this).addClass('cuore-pieno');
        $.post("./processa_interessati_aggiungi_evento.php", 
        {
            IDEvento: IDEvento
        });
        $(".cuore-pieno").click(svuotaCuore);
    }

/*    $(".cuore-vuoto").hover(function(){
        if(!$(this).hasClass('cuore-pieno')){
            $(this).removeClass('cuore-vuoto');
            $(this).removeClass('far');
            $(this).addClass('fas');
            $(this).addClass('cuore-pieno');
            val = true;
        }
    }, function(){
        if(val == true){
            $(this).removeClass('cuore-pieno');
            $(this).removeClass('fas');
            $(this).addClass('far');
            $(this).addClass('cuore-vuoto');        
        }
    });*/
    /******************************************************************************* */
    

    /* Dropdown button */
    $(".dropdown-btn").click(function() {
        this.classList.toggle("active");
        var dropdownContent = this.nextElementSibling;
        if (dropdownContent.style.display === "block") {
        dropdownContent.style.display = "none";
        } else {
        dropdownContent.style.display = "block";
        }
    });

});
