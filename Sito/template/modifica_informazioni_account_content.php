<div class="row">
  <div class="col-0  col-md-1"></div>
  <div class="col-12  col-md-10">
    <div class="row mb-3 mt-5">
      <h3 class="col-8 col-md-7">Modifica informazioni</h3>
      <a class="col-md-5 col-4 text-right pt-3 cursor-pointer purple-black-link font-weight-bold" href="javascript:history.back()"> Annulla </a>
    </div>
    <hr/>
    <?php if (isset($templateParams["msg"]) && $templateParams["msg"]!= "0"):?>
      <div class="row">
          <p class="col-12 my-2
          <?php if($templateParams["error"] == 's'){echo "error-msg";} else {echo "good-msg";}?>"><?php echo $templateParams["msg"]?></p>
      </div>
    <?php endif?>
    <div class="container">
      <form action="./processa_modifica_informazioni.php" method="POST">
        <div class="row pt-3">
            <div class = "col-12 col-md-4">
                <label for="nome">Nome</label>
                <input type="text" class="form-control" id="nome" name="nome" value=<?php echo$templateParams["account"]["Nome"]?> required/>
            </div>
            <div class = "col-12 col-md-4 mt-2">
                <label for="cognome">Cognome</label>
                <input type="text" class="form-control" id="cognome" name="cognome" value=<?php echo$templateParams["account"]["Cognome"]?> required/>
            </div>
            <div class = "col-12 col-md-4 mt-2">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="email" value="<?php echo$templateParams["account"]["Email"]?>" required/>
            </div>
        </div>
        <?php if ($_SESSION["autorizzazione"] != "AMMINISRATORE"):?>
            <div class="row mt-1 mt-md-2">
                <div class = "col-12 col-md-4 mt-0 mt-md-1">
                    <label for="data">Data di nascita</label>
                    <input type="date" class="form-control" name="data" id="data" value="<?php echo $templateParams["account"]["DataNascita"]?>" required/>
                </div>
                <?php if ($_SESSION["autorizzazione"] == "ORGANIZZATORE"):?>
                    <div class = "col-12 col-md-4 mt-0 mt-md-1">
                        <label for="iban">IBAN</label>
                        <input type="text" class="form-control" id="iban" name="iban" value="<?php echo$templateParams["account"]["IBAN"]?>" required/>
                    </div>
                <?php endif ?>
            </div>
            <div class="row mt-1 mt-md-2 pb-3">
                <div class = "col-12 col-md-7 mt-3 mt-md-2">
                    <label for="indirizzo">Indirizzo</label>
                    <input type="text" class="form-control" id="indirizzo"  name="indirizzo" value="<?php echo$templateParams["account"]["Indirizzo"]?>" required/>
                </div>
                <div class = "col-12 col-md-3 mt-2">
                    <label for="citta">Città</label>
                    <input type="citta" maxlength="16" class="form-control" id="citta" name="citta" value="<?php echo$templateParams["account"]["Citta"]?>"required/>
                </div>
                <div class = "col-12 col-md-2 mt-2">
                    <label for="CAP">CAP</label>
                    <input type="number" maxlength="16" class="form-control" id="CAP" name="CAP" value="<?php echo$templateParams["account"]["CAP"]?>" required/>
                </div>
            </div>
            <div class="d-block col-12 col-md-6 mb-4">
                <p class="mb-1">Sesso</p>
                <div class="custom-control custom-radio">
                    <input id="sessoMaschio" name="sesso" type="radio" value="m" class="custom-control-input" <?php if ($templateParams["account"]["Sesso"] == 'm') {echo "checked";}?> required/>
                    <label class="custom-control-label" for="sessoMaschio">Maschio</label>
                </div>
                <div class="custom-control custom-radio">
                    <input id="sessoFemmina" name="sesso" type="radio" value="f" class="custom-control-input" <?php if ($templateParams["account"]["Sesso"] == 'f') {echo "checked";}?> required/>
                    <label class="custom-control-label" for="sessoFemmina">Femmina</label>
                </div>
                <div class="custom-control custom-radio">
                    <input id="sessoAltro" name="sesso" type="radio" value="a" class="custom-control-input" <?php if (($templateParams["account"]["Sesso"] != 'm') && ($templateParams["account"]["Sesso"] != 'f')) {echo "checked";}?> required/>
                    <label class="custom-control-label" for="sessoAltro">Altro</label>
                </div>
            </div>
        <?php endif ?>
        <div class="row mt-3">
            <div class="col-md-2 col-3 p-0 m-0"> </div>
            <a class="col-md-2 text-center col-6 p-3 m-0 mb-md-5 mb-0 cursor-pointer purple-black-link font-weight-bold" href="javascript:history.back()"> Annulla </a>
            <div class="col-md-1 col-3 p-0 m-0"> </div>
            <div class="col-1 p-0 m-0"> </div>
            <input type="submit" class="purple-btn col-md-4 col-10 p-3 m-0 mb-5 rounded-pill" value="Modifica"/>
            <div class="col-md-3 col-1 p-0 m-0"> </div>
        </div>
      </form>
    </div>
  </div>
  <div class="col-0 col-md-1"></div>
</div>