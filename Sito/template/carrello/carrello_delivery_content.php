<div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8 col-12">
        <div class="row mt-md-3">
            <h3 class="col-8 col-md-7 mb-0 mt-2 mt-md-0">Spedizione</h3>
            <a class="col-md-5 col-4 text-right pt-3 cursor-pointer purple-black-link font-weight-bold" href="#">Indietro </a>
        </div>
        <hr class="mt-1"/>
        <form id="delivery-form">
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="nome">Nome*</label>
                    <input type="text" class="form-control" id="nome" name="nome" value="<?php echo $templateParams["utente"]["Nome"]?>" required/>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="cognome">Cognome*</label>
                    <input type="text" class="form-control" id="cognome" name="cognome" value="<?php echo $templateParams["utente"]["Cognome"]?>" required/>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="indirizzo">Indirizzo*</label>
                    <input type="text" class="form-control" id="indirizzo"  name="indirizzo" value="<?php echo $templateParams["utente"]["Indirizzo"]?>" required/>
                </div>
                <div class="col-md-3 mb-3">
                    <label for="cap">CAP*</label>
                    <input type="number" max="99999" class="form-control" id="cap" name="cap" value="<?php echo $templateParams["utente"]["CAP"]?>" required/>
                </div>
                <div class="col-md-3 mb-3">
                    <label for="citta">Città*</label>
                    <input type="text" class="form-control" id="citta" name="citta" value="<?php echo $templateParams["utente"]["Citta"]?>" required/>
                </div>
            </div>
            <div class="d-block mt-2 mb-3 ml-2">
                <fieldset>
                    <legend>Tipo di spedizione:</legend>
                    <div class="custom-control custom-radio">
                        <input id="spedStandard" name="spedizione" type="radio" class="custom-control-input" value="3.99" checked required/>
                        <label class="custom-control-label" for="spedStandard">Spedizione standard - 3,99€</label> 
                    </div>
                    <div class="custom-control custom-radio">
                        <input id="spedExpress" name="spedizione" type="radio" class="custom-control-input" value="9.99" required/>
                        <label class="custom-control-label" for="spedExpress">Spedizione express - 9,99€</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input id="spedStop" name="spedizione" type="radio" class="custom-control-input" value="0.00" required/>
                        <label class="custom-control-label" for="spedStop">Ritiro sul luogo dell'evento - 0,00€</label>
                    </div>
                </fieldset>
            </div>
        </form>
        <div class="col-md-2"></div>
    </div>
</div>

<div class="row mt-md-3 mt-1">
    <div class="col-1 col-md-3 p-0 m-0"> </div>
    <button type="button" class="purple-btn col-10 col-md-6 p-3 m-0 mb-5 rounded-pill" id="payment-btn">Procedi all'acquisto</button>
    <div class="col-1 col-md-3 p-0 m-0"> </div>
</div>