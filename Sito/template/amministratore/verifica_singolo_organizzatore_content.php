<div class="row">
  <div class="col-0 col-md-1"></div>
  <div class="col-12 col-md-10">
    <div class="row mb-3 mt-5">
      <h3 class="col-8 col-md-7">Autorizza organizzatore</h3>
      <a class="col-md-5 col-4 text-right pt-3 cursor-pointer purple-black-link font-weight-bold" href="verifica_nuovi_organizzatori.php"> Annulla </a>
    </div>
    <hr/>
    <?php if (isset($templateParams["msg"]) && $templateParams["msg"]!= "0"):?>
        <p class="col-8 mb-3"> <?php echo $templateParams["msg"] ?> </p> 
    <?php endif?>
    <div class="row">
        <div class="col-0 col-md-2"></div>
        <div class="table col-12 col-md-8">
          <table class="table table-striped table-bordered">
              <tr class="thead-dark">
                <th id="info" class="pt-4 pb-4 text-center h5" colspan="2">Informazioni organizzatore</th>
              <tr>
              <tr>
                <th header="info" id="nome">Nome</td>
                <td header="info nome" class="text-right"><?php echo $templateParams["informazioni_gestore"]["Nome"] ?></td>
              </tr>
              <tr>
                <th header="info" id="cognome">Cognome</td>
                <td header="info cognome" class="text-right"><?php echo $templateParams["informazioni_gestore"]["Cognome"] ?></td>
              </tr>
              <tr>
                <th header="info" id="email">Email</td>
                <td header="info email" class="text-right"><?php echo $templateParams["informazioni_gestore"]["Email"] ?></td>
              </tr>
              <tr>
                <th header="info" id="datanascita">Data di nascita</td>
                <td header="info datanascita" class="text-right"><?php echo $templateParams["informazioni_gestore"]["DataNascita"] ?></td>
              </tr>
              <tr>
                <th header="info" id="sesso">Sesso</td>
                <td header="info sesso" class="text-right"><?php echo $templateParams["informazioni_gestore"]["Sesso"] ?></td>
              </tr>
              <tr>
                <th header="info" id="citta">Città</td>
                <td header="info citta" class="text-right"><?php echo $templateParams["informazioni_gestore"]["Citta"] ?></td>
              </tr>
              <tr>
                <th header="info" id="indirizzo">Indirizzo</td>
                <td header="info indirizzo" class="text-right"><?php echo $templateParams["informazioni_gestore"]["Indirizzo"] ?></td>
              </tr>
              <tr>
                <th header="info" id="cap">CAP</td>
                <td header="info cap" class="text-right"><?php echo $templateParams["informazioni_gestore"]["CAP"] ?></td>
              </tr>
          </table>
        </div>
        <div class="col-0 col-md-2"></div>
    </div>
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-6 col-md-4">
            <div class="form-group text-center">
              <a class="text-white" href="./verifica_e_processa_singolo_organizzatore.php?id=<?php echo $_GET["id"]?>&valutazione=s"><button type="button" class="purple-btn col-10 shadow-sm p-3 mt-4 rounded-pill" id="accettaBtn">Accetta</button></a>
            </div>
        </div>
        <div class="col-6 col-md-4">
            <div class="form-group text-center">
              <a class="text-white" href="./verifica_e_processa_singolo_organizzatore.php?id=<?php echo $_GET["id"]?>&valutazione=n"><button type="button" class="purple-btn col-10 shadow-sm p-3 mt-4 rounded-pill" id="declinaBtn">Declina</button></a>
            </div>
        </div>
        <div class="col-md-2"></div>
    </div>
  </div>
  <div class="col-0 col-md-1"></div>
</div>


