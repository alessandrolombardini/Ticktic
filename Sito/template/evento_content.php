<div data-idevento=<?php echo $templateParams["informazioniEvento"]["IDEvento"] ?> class="contenitoreID">
    <div class="col-0 col-md-1"></div>
    <div class="roundend-corners col-12 col-md-10 bg-white border mt-2 mb-4 px-4 py-3 mr-0 shadow-sm concert-tickets">
        <?php if(isset($templateParams["msg"])): ?>
            <div class="row">
                <p class="col-12 my-2 text-center align-center
                <?php if($templateParams["error"] == 's'){echo "error-msg";} else {echo "good-msg";}?>"><?php echo $templateParams["msg"]?></p>
            </div>
        <?php endif ?>
        <div class="row mb-3 mt-0 text-center">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-5 pb-3 pl-0 pr-0 d-inline float-left">
                <img style="width: 100%; float:left; "class="img-fluid" src="./images/eventi/<?php echo $templateParams["informazioniEvento"]["ImmagineEvento"] ?>" alt=""/>
            </div>
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-7">
                <section>
                    <h3 class="titolo-viola"><?php echo $templateParams["informazioniEvento"]["NomeEvento"] ?></h3>
                    <p><?php foreach($templateParams["artisti"] as $artista){ echo $artista["PseudonimoArtista"]; }?></p>
                    <p><?php echo $templateParams["informazioniEvento"]["DescrizioneEvento"] ?></p>
                    <p><?php echo $templateParams["informazioniEvento"]["Luogo"] ?></p>
                    <p><?php echo $templateParams["informazioniEvento"]["DataEvento"] ?></p>
                </section>
            </div>
        </div>
        <?php if(!isset($templateParams["msg"])): ?>
            <div>
                <hr />
                <div class="row mt-3">
                    <p class="col-3 text-center"> Biglietto </p>
                    <p class="col-3 col-md-4 text-right"> cad.</p>
                    <p class="col-2 col-md-2 text-left p-0 ticket-p">€ <?php echo $templateParams["informazioniEvento"]["PrezzoBiglietto"] ?></p>
                    <i class="col-1 menoEvento fas fa-minus-circle fa-2x text-right cursor-pointer"></i>
                    <p class="col-1 text-center chill font-mediumlittle tickets-num">1</p>
                    <i class="col-1 piuEvento fas fa-plus-circle fa-2x pl-0 text-left cursor-pointer"></i>
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
                        <div class="form-group text-center">
                            <a href="./evento.php?IDEvento=<?php echo $templateParams["informazioniEvento"]["IDEvento"] ?>"><button type="button" class="purple-btn col-10 shadow-sm p-3 mt-4 rounded-pill btn_aggiungi_al_carrello" id="declinaBtn">Aggiungi al carrello</button></a>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif ?>
    </div>
    <div class="col-0 col-md-1"></div>
</div>
