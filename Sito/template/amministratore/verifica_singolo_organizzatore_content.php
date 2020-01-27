<?php
    $templateParams["informazioni_gestore"] = $dbh->ottieniInformazioniOrganizzatore($_GET["id"]);
?>

<div class="container">
  <div class="row col-12 col-md-12 row justify-content-center">
    <h3 class="d-block">Autorizza organizzatore</h3>
  </div>
  <div class="row">
      <div class="col-1 col-md-2"></div>
      <div class="table col-10 col-md-8">
        <table class="table">
            <tr>
              <th id="nome">Nome</td>
              <td header="nome"><?php echo $templateParams["informazioni_gestore"]["Nome"] ?></td>
            </tr>
            <tr>
              <th id="cognome">Cognome</td>
              <td header="cognome"><?php echo $templateParams["informazioni_gestore"]["Cognome"] ?></td>
            </tr>
            <tr>
              <th id="email">Email</td>
              <td header="email"><?php echo $templateParams["informazioni_gestore"]["Email"] ?></td>
            </tr>
            <tr>
              <th id="datanascita">Data di nascita</td>
              <td header="datanascita"><?php echo $templateParams["informazioni_gestore"]["DataNascita"] ?></td>
            </tr>
            <tr>
              <th id="sesso">Sesso</td>
              <td header="sesso"><?php echo $templateParams["informazioni_gestore"]["Sesso"] ?></td>
            </tr>
            <tr>
              <th id="citta">Città</td>
              <td header="citta"><?php echo $templateParams["informazioni_gestore"]["Citta"] ?></td>
            </tr>
            <tr>
              <th id="indirizzo">Indirizzo</td>
              <td header="indirizzo"><?php echo $templateParams["informazioni_gestore"]["Indirizzo"] ?></td>
            </tr>
            <tr>
              <th id="cap">CAP</td>
              <td header="cap"><?php echo $templateParams["informazioni_gestore"]["CAP"] ?></td>
            </tr>
        </table>
      </div>
      <div class="col-1 col-md-2"></div>
  </div>
  <div class="row">
      <div class="col-md-2"></div>
      <div class="col-6 col-md-4">
          <div class="form-group text-center">
              <button type="button" class="purple-btn col-10 shadow-sm p-3 mt-4 rounded-pill" id="accettaBtn"><a href="./verifica_e_processa_singolo_organizzatore.php?id=<?php echo $_GET["id"]?>&valutazione=s">Accetta</a></button>
          </div>
      </div>
      <div class="col-6 col-md-4">
          <div class="form-group text-center">
              <button type="button" class="purple-btn col-10 shadow-sm p-3 mt-4 rounded-pill" id="declinaBtn"><a href="./verifica_e_processa_singolo_organizzatore.php?id=<?php echo $_GET["id"]?>&valutazione=n">Declina</a></button>
          </div>
      </div>
      <div class="col-md-2"></div>
  </div>
</div>


