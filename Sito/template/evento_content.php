<div data-idevento="<?php echo $templateParams["informazioniEvento"]["IDEvento"] ?>" class="row contenitoreID mt-5 mb-5">
    <div class="col-0 col-md-1"></div>
    <div class="col-12 col-md-10">
        <div class="row mb-3">
            <p class="titolo_sezioni col-8 col-md-7">Evento</p>
        </div>
        <hr/>
    
        <div class="row d-none avviso-acquisto-evento">
                <p class="col-12 my-2 text-center align-center good-msg">Biglietto aggiunto al carrello</p>
            </div>
        <div class="roundend-corners bg-white border mt-2 mb-4 p-md-3 mr-0 shadow-sm concert-tickets p-0 m-0">
            <div class="row mb-3 mt-3 text-center">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-5 pb-3 pl-0 pr-0 d-inline float-left">
                    <img style="width: 100%; float:left; " class="img-fluid rounded pr-0 pl-0" src="./images/eventi/<?php echo $templateParams["informazioniEvento"]["ImmagineEvento"] ?>" alt="immagine evento"/>
                </div>
                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-7">
                    <div>
                        <p class="titolo_sezioni"><?php echo $templateParams["informazioniEvento"]["NomeEvento"] ?></p>
                        <!-- <p><?php /* foreach($templateParams["artisti"] as $artista){ echo $artista["PseudonimoArtista"]; } */?></p> -->
                        <p><?php echo $templateParams["informazioniEvento"]["DescrizioneEvento"] ?></p>
                        <p class="font-italic"><?php echo $templateParams["informazioniEvento"]["Luogo"] ?></p>
                        <p class="font-italic"><?php echo date("d/m/Y h:m", strtotime(substr($templateParams["informazioniEvento"]["DataEvento"], 0, -3)));?></p>
                        <?php if(isset($templateParams["informazioniEvento"]["NoteEvento"]) && $templateParams["informazioniEvento"]["NoteEvento"] != ""): ?>
                            <p><small>Note: <?php echo $templateParams["informazioniEvento"]["NoteEvento"]?></small></p>
                        <?php endif ?>

                    </div>
                </div>
            </div>
            <?php if(!isset($templateParams["msg"])): ?>
                <div>
                    <hr />
                    <div class="row mt-3">
                        <p class="col-3 text-center"> Biglietto </p>
                        <p class="col-3 col-md-4 text-right"> cad.</p>
                        <p class="col-2 col-md-2 text-left p-0 ticket-p">€ <?php echo $templateParams["informazioniEvento"]["PrezzoBiglietto"] ?></p>
                        <span class="col-1 menoEvento fas fa-minus-circle fa-2x text-right cursor-pointer"></span>
                        <p class="col-1 text-center chill font-mediumlittle tickets-num">1</p>
                        <span class="col-1 piuEvento fas fa-plus-circle fa-2x pl-0 text-left cursor-pointer"></span>
                        <div class="col-0 col-sm-1"></div>
                    </div>
                    <hr />
                    <div class="row mb-3">
                        <p class="col-9 col-md-10 text-right pr-4 font-weight-bold"> Totale parziale </p>
                        <p class="col-1 col-md-1 text-right  p-0 font-weight-bold totale-e"></p>
                        <div class="col-2 col-md-1"></div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-12 col-md-12">
                            <div class=" text-center row">
                                <a href="./evento.php?IDEvento=<?php echo $evento["IDEvento"]?>" class="purple-btn col-10 shadow-sm p-3 mx-auto mt-4 rounded-pill btn_aggiungi_al_carrello" id="declinaBtn">Aggiungi al carrello</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif ?>
        </div>
    </div>
    <div class="col-0 col-md-1"></div>
</div>
