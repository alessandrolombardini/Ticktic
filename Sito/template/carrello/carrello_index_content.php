<?php $i=0; foreach($templateParams["eventi"] as $evento):?>
<div class="row event">
    <div class="col-1 col-md-2"></div>
    <div class="roundend-corners col-10 col-md-8 bg-white border mt-2 mb-4 px-4 py-3 mr-0 shadow-sm concert-tickets">
        <div class="row m-0 p-0">
            <a class="col-12 text-right m-0 p-0" href="#"><i class="fas fa-times fa-2x purple-black-link close"></i></a>
        </div>
        <div class="row mb-3 mt-0">
            <img class="col-md-4 mt-1 mt-md-0 col-12 mb-3 mb-md-0" src="./images/eventi/<?php echo $evento["ImmagineEvento"]?>" alt="IDAYS"/>
            <div class="col-md-8 mt-1 mt-md-0 col-12">
                <h3 class="text-md-left text-center mb-3"> <?php echo $evento["NomeEvento"]?> </h3>
                <?php foreach($templateParams["artisti"][$evento["IDEvento"]] as $artista):?>
                    <h4 class="text-md-left text-center mb-2"> <?php echo $artista["PseudonimoArtista"]?></h4>
                <?php endforeach ?>
                <div class="event-info text-md-left text-center">
                    <p> <?php echo $evento["Luogo"]?> </p>
                    <p> <?php echo $evento["DataEvento"]?> </p>
                </div>
            </div>
        </div>
        <hr />
        <div class="ticket-kind">
            <div class="row mt-3">
                <i class="col-2 col-md-1 fas fa-minus-circle fa-2x text-right m-0 px-0 pb-0 pt-1 cursor-pointer"></i>
                <p class="col-2 col-md-1 text-center p-0 m-0 font-medium tickets-number"><?php echo $evento["NumeroBiglietti"]?></p>
                <input type="hidden" name="tickets_<?php echo $i;?>" value="<?php echo $evento["NumeroBiglietti"]; ?>"/>
                <i class="col-2 col-md-1 fas fa-plus-circle fa-2x text-left m-0 px-0 pb-0 pt-1 cursor-pointer"></i>
                <p class="col-1 col-md-3 m-0 p-0"></p>
                <p class="col-3 col-md-4 text-right p-0 mt-2 ticket-price">€ <?php echo $evento["PrezzoBiglietto"]?></p>
                <p class="col-2 col-md-2 text-left p-0 pl-1 mt-2"> cad.</p>
            </div>
        </div>
        <hr />
        <div class="row font-medium mt-3 pb-0">
            <p class="col-4 text-center p-0 m-0">TOTALE</p>
            <p class="col-4 p-0 m-0"> </p>
            <p class="col-4 text-center p-0 m-0 totale-evento"></p>
        </div>
    </div>
    <div class="col-1 col-md-2"></div>
    <input type="hidden" name="event_<?php echo $i; $i++;?>" value="<?php echo $evento["IDEvento"]; ?>"/>
</div>
<?php endforeach ?>

<div class="row">
    <div class="col-md-2"></div>
    <hr class="col-md-8"/>
    <div class="col-md-2"></div>
</div>

<div class="row font-big">
    <p class="col-6 text-center p-0 m-0 mt-2 mb-3"> TOTALE</p>
    <p class="col-4 text-right p-0 m-0 mt-2 mb-3 totale-carrello"></p>
    <p class="col-2 p-0 m-0"> </p>
</div>

<div class="row mb-3">
    <div class="col-3 p-0 m-0"> </div>
    <button type="button" class="purple-btn col-6 p-3 m-0 mb-5 rounded-pill"><p class="mb-0">Procedi all'acquisto</p></button>
    <div class="col-3 p-0 m-0"> </div>
</div>
