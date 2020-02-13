<div class="resume">
    <?php foreach($templateParams["eventi"] as $evento):?>
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8 col-12">
            <div class="row mt-3">
                <h3 class="col-8 col-md-7 mb-0">Riepilogo Ordine</h3>
                <a class="col-md-5 col-4 text-right pt-3 cursor-pointer purple-black-link font-weight-bold">Indietro </a>
            </div>
            <hr class="mt-1"/>
            <div class="roundend-corners col-12 bg-white border mt-2 mb-4 px-4 py-3 shadow-sm">
                <div class="container">
                    <div class="row mb-0 mt-1">
                        <img class="col-md-4 mt-1 mt-md-0 col-12 mb-3 mb-md-0 pl-0 pr-0 rounded" src="./images/eventi/<?php echo $evento["ImmagineEvento"];?>" alt="IDAYS"/>
                        <div class="col-md-8 mt-md-0 col-12 ">
                            <div class="row mb-0 align-items-end">
                                <h5 class="col-12 text-md-left text-center mb-3"> <?php echo $evento["NomeEvento"];?> </h5>
                                <h6 class="col-12 text-left mb-1"><?php foreach ($templateParams["artisti"][$evento["IDEvento"]] as $artista){
                                    $str = $artista["PseudonimoArtista"];
                                    if ($artista["IDArtista"] != end($templateParams["artisti"][$evento["IDEvento"]])["IDArtista"]){
                                        $str.=" - ";
                                    }
                                    echo $str;
                                }?></h6>
                                <p class="col-12 event-info text-left font-description mb-0"><?php echo $evento["Luogo"];?></p>
                            </div>
                            <div class="row mb-0 mt-md-1 align-items-end">
                                <div class="col-md-6 text-md-left text-left mt-md-0 mb-0 col-12 mt-1">
                                    <p class="mb-0 date font-italic"> <?php echo substr($evento["DataEvento"], 0, -3);?></p>
                                </div>
                                <div class="col-md-3 mt-md-1 mb-0 col-6 mt-3">
                                </div>
                                <div class="col-md-3 text-md-right text-right align-text-bottom mt-md-0 mb-0 col-6 mt-3">
                                    <h5 class="mb-0 totale-evento-resume-<?php echo $evento["IDEvento"];?>"></h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-2"></div>
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

    <div class="row chart-total font-big">
        <p class="col-6 text-center p-0 m-0 mt-2 mb-3"> TOTALE</p>
        <p class="col-4 text-right p-0 m-0 mt-2 mb-3 totale-spesa"></p>
        <p class="col-2 p-0 m-0"> </p>
    </div>

    <div class="row mt-md-3 mt-1">
        <div class="col-1 col-md-3 p-0 m-0"> </div>
        <input type="submit" value="Procedi all'acquisto" class="purple-btn col-10 col-md-6 p-3 m-0 mb-5 rounded-pill"/>
        <div class="col-1 col-md-3 p-0 m-0"> </div>
    </div>
</div>
