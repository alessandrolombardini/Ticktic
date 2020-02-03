<div class="container">
  <div class="row col-12 col-md-12 justify-content-center">
    <h3 class="mb-3">Autorizza artista</h3>
  </div>
  <div class="row">
      <div class="col-1 col-md-2"></div>
      <div class="table col-10 col-md-8">
        <table class="table">
            <tr>
              <th id="nome">Pseudonimo</td>
              <td header="nome"><?php echo $templateParams["informazioni_artista"]["PseudonimoArtista"] ?></td>
            </tr>
            <?php if(!empty($templateParams["informazioni_artista"]["Descrizione"])): ?>
              <tr>
                <th id="cognome">Descrizione</td>
                <td header="cognome"><?php echo $templateParams["informazioni_artista"]["Descrizione"] ?></td>
              </tr>
            <?php endif ?>
            <?php if(!empty($templateParams["informazioni_artista"]["ImmagineArtista"])): ?>
              <tr>
                <th id="immagine">Immagine</td>
                <td header="immagine"><?php echo $templateParams["informazioni_artista"]["ImmagineArtista"] ?></td>
              </tr>
            <?php endif ?>
        </table>
      </div>
      <div class="col-1 col-md-2"></div>
  </div>
  <div class="row">
      <div class="col-md-2"></div>
      <div class="col-6 col-md-4">
          <div class="form-group text-center">
              <button type="button" class="purple-btn col-10 shadow-sm p-3 mt-4 rounded-pill" id="accettaBtn"><a href="./verifica_e_processa_singolo_artista.php?id=<?php echo $_GET["id"]?>&valutazione=s">Accetta</a></button>
          </div>
      </div>
      <div class="col-6 col-md-4">
          <div class="form-group text-center">
              <button type="button" class="purple-btn col-10 shadow-sm p-3 mt-4 rounded-pill" id="declinaBtn"><a href="./verifica_e_processa_singolo_artista.php?id=<?php echo $_GET["id"]?>&valutazione=n">Declina</a></button>
          </div>
      </div>
      <div class="col-md-2"></div>
  </div>
</div>


