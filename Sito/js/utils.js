/*variabile con stringa con il value dell'option della select che significa nessuna selezione*/
notselected="none";

/*selettore dei giorni nell'inserimento evento*/
daySelect = $(".eventdate#day");

/*Elimina gli elementi duplicati in un array di stringhe o numeri*/
function unique(array){
    return $.grep(array, function(el, index) {
        return index == $.inArray(el, array);
    });
}

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
        $(".artist_not_selected").hide();
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
    document.getElementById("nav").style.width = "50%";
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

    /******************************** INSERIMENTO E MODIFICA EVENTO ******************************************/
    /*Gestione inserimento artistix*/
    checkArtistiSelected();

    /*controlla che sia stato selezionato almeno un'artista*/
    $("select[name='artisti_1']").change(function(){
        checkArtistiSelected();
    });

    /*Possibilità di associare più artisti ad un evento*/
    $(".resethide").hide();
    $(".artist_not_selected").hide();
    $(".artist_already_selected").hide();
    $(".more-artists").click(function(){
        if ($(".select_artisti").last().find(":selected").val() != notselected){
            let c = $(".select_artisti").length + 1;
            let html = `<div class="col-md-4 mb-3">
                            <select name="artisti_${c}" class="form-control select_artisti" required>

                            </select>
                        </div>`;
            let options = $("select[name='artisti_1'] option").clone();
            $(".select_artisti").last().parent().after(html);
            $(".select_artisti").last().append(options);
            $(".select_artisti").last().val(notselected).attr('selected','selected');

            if (c == 2){
                $(".reset").show();
            }
            $(".artist_not_selected").hide();
        } else {
            $(".artist_not_selected").show();
            $(".artist_already_selected").hide();
        }
    });

    /*Reset artisti*/
    $(".reset").click(function(){
        $(".select_artisti[name!='artisti_1']").parent().remove();
        $(".select_artisti[name='artisti_1']").val(notselected);
        checkArtistiSelected();
        $(".reset").hide();
        $(".artist_not_selected").hide();
        $(".artist_already_selected").hide();
    });

    /*controlla che l'artista non sia già stato selezionato*/
    $("#inserimento_artisti").on('change', '.select_artisti', function(){
        let selezionati = new Array();
        $(".select_artisti").each(function(){
            selezionati.push($(this).find(":selected").val());
        });
        let dimensione = selezionati.length;
        let unique = $.grep(selezionati, function(el, index) {
            return index == $.inArray(el, selezionati);
        });
        if (unique.length < dimensione){
            $(".artist_already_selected").show();
            $(this).val(notselected);
        } else {
            $(".artist_already_selected").hide();
            $(".artist_not_selected").hide();
        }
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

    /******************************** CARRELLO ******************************************/
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
    $(".chart-content").find("h3").siblings("a").click(function(){
        chartChangePageBack()
    });
    
    /*Selettore per le carte di credito*/
    $("#card-selector img").click(function(){
        $("#card-selector img.purpleborder").removeClass("purpleborder");
        $(this).addClass("purpleborder");
    });

    /*Inizializza i prezzi del carrello*/
    $(".ticket-price").each(function(){
        let price = "€" + (parseFloat($(this).text().substring(1))).toFixed(2);
        $(this).html(price);
    });
    updateEventTotal();
    updateChartTotal();

    /*Aumenta il numero di biglietti*/
    $(".piuCarrello").click(function(){
        let ticketkind = $(this).parent().parent();
        let number = Number($(ticketkind).find("p.tickets-number").text());
        if(number < 8){
            number++;
            $(ticketkind).find("p.tickets-number").text(number);
            $(ticketkind).find("input[type='hidden']").attr("value", number)
            updateChartPrices();
        } else {
            ;
        }
    });

    /*Diminuisce il numero di biglietti*/
    $(".menoCarrello").click(function(){
        let ticketkind = $(this).parent().parent();
        let number = Number($(ticketkind).find("p.tickets-number").text());
        if(number > 1){
            number--;
            $(ticketkind).find("p.tickets-number").text(number);
            $(ticketkind).find("input[type='hidden']").attr("value", number)
            updateChartPrices();
        } else {
            ;
        }
    });

    /* Stesse operazioni poste sopra ma per il singolo evento */
    /*Aumenta il numero di biglietti*/
    $(".piuEvento").click(function(){
        let ticketkind = $(this).parent();
        let number = Number($(ticketkind).find("p.tickets-num").text());
        if(number < 8){
            number++;
            $(ticketkind).find("p.tickets-num").text(number);
            updatePrice();
        } 
    });

    /*Diminuisce il numero di biglietti*/
    $(".menoEvento").click(function(){
        let ticketkind = $(this).parent();
        let number = Number($(ticketkind).find("p.tickets-num").text());
        if(number > 1){
            number--;
            $(ticketkind).find("p.tickets-num").text(number);
            updatePrice();
        } 
    });
    updatePrice();
    function updatePrice(){
        let totaleevento = 0;
        let ticketsnumber = parseFloat($(".tickets-num").text());
        let ticketprice = parseFloat($(".ticket-p").text().substring(1));
        totaleevento = (ticketprice*ticketsnumber).toFixed(2);
        $(".totale-e").text("€" + totaleevento);
    }

    /*Aggiorna i prezzi del resume del carrello*/
    $("#resume-btn").click(function(){
        var spedizione = parseFloat($("input[name='spedizione']:checked").val());
        $(".resume").find(".spedizione").text("€" + spedizione.toFixed(2));
        var totalecarello = parseFloat($(".resume").find(".totale-carrello").text().substring(1));
        var totalespesa =(totalecarello + spedizione).toFixed(2);
        $(".totale-spesa").text("€" + totalespesa);
        $(this).after("<input type='hidden' name='totale-spesa' value=" + totalespesa + "/>");
    });


    $(".btn_aggiungi_al_carrello").click(function(){
        const IDEvento = $(".contenitoreID").attr("data-idevento");
        const numeroBiglietti = $(".tickets-num").html();
        $.post("processa_aggiungi_evento_al_carrello.php",
        {
            numeroBiglietti: numeroBiglietti,
            IDEvento: IDEvento
        });
    });

    /******************************** NOTIFICHE ******************************************/
    aggiornaCampanella();

    /* Gestisce la pressione del pulsante con cui le notifiche vengono dichiarate viste */
    $(".click_nuove_notifiche").click(function(){
        $.post("./api-notifica-visualizzata.php",
        {
            IDNotificaPersonale: $(this).attr("data-IDNotificaPersonale")
        });
        $(this).parent().parent().parent().parent().remove();
        aggiornaCampanella();
    });

    /* Utile per aggiornare le notifiche in tempo reale */
    setInterval(aggiornaCampanella, 3000);
    setInterval(aggiornaNuoveNotifiche, 3000);

    function aggiornaNuoveNotifiche(){
      const path = window.location.pathname;
      const page = path.split("/").pop();
      if(page == "nuove_notifiche.php"){
        $.post("api-tutte-le-nuove-notifiche.php",
        {
          dataAggiornamento: $(".dataPerNotifiche").attr("data-dataAggiornamento")
        },
        function(result){
          if(result!=""){
              const array = JSON.parse(result);
              const item =array[0][0];
              let notifica =
              '<div class="col-12 col-md-6 col-xl-4">' +
              '<div class="notifica">' +
              '<div class="roundend-corners col-md-12 bg-white border mt-2 mb-4 px-4 py-3 shadow-sm">' +
              '<div class="row m-0 p-0 d-block float-right">' +
              '<a data-IDNotificaPersonale=' + item["IDNotificaPersonale"] + ' class="text-right m-0 p-0 click_nuove_notifiche pointer"><i class="fas fa-times color-purple fa-2x"></i></a>' +
              '</div>' +
              '<div class="mt-1 mt-md-0">' +
              '<section>' +
              '<h4 class="text-left mb-3">'+item["TitoloNotifica"]+'</h4>' +
              '<div class="text-left">' +
              '<p>' + item["TestoNotifica"] + '</p>';
              if(item["IDOrganizzatore"]!=null){
                notifica += '<p class="small">Pubblicato da '+ item["Nome"] + ' ' + item["Cognome"] + '(ORGANIZZATORE) il ' + item["DataNotifica"] + '</p>'
                if(item["IDEvento"]){
                  notifica+='<p class="small">In merito all\'evento '+ item["NomeEvento"]+'(In data '+item["DataEvento"]+'</p>';
                  notifica+='<div class="text-right"><a href="./evento.php?IDEvento='+item["idevento"]+'>Apri evento</a></div>';
                }
              }

              if(item["IDAmministratore"]!=null){
                notifica += '<p class="small">Pubblicato da '+ item["Nome"] + ' ' + item["Cognome"] + '(AMMINISTRATORE) il ' + item["DataNotifica"] + '</p>'
              }

              notifica +=
              '</div>' +
              '</section>' +
              '</div>' +
              '</div>' +
              '</div>' +
              '</div>';

              $("div.dataPerNotifiche").prepend(notifica);
              $("div.dataPerNotifiche").attr("data-dataAggiornamento", array[1]);

          }
        });

      }
    }

    function aggiornaCampanella(){
        $.getJSON("api-info-notifiche-non-viste.php", function(result){
            $.each(result, function(i, field){
                if(field=="true"){
                    $(".campanella").css("color","rgb(103,99,214)");
                } else {
                    $(".campanella").css("color","white");
                }
            });
        });
    }

    /*********************************************************************************** */
    /* Check immagine di input */
    var _URL = window.URL || window.webkitURL;
    $("input[name='eventimg']").change( function(e) {
        var file, img;
        if ((file = this.files[0])) {
            if(file['type'].split('/')[0] !== 'image'){
              alert("File non idoneo: non è una immagine");
              $("input[name='eventimg']").val("");
            }
            img = new Image();
            var objectUrl = _URL.createObjectURL(file);
            img.onload = function () {
              if(this.width/this.height != 2){
                alert("File non idoneo: accettate solo imagini con rapporto 2:1");
                $("input[name='eventimg']").val("");
              }
              /*alert(this.width + " " + this.height); */
              _URL.revokeObjectURL(objectUrl);
            };
            img.src = objectUrl;
        }
    });
    $("input[name='categimg']").change( function(e) {
        var file, img;
        if ((file = this.files[0])) {
            if(file['type'].split('/')[0] !== 'image'){
              alert("File non idoneo: non è una immagine");
              $("input[name='eventimg']").val("");
            }
            img = new Image();
            var objectUrl = _URL.createObjectURL(file);
            img.onload = function () {
            console.log(this.width/this.height);
              if(this.width/this.height != 1){
                alert("File non idoneo: accettate solo imagini con rapporto 1");
                $("input[name='eventimg']").val("");
              }
              /*alert(this.width + " " + this.height); */
              _URL.revokeObjectURL(objectUrl);
            };
            img.src = objectUrl;
        }
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
        console.log($(this).parent().attr("data-IDEvento"));
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
    /* Dropdown button menu*/

    $(".dropdown-btn").click(function() {
        //this.classList.toggle("active");
        var dropdownContent = this.nextElementSibling;
        if (dropdownContent.style.display == "block") {
            dropdownContent.style.display = "none";
        } else {
            dropdownContent.style.display = "block";
        } 
    });

    /******************************************************************************* */
    /*Slideshow*/
    $('.slideshow').slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 2000,
        responsive: [
          {
            breakpoint: 2048,
            settings: {
              slidesToShow: 4,
              slidesToScroll: 4,
            }
          },
          {
            breakpoint: 1024,
            settings: {
              slidesToShow: 2,
              slidesToScroll: 2
            }
          },
          {
            breakpoint: 600,
            settings: {
              slidesToShow: 1,
              slidesToScroll: 1
            }
          }
        ]
    });

});
