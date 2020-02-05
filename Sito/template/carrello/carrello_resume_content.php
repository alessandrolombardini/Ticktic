<div class="resume">
    <?php foreach($templateParams["eventi"] as $evento):?>
    <div class="row">
        <div class="col-1 col-md-2"></div>
        <div class="roundend-corners col-10 col-md-8 bg-white border mt-2 mb-4 px-4 py-3 shadow-sm">
            <div class="row m-0 p-0">
                <a class="col-12 text-right m-0 p-0" href="#"><i class="fas fa-times color-purple fa-2x close"></i></a>
            </div>
            <div class="row mb-0 mt-0">
                <img class="col-md-4 mt-1 mt-md-0 col-12 mb-3 mb-md-0" src="./images/eventi/<?php echo $evento["ImmagineEvento"]?>" alt="IDAYS"/>
                <div class="col-md-6 mt-1 mt-md-0 col-12">
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
            <div class="row font-medium m-0 pb-0">
                <p class="col-7 p-0 m-0"></p>
                <p class="col-5 text-right p-0 m-0 font-weight-bold totale-evento-resume-<?php echo $evento["IDEvento"];?>"></p>
            </div>
        </div>
        <div class="col-1 col-md-2"></div>
    </div>
    <?php endforeach?>

    <div class="row">
        <div class="col-md-1"></div>
        <hr class="col-md-10"/>
        <div class="col-md-1"></div>
    </div>

    <div class="row">
        <p class="col-6 text-center p-0 m-0"> Totale biglietti: </p>
        <p class="col-4 text-right p-0 m-0 totale-carrello"></p>
        <p class="col-2 p-0 m-0"> </p>
    </div>
    <div class="row">
        <p class="col-6 text-center p-0 m-0"> Spese di spedizione: </p>
        <p class="col-4 text-right p-0 m-0 spedizione"></p>
        <p class="col-2 p-0 m-0"> </p>
    </div>

    <div class="row">
        <div class="col-2"></div>
        <hr class="col-8"/>
        <div class="col-2"></div>
    </div>

    <div class="row chart-total">
        <p class="col-6 text-center p-0 m-0 mt-2 mb-3"> TOTALE</p>
        <p class="col-4 text-right p-0 m-0 mt-2 mb-3 totale-spesa"></p>
        <p class="col-2 p-0 m-0"> </p>
    </div>

    <div class="row mt-3">
        <div class="col-md-2 col-3 p-0 m-0"> </div>
        <a class="col-md-2 text-center col-6 p-3 m-0 mb-md-5 mb-0 cursor-pointer purple-black-link font-weight-bold"> Indietro </a>
        <div class="col-md-1 col-3 p-0 m-0"> </div>
        <div class="col-1 p-0 m-0"> </div>
        <input type="submit" value="Procedi all'acquisto" class="purple-btn col-md-4 col-10 p-3 m-0 mb-5 rounded-pill"/>
        <div class="col-md-3 col-1 p-0 m-0"> </div>
    </div>
</div>
