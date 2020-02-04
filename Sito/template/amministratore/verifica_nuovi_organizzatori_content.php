<div class="row">
  <div class="col-1"></div>
  <div class="col-10">
    <div class="row mb-3 mt-5">
      <h3 class="col-8 col-md-7">Organizzatori da valutare</h3>
      <a class="col-md-5 col-4 text-right pt-3 cursor-pointer purple-black-link font-weight-bold" href="area_amministratore.php"> Annulla </a>
    </div>
    <hr/>
    <?php if (isset($templateParams["msg"]) && $templateParams["msg"]!= "0"):?>
          <p class="col-8 mb-3"> <?php echo $templateParams["msg"] ?> </p> 
      <?php endif?>
    <div class="row">
        <table class="table table-striped table-bordered">
          <thead>
            <tr>
              <th id="numeroInLista"></th>
              <th id="nome">Nome</th>
              <th id="cognome">Cognome</th>
              <th id="linkAdOrganizzatore"></th>
            </tr>
          </thead>
          <tbody>
            <?php $i = 1 ?>
            <?php foreach ($templateParams["organizzatoriDaAnalizzare"] as $organizzatore): ?>
              <tr>
                <th id="numero" headers="numeroInLista"><?php echo $i ?></th>
                <td headers="numero nome"><?php echo $organizzatore["Nome"] ?></td>
                <td headers="numero cognome"><?php echo $organizzatore["Cognome"] ?></td>
                <td headers="numero linkAdOrganizzatore" class="text-right"><a href="./verifica_singolo_organizzatore.php?id=<?php echo $organizzatore["IDOrganizzatore"] ?>">Apri</a></td>
              </tr>  
            <?php $i++ ?>
            <?php endforeach ?>
          </tbody>
        </table>
        </div>
    </div>
  <div class="col-1"></div>
</div>

