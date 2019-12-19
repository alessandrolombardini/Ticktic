<div class="row" id="chart-delivery">
    <div class="col-md-2 col-1"></div>
    <div class="col-md-8 col-10">
        <form action="#" method="GET">
            <h3 class="mb-3">Spedizione</h3>
            <div class="row">
                <div class="col-md-6 mb-3">
                <label for="nome">Nome</label>
                <input type="text" class="form-control" id="nome" name="nome" required/>
                </div>
                <div class="col-md-6 mb-3">
                <label for="cognome">Cognome</label>
                <input type="text" class="form-control" id="cognome" name="cognome" required/>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 mb-3">
                    <label for="indirizzo">Indirizzo</label>
                    <input type="text" class="form-control" id="indirizzo"  name="indirizzo" required/>
                </div>
            </div>
            <div class="row">
                <div class="col-md-5 mb-3">
                <label for="citta">Città</label>
                <input type="text" class="form-control" id="citta" name="citta" required/>
                </div>
                <div class="col-md-2 col-6 mb-3">
                <label for="cap">CAP</label>
                <input type="text" class="form-control" id="cap" name="cap" required/>
                </div>
                <div class="col-md-2 col-6 mb-3">
                <label for="provincia">Provincia</label>
                <input type="text" class="form-control" id="provincia" name="provincia" required/>
                </div>
                <div class="col-md-3 mb-3">
                <label for="Nazione">Nazione</label>
                <input type="text" class="form-control" id="nazione" name="nazione" required/>
                </div>
            </div>
            <div class="d-block mt-2 mb-3">
                <p>Tipo di spedizione:</p>
                <div class="custom-control custom-radio">
                <input id="spedStandard" name="spedizione" type="radio" class="custom-control-input" checked required/>
                <label class="custom-control-label" for="spedStandard">Spedizione standard - 3,99€</label>
                </div>
                <div class="custom-control custom-radio">
                <input id="spedExpress" name="spedizione" type="radio" class="custom-control-input" required/>
                <label class="custom-control-label" for="spedExpress">Spedizione express - 9,99€</label>
                </div>
                <div class="custom-control custom-radio">
                <input id="spedStop" name="spedizione" type="radio" class="custom-control-input" required/>
                <label class="custom-control-label" for="spedNo">Ritiro sul luogo dell'evento - 0,00€</label>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-3 p-0 m-0"> </div>
                <button class="btn col-6 p-3 m-0 mb-5 rounded-pill"><p class="mb-0">Procedi all'acquisto</p></button>
                <div class="col-3 p-0 m-0"> </div>
            </div>
            </form>
        </div>
        </div>
        <div class="col-md-2 col-1"></div>
    </div>
</div>