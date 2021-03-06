<div class="row">
  <div class="col-0 col-md-1"></div>
  <div class="col-12 col-md-10">
    <div class="row mb-md-3 mb-0 mt-5 align-items-end">
        <p class="titolo_sezioni col-8 col-md-7 mt-2 mb-0">Creazione notifiche</p>
        <a class="col-md-5 col-4 text-right pt-3 cursor-pointer purple-black-link font-weight-bold" href="area_amministratore.php"> Annulla </a>
    </div>
    <hr class="mt-1 mx-2"/>
    <?php if(isset($templateParams["msg"])): ?>
        <div class="row">
            <p class="col-12 my-2
            <?php if($templateParams["error"] == 's'){echo "error-msg";} else {echo "good-msg";}?>"><?php echo $templateParams["msg"]?></p>
        </div>
    <?php endif ?>
    <div class="container col-12 col-md-12">
        <form action="./processa_inserimento_notifica_amministratore.php" method="POST">
            <div class="mb-3">
                <label for="titolo">Titolo *</label>
                <input type="text" class="form-control" id="titolo" name="titolo"/>
            </div>
            <div class="mb-3">
                <label for="testo">Testo *</label>
                <textarea class="form-control" id="testo" name="testo" rows="4"></textarea>
            </div>
            <div class="d-block my-3">
                <fieldset>
                    <legend>Destinazione *</legend>
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
  </div>
  <div class="col-1 col-md-1"></div>
</div>
