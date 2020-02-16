<div class="row">
  <div class="col-0 col-md-1"></div>
  <div class="col-12 col-md-10">
    <div class="row mb-md-3 mb-0 mt-5">
        <p class="titolo_sezioni col-8 col-md-7 mt-2 mb-0">Informazioni</p>
        <a class="col-md-5 col-4 text-right pt-3 cursor-pointer purple-black-link font-weight-bold" href="account.php"> Indietro </a>
    </div>
        <hr class="mt-1 mx-2"/>
        <?php require_once __DIR__.'/../check_errori.php'; ?>
        <div class="row mt-3">
            <div class="col-0 col-md-2"></div>
            <div class="col-12 col-md-8 p-0 mb-4">
            <table class="table table-striped table-bordered mt-2 mb-0">
                <tr class="thead-dark">
                    <th id="info" class="pt-4 pb-4 text-center h5" colspan="2">Informazioni account</th>
                </tr>    
                <tr>
                    <th class="col-12" headers="info" id="nome">Nome</th>
                    <td headers="info nome" class="col-12 text-right"><?php echo$templateParams["account"]["Nome"] ?></td>
                </tr>
                <tr>
                    <th headers="info" id="cognome">Cognome</th>
                    <td headers="info cognome" class="text-right"><?php echo$templateParams["account"]["Cognome"] ?></td>
                </tr>
                <tr>
                    <th headers="info" id="email">Email</th>
                    <td headers="info email" class="text-right overflow-auto"><?php echo$templateParams["account"]["Email"] ?></td>
                </tr>
                <?php if ($_SESSION["autorizzazione"] != "AMMINISTRATORE"):?>
                    <tr>
                        <th headers="info" id="datanascita">Data di nascita</th>
                        <td headers="info datanascita" class="text-right"><?php echo date("d/m/Y", strtotime($templateParams["account"]["DataNascita"]))?></td>
                    </tr>
                    <tr>
                        <th headers="info" id="sesso">Sesso</th>
                        <td headers="info sesso" class="text-right"><?php if ($templateParams["account"]["Sesso"] == 'm') {echo "maschile";} else if ($templateParams["account"]["Sesso"] == 'f'){echo"femminile";} else {echo "altro";}?></td>
                    </tr>
                    <tr>
                        <th headers="info" id="citta">Città</th>
                        <td headers="info citta" class="text-right"><?php echo $templateParams["account"]["Citta"] ?></td>
                    </tr>
                    <tr>
                        <th headers="info" id="indirizzo">Indirizzo</th>
                        <td headers="info indirizzo" class="text-right"><?php echo $templateParams["account"]["Indirizzo"] ?></td>
                    </tr>
                    <tr>
                        <th headers="info" id="cap">CAP</th>
                        <td headers="info cap" class="text-right"><?php echo $templateParams["account"]["CAP"] ?></td>
                    </tr>
                    <?php if ($_SESSION["autorizzazione"] == "ORGANIZZATORE"):?>
                        <th headers="info" id="iban">IBAN</th>
                        <td headers="info iban" class="text-right"><?php echo$templateParams["account"]["IBAN"]?></td>
                    <?php endif ?>
                <?php endif ?>
            </table>
            </div>
            <div class="col-0 col-md-2"></div>
        </div>
        <div class="row mb-3">
            <div class="col-md-2"></div>
            <div class="col-12 col-md-4">
                <div class="form-group text-center mb-1">
                    <a class="d-inline-block text-white purple-btn col-10 shadow-sm p-3 mt-4 rounded-pill" href="modifica_informazioni_account.php">Modifica informazioni</a>
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="form-group text-center">
                    <a class="d-inline-block text-white purple-btn col-10 shadow-sm p-3 mt-4 rounded-pill" href="modifica_password.php">Modifica password</a>
                </div>
            </div>
            <div class="col-md-2"></div>
        </div>
  </div>
  <div class="col-0 col-md-1"></div>
</div>



