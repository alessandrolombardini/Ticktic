<div class="row">
    <div class="col-md-2 col-1"></div>
    <div class="col-md-8 col-10">
        <form action="#">
            <h3 class="mb-5">Pagamento</h3>
            <div class="row mb-3">
                <div class="col-md-6 mb-3">
                    <label for="intestatario">Intestatario Carta</label>
                    <input type="text" class="form-control" id="intestatario" name="intestatario"/>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="numero">Numero Carta</label>
                    <input type="text" class="form-control" id="numero" name="numero"/>
                </div>
            </div>
            <div class="row">
                <div class="col-md-5 col-12 mb-3">
                    <label for="dataScadenza">Data di scadenza:</label>
                    <input type="month" id="dataScadenza" name="dataScadenza" class="form-control" min="<?php echo date("Y-m"); ?>" value="<?php $d=strtotime("+6 Years"); echo date("Y-m", $d) ?>"/>
                </div>
                <div class="col-md-3 col-12 mb-3">
                    <label for="cvv">CVV:</label>
                    <input type="text" class="form-control" id="cvv" name="cvv"/>
                </div>
                <div class="col-12 col-md-4 mb-3 inline-block text-center" id="card-selector">
                    <img src="./images/carte/mastercard.png" alt="select_mastercard" class="selected col-md-3"/>
                    <img src="./images/carte/visa.png" alt="select_visa" class="col-md-3"/>
                    <img src="./images/carte/maestro.png" alt="select_maestro" class="col-md-3"/>
                    <img src="./images/carte/nexi.png" alt="select_nexi" class="col-md-3"/>
                </div>
            </div>
        </form>
    </div>
    <div class="col-md-2 col-1"></div>
</div>  
<div class="row mt-3">
    <div class="col-md-2 col-3 p-0 m-0"> </div>
    <a class="col-md-2 text-center col-6 p-3 m-0 mb-md-5 mb-0 cursor-pointer purple-black-link font-weight-bold"> Indietro </a>
    <div class="col-md-1 col-3 p-0 m-0"> </div>
    <div class="col-1 p-0 m-0"> </div>
    <button type="button" id="resume-btn" class="purple-btn col-md-4 col-10 p-3 m-0 mb-5 rounded-pill" href="#"><p class="mb-0">Procedi all'acquisto</p></button>
    <div class="col-md-3 col-1 p-0 m-0"> </div>
</div>