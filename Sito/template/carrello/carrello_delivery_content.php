<div class="row">
    <div class="col-md-2 col-1"></div>
    <div class="col-md-8 col-10">
        <form action="#" method="GET">
            <h3 class="mb-5">Spedizione</h3>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="nome">Nome</label>
                    <input type="text" class="form-control" id="nome" name="nome" value="<?php echo $templateParams["utente"]["Nome"]?>" required/>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="cognome">Cognome</label>
                    <input type="text" class="form-control" id="cognome" name="cognome" value="<?php echo $templateParams["utente"]["Cognome"]?>"required/>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="indirizzo">Indirizzo</label>
                    <input type="text" class="form-control" id="indirizzo"  name="indirizzo" value="<?php echo $templateParams["utente"]["Indirizzo"]?>" required/>
                </div>
                <div class="col-md-3 mb-3">
                    <label for="cap">CAP</label>
                    <input type="text" class="form-control" id="cap" name="cap" value="<?php echo $templateParams["utente"]["CAP"]?>" required/>
                </div>
                <div class="col-md-3 mb-3">
                    <label for="citta">Città</label>
                    <input type="text" class="form-control" id="citta" name="citta" value="<?php echo $templateParams["utente"]["Citta"]?>" required/>
                </div>
            </div>
            <div class="d-block mt-2 mb-3">
                <p>Tipo di spedizione:</p>
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
            </div>
        </form>
        <div class="col-md-2 col-1"></div>
    </div>
</div>
<div class="row mt-3">
    <div class="col-md-2 col-3 p-0 m-0"> </div>
    <a class="col-md-2 text-center col-6 p-3 m-0 mb-md-5 mb-0 cursor-pointer purple-black-link font-weight-bold"> Indietro </a>
    <div class="col-md-1 col-3 p-0 m-0"> </div>
    <div class="col-1 p-0 m-0"> </div>
    <button type="button" class="purple-btn col-md-4 col-10 p-3 m-0 mb-5 rounded-pill"><p class="mb-0">Procedi all'acquisto</p></button>
    <div class="col-md-3 col-1 p-0 m-0"> </div>
</div>