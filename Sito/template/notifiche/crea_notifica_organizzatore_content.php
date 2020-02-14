<div class="row">
  <div class="col-0 col-md-1"></div>
  <div class="col-12 col-md-10">
    <div class="row mb-3 mt-5">
        <h3 class="col-8 col-md-7">Creazione notifiche</h3>
        <a class="col-md-5 col-4 text-right pt-3 cursor-pointer purple-black-link font-weight-bold" href="prossimi_eventi_organizzatore.php"> Annulla </a>
    </div>
    <hr/>
    <?php if(isset($templateParams["msg"])): ?>
        <div class="row">
            <p class="col-12 my-2
            <?php if($templateParams["error"] == 's'){echo "error-msg";} else {echo "good-msg";}?>"><?php echo $templateParams["msg"]?></p>
        </div>
    <?php endif ?>
    <div class="container col-12 col-md-12">
        <form action="./processa_inserimento_notifica_organizzatore.php" method="POST">
            <div class="mb-3">
                <label for="titolo">Titolo *</label>
                <input type="text" id="titolo" class="form-control" name="titolo"/>
            </div>
            <div class="mb-3">
                <label for="testo">Testo *</label>
                <textarea class="form-control" id="testo" name="testo" rows="4"></textarea>
            </div>
            <input type="hidden" name="IDEvento" value="<?php echo $templateParams["IDEvento"]?>" />
            <div class="mb-3">
                <input class="purple-btn btn-primary btn-lg btn-block rounded-pill" value="Pubblica" type="submit"/>
            </div>
        </form>
    </div>
  </div>
  <div class="col-0 col-md-1"></div>
</div>
