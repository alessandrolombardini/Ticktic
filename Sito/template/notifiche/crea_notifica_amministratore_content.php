<div class="container">
    <div class="row text-center">
        <h3 class="mb-3">Creazione notifiche</h3>
    </div>>
    <form action="./processa_inserimento_notifica_amministratore.php" method="POST">
        <div class="mb-3">
            <label for="titolo">Titolo</label>
            <input type="text" class="form-control" name="titolo"/>
        </div>
        <div class="mb-3"> 
            <label for="testo">Testo</label>
            <textarea class="form-control" id="testo" name="testo" rows="4"></textarea>
        </div>
        <div class="d-block my-3">
            <fieldset>
                <legend>Destinazione</legend>
                <div class="custom-control custom-radio">
                    <input id="utenti" name="destinazione" type="radio" value="utenti" class="custom-control-input"/>
                    <label class="custom-control-label" for="utenti">Solo utenti</label>
                </div>
                <div class="custom-control custom-radio">
                    <input id="organizzatori" name="destinazione" type="radio" value="organizzatori" class="custom-control-input"/>
                    <label class="custom-control-label" for="organizzatori">Solo organizzatori</label>
                </div>
                <div class="custom-control custom-radio">
                    <input id="tutti" name="destinazione" type="radio" value="tutti" class="custom-control-input"/>
                    <label class="custom-control-label" for="tutti">Tutti</label>
                </div>
            </fieldset>
        </div>
        <div class="mb-3">
            <input class="purple-btn btn-primary btn-lg btn-block rounded-pill" value="Pubblica" type="submit"/>
        </div>
    </form>
</div>


