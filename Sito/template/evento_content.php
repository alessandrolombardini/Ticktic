<div data-idevento=<?php echo $templateParams["informazioniEvento"]["IDEvento"] ?> class="row contenitoreID">
    <div class="col-1 col-md-2"></div>
    <div class="roundend-corners col-10 col-md-8 bg-white border mt-2 mb-4 px-4 py-3 mr-0 shadow-sm concert-tickets">
        <div class="row mb-3 mt-0 text-center">
            <div class="col-md-5 col-12 pb-3 d-inline float-left">
                <img style="width: 100%; display: block; float:left "class="img-fluid" src="./images/eventi/<?php echo $templateParams["informazioniEvento"]["ImmagineEvento"] ?>" alt=""/>
            </div>
            <div class="col-md-7 col-12">
                <section>
                    <h3><?php echo $templateParams["informazioniEvento"]["NomeEvento"] ?></h3>
                    <p><?php foreach($templateParams["artisti"] as $artista){ echo $artista["Pseudonimo"]; }?></p> 
                    <p><?php echo $templateParams["informazioniEvento"]["DescrizioneEvento"] ?></p>
                    <p><?php echo $templateParams["informazioniEvento"]["Luogo"] ?></p> 
                    <p><?php echo $templateParams["informazioniEvento"]["DataEvento"] ?></p>
                </section>  
                <hr/>
            </div>
        </div>
        <hr />
        <div class="ticket-kind">
            <div class="row mt-3">
                <p class="col-3 text-center"> Biglietto </p>
                <p class="col-2 col-md-4 text-right pr-1"> cad.</p>
                <p class="col-3 col-md-2 text-left p-0 ticket-price">€ <?php echo $templateParams["informazioniEvento"]["PrezzoBiglietto"] ?></p>
                <i class="col-1 fas fa-minus-circle fa-2x pr-0 text-right cursor-pointer"></i>
                <p class="col-1 text-center font-mediumlittle tickets-number">1</p>
                <i class="col-1 fas fa-plus-circle fa-2x pl-0 text-left cursor-pointer"></i>
                <div class="col-1"></div>
            </div>
            
            <hr />
            <div class="row mb-3">
                <p class="col-9 col-md-10 text-right pr-4 font-weight-bold"> Totale parziale   </p>
                <p class="col-1 col-md-1 text-right  p-0 font-weight-bold totale-parziale"></p>
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
    </div>
    <div class="col-1 col-md-2"></div>
</div>
