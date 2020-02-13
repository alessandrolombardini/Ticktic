<div class="row">
  <div class="col-0 col-md-1"></div>
  <div class="col-12 col-md-10">
        <div class="row mb-3 mt-5">
        <h3 class="col-8 col-md-7">Informazioni Account</h3>
        <a class="col-md-5 col-4 text-right pt-3 cursor-pointer purple-black-link font-weight-bold" href="account.php"> Indietro </a>
        </div>
        <hr/>
        <?php require_once __DIR__.'/../check_errori.php'; ?>
        <div class="row">
            <div class="col-0 col-md-2"></div>
            <div class="table col-12 col-md-8 p-0 m-0">
            <table class="table table-striped table-bordered mt-2 mb-0">
                <tr>
                    <th class="col-12" header="info" id="nome">Nome</th>
                    <td header="info nome" class="col-12 text-right"><?php echo$templateParams["account"]["Nome"] ?></td>
                </tr>
                <tr>
                    <th header="info" id="cognome">Cognome</th>
                    <td header="info cognome" class="text-right"><?php echo$templateParams["account"]["Cognome"] ?></td>
                </tr>
                <tr>
                    <th header="info" id="email">Email</th>
                    <td header="info email" class="text-right overflow-auto"><?php echo$templateParams["account"]["Email"] ?></td>
                </tr>
                <?php if ($_SESSION["autorizzazione"] != "AMMINISTRATORE"):?>
                    <tr>
                        <th header="info" id="datanascita">Data di nascita</th>
                        <td header="info datanascita" class="text-right"><?php echo date("d/m/Y", strtotime($templateParams["account"]["DataNascita"]))?></td>
                    </tr>
                    <tr>
                        <th header="info" id="sesso">Sesso</th>
                        <td header="info sesso" class="text-right"><?php if ($templateParams["account"]["Sesso"] == 'm') {echo "maschile";} else if ($templateParams["account"]["Sesso"] == 'f'){echo"femminile";} else {echo "altro";}?></td>
                    </tr>
                    <tr>
                        <th header="info" id="citta">Città</th>
                        <td header="info citta" class="text-right"><?php echo $templateParams["account"]["Citta"] ?></td>
                    </tr>
                    <tr>
                        <th header="info" id="indirizzo">Indirizzo</th>
                        <td header="info indirizzo" class="text-right"><?php echo $templateParams["account"]["Indirizzo"] ?></td>
                    </tr>
                    <tr>
                        <th header="info" id="cap">CAP</th>
                        <td header="info cap" class="text-right"><?php echo $templateParams["account"]["CAP"] ?></td>
                    </tr>
                    <?php if ($_SESSION["autorizzazione"] == "ORGANIZZATORE"):?>
                        <th header="info" id="iban">IBAN</th>
                        <td header="info iban" class="text-right"><?php echo$templateParams["account"]["IBAN"]?></td>
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
                <a class="text-white" href="modifica_informazioni_account.php"><button type="button" class="purple-btn col-10 shadow-sm p-3 mt-4 rounded-pill" id="accettaBtn">Modifica informazioni</button></a>
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="form-group text-center">
                <a class="text-white" href="modifica_password.php"><button type="button" class="purple-btn col-10 shadow-sm p-3 mt-4 rounded-pill" id="declinaBtn">Modifica password</button></a>
                </div>
            </div>
            <div class="col-md-2"></div>
        </div>
  </div>
  <div class="col-0 col-md-1"></div>
</div>



