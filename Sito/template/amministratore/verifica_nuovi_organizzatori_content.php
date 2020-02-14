<div class="row pb-5 mb-5">
  <div class="col-0 col-md-1"></div>
  <div class="col-12 col-md-10">
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
            <tr class="d-flex">
              <th class="col-2" id="numeroInLista"></th>
              <th class="col-4" id="nome">Nome</th>
              <th class="col-4" id="cognome">Cognome</th>
              <th class="col-2" id="linkAdOrganizzatore"></th>
            </tr>
          </thead>
          <tbody>
            <?php $i = 1 ?>
            <?php foreach ($templateParams["organizzatoriDaAnalizzare"] as $organizzatore): ?>
              <tr class="d-flex">
                <th class="col-2" id="numero" headers="numeroInLista"><?php echo $i ?></th>
                <td class="col-4" headers="numero nome"><?php echo $organizzatore["Nome"] ?></td>
                <td class="col-4" headers="numero cognome"><?php echo $organizzatore["Cognome"] ?></td>
                <td class="col-2 text-right" headers="numero linkAdOrganizzatore"><a href="./verifica_singolo_organizzatore.php?id=<?php echo $organizzatore["IDOrganizzatore"] ?>">Apri</a></td>
              </tr>  
            <?php $i++ ?>
            <?php endforeach ?>
          </tbody>
        </table>
        </div>
    </div>
  <div class="col-0 col-md-1"></div>
</div>

