<div class="row">
  <div class="col-1"></div>
  <div class="col-10">
    <div class="row mb-3 mt-5">
      <h3 class="col-8 col-md-7">Autorizza artista</h3>
      <a class="col-md-5 col-4 text-right pt-3 cursor-pointer purple-black-link font-weight-bold" href="area_amministratore.php"> Annulla </a>
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
                <th id="info" class="pt-4 pb-4 text-center h5" colspan="2">Informazioni artista</th>
            <tr>
            <tr>
              <th header="info" id="nome">Pseudonimo</td>
              <td header="info nome" class="text-right"><?php echo $templateParams["informazioni_artista"]["PseudonimoArtista"] ?></td>
            </tr>
            <?php if(!empty($templateParams["informazioni_artista"]["Descrizione"])): ?>
              <tr>
                <th header="info" id="cognome">Descrizione</td>
                <td header="info cognome"  class="text-right"><?php echo $templateParams["informazioni_artista"]["Descrizione"] ?></td>
              </tr>
            <?php else: ?>
              <tr>
                <th header="info" id="cognome">Descrizione</td>
                <td header="info cognome"  class="text-right small"><?php echo "*non inserito" ?></td>
              </tr>
            <?php endif ?>
            <?php if(!empty($templateParams["informazioni_artista"]["ImmagineArtista"])): ?>
              <tr>
                <th header="info" id="immagine">Immagine</td>
                <td header="info immagine"  class="text-right"><img class="col-10 col-md-10" src="images/artisti/<?php echo $templateParams["informazioni_artista"]["ImmagineArtista"]?>" alt="immagine dell'artista"/></td>
              </tr>
            <?php else: ?>
              <tr>
                <th header="info" id="immagine">Immagine</td>
                <td header="info immagine"  class="text-right small"><?php echo "*non inserito" ?></td>
              </tr>
            <?php endif ?>
        </table>
      </div>
      <div class="col-0 col-md-2"></div>
    </div>
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-6 col-md-4">
            <div class="form-group text-center">
                <a class="text-white" href="./verifica_e_processa_singolo_artista.php?id=<?php echo $_GET["id"]?>&valutazione=s"><button type="button" class="purple-btn col-10 shadow-sm p-3 mt-4 rounded-pill" id="declinaBtn">Accetta</button></a>
            </div>
        </div>
        <div class="col-6 col-md-4">
            <div class="form-group text-center">          
             <a class="text-white" href="./verifica_e_processa_singolo_artista.php?id=<?php echo $_GET["id"]?>&valutazione=n"><button type="button" class="purple-btn col-10 shadow-sm p-3 mt-4 rounded-pill" id="declinaBtn">Declina</button></a>
            </div>
        </div>
        <div class="col-md-2"></div>
    </div>
  </div>
  <div class="col-1"></div>
</div>

