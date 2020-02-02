<div class="container">
    <h3 class="mb-3">Creazione notifiche</h4>
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


