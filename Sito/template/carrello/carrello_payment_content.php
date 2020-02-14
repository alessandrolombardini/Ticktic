<div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8 col-12">
        <div class="row mt-3">
            <h3 class="col-8 col-md-7 mb-0">Pagamento</h3>
            <a class="col-md-5 col-4 text-right pt-3 cursor-pointer purple-black-link font-weight-bold" href="#">Indietro </a>
        </div>
        <hr class="mt-1"/>
        <form id="payment-form">
            <div class="row mb-3">
                <div class="col-md-6 mb-3">
                    <label for="intestatario">Intestatario Carta</label>
                    <input type="text" class="form-control" id="intestatario" name="intestatario" required/>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="numero">Numero Carta</label>
                    <input type="number" min="1111111111111111" max="9999999999999999"class="form-control" id="numero" name="numero" required/>
                </div>
            </div>
            <div class="row">
                <div class="col-md-5 col-12 mb-3">
                    <label for="dataScadenza">Data di scadenza:</label>
                    <input type="month" id="dataScadenza" name="dataScadenza" class="form-control" min="<?php echo date("Y-m"); ?>" value="<?php $d=strtotime("+6 Years"); echo date("Y-m", $d) ?>" required/>
                </div>
                <div class="col-md-3 col-12 mb-3">
                    <label for="cvv">CVV:</label>
                    <input type="number" min="111" max="999" class="form-control" id="cvv" name="cvv" required/>
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
    <div class="col-md-2"></div>
</div>  
<div class="row mt-md-3 mt-1">
    <div class="col-1 col-md-3 p-0 m-0"> </div>
    <button type="button" class="purple-btn col-10 col-md-6 p-3 m-0 mb-5 rounded-pill" id="resume-btn"><p class="mb-0">Procedi all'acquisto</p></button>
    <div class="col-1 col-md-3 p-0 m-0"> </div>
</div>