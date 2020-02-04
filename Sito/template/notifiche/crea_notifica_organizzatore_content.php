<div class="row">
  <div class="col-1"></div>
  <div class="col-10">
    <div class="row mb-3 mt-5">
        <h3 class="col-8 col-md-7">Creazione notifiche</h3>
        <a class="col-md-5 col-4 text-right pt-3 cursor-pointer purple-black-link font-weight-bold" href="area_organizzatore.php"> Annulla </a>
    </div>
    <hr/>
    <?php if (isset($templateParams["msg"]) && $templateParams["msg"]!= "0"):?>
        <p class="col-8 mb-3"> <?php echo $templateParams["msg"] ?> </p> 
    <?php endif?>
    <div class="container col-12 col-md-12">
        <form action="./processa_inserimento_notifica_organizzatore.php" method="POST">
            <div class="mb-3">
                <label for="titolo">Titolo</label>
                <input type="text" class="form-control" name="titolo"/>
            </div>
            <div class="mb-3"> 
                <label for="testo">Testo</label>
                <textarea class="form-control" id="testo" name="testo" rows="4"></textarea>
            </div>
            <input type="hidden" name="IDEvento" value="<?php echo $templateParams["IDEvento"]?>" />
            <div class="mb-3">
                <input class="purple-btn btn-primary btn-lg btn-block rounded-pill" value="Pubblica" type="submit"/>
            </div>
        </form>
    </div>
  </div>
  <div class="col-1"></div>
</div>

