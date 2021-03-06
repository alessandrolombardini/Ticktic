<?php $i=0; 
foreach($templateParams["eventi"] as $evento):?>
<div class="row event" id="chart_event_<?php echo $evento["IDEvento"];?>">
    <div class="col-md-2"></div>
    <div class="roundend-corners col-12 col-md-8 bg-white border mt-2 mb-4 px-4 py-3 mr-0 shadow-sm concert-tickets">
        <div class="row m-0 p-0">
            <a class="col-12 text-right m-0 p-0" href="?deleteid=<?php echo $evento["IDEvento"];?>"><span class="fas fa-times fa-2x purple-black-link"></span></a>
        </div>
        <div class="row mb-3 mt-0">
            <img class="col-md-5 mt-1 mt-md-0 col-12 mb-3 mb-md-0 pl-0 pr-0 rounded" src="./images/eventi/<?php echo $evento["ImmagineEvento"]?>" alt="IDAYS"/>
            <div class="col-md-7 mt-md-0 col-12 pl-4">
                <h3 class="text-md-left text-center mb-3"> <?php echo $evento["NomeEvento"]?> </h3>
                <h4 class="text-md-left text-center mb-2"><?php foreach($templateParams["artisti"][$evento["IDEvento"]] as $artista){
                    $str = $artista["PseudonimoArtista"];
                    if ($artista["IDArtista"] != end($templateParams["artisti"][$evento["IDEvento"]])["IDArtista"]){
                        $str.=" - ";
                    }
                    echo $str;
                }?></h4>
                <div class="event-info text-md-left text-center">
                    <p class="font-description"> <?php echo $evento["Luogo"]?> </p>
                    <p class="date font-italic"> <?php echo $evento["DataEvento"]?> </p>
                </div>
            </div>
        </div>
        <hr />
        <div class="ticket-kind chart_event" id="e_<?php echo $evento["IDEvento"];?>">
            <div class="row mt-3">
                <p class="col-md-1 m-0 p-0"></p>
                <span class="col-2 col-md-1 fas fa-minus-circle menoCarrello fa-2x text-right m-0 px-0 pb-0 pt-md-1 pt-2 cursor-pointer"></span>
                <p class="col-2 col-md-1 text-center p-0 m-0 font-medium tickets-number"><?php echo $evento["NumeroBiglietti"]?></p>
                <span class="col-2 col-md-1 fas fa-plus-circle piuCarrello fa-2x text-left m-0 px-0 pb-0 pt-md-1 pt-2 cursor-pointer"></span>
                <p class="col-1 col-md-2 m-0 p-0"></p>
                <p class="col-3 col-md-4 text-right p-0 mt-2 ticket-price">€ <?php echo $evento["PrezzoBiglietto"]; $i++;?></p>
                <p class="col-2 col-md-2 text-left p-0 pl-1 mt-2"> cad.</p>
            </div>
        </div>
        <hr />
        <div class="row font-medium mt-3 pb-0">
            <p class="col-5 text-center p-0 m-0">TOTALE</p>
            <p class="col-7 col-md-4 text-right p-0 m-0 totale-evento"></p>
            <p class="col-md-2 p-0 m-0"> </p>
        </div>
    </div>
    <div class="col-md-2"></div>
</div>
<?php endforeach ?>

<div class="row">
    <div class="col-md-2"></div>
    <hr class="col-md-8"/>
    <div class="col-md-2"></div>
</div>

<div class="row font-big">
    <p class="col-md-6 col-6 text-center p-0 m-0 mt-2 mb-3"> TOTALE</p>
    <p class="col-md-4 col-6 text-md-right text-center p-0 m-0 mt-2 mb-3 totale-carrello"></p>
    <p class="col-md-2 p-0 m-0"> </p>
</div>

<div class="row mt-md-3 mt-1">
    <div class="col-1 col-md-3 p-0 m-0"> </div>
    <button type="button" class="purple-btn col-10 col-md-6 p-3 m-0 mb-5 rounded-pill">Procedi all'acquisto</button>
    <div class="col-1 col-md-3 p-0 m-0"> </div>
</div>
