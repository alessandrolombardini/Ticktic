<div class="row">
  <div class="col-0 col-md-1"></div>
  <div class="col-12 col-md-10 pb-5 mb-5">
    <div class="row mb-md-3 mb-0 mt-5 align-items-end">
          <p class="titolo_sezioni col-8 col-md-7 mt-2 mb-0">Categorie da valutare</p>
          <a class="col-md-5 col-4 text-right pt-3 cursor-pointer purple-black-link font-weight-bold" href="area_amministratore.php"> Annulla </a>
      </div>
      <hr class="mt-1 mx-2"/>
    <?php if (isset($templateParams["msg"]) && $templateParams["msg"]!= "0"):?>
        <p class="col-8 mb-3"> <?php echo $templateParams["msg"] ?> </p> 
    <?php endif?>
    <div class="row">
      <table class="table table-striped table-bordered">
          <thead>
          <tr class="d-flex">
              <th class="col-1" id="numeroInLista"></th>
              <th class="col-6" id="nomecategoria">Nome categoria</th>
              <th class="col-5" id="consensodissenso"></th>
          </tr>
          </thead>
          <tbody>
          <?php $i = 1 ?>
          <?php foreach ($templateParams["categorieDaAnalizzare"] as $categoria): ?>
              <tr class="d-flex">
                <th class="col-1" id="numero" headers="numeroInLista"><?php echo $i ?></th>
                <td class="col-6" headers="numero nomecategoria"><?php echo $categoria["NomeCategoria"] ?></td>
                <td class="col-5 text-right" headers="numero consensodissenso">
                    <a class="text-white purple-btn mt-2 pl-3 pr-3 pt-2 pb-2 rounded-pill" id="accettaBtn" href="./inserisci_nuova_categoria.php?id=<?php echo($categoria["IDCategoria"]) ?>">Accetta</a>
                    <a class="text-white purple-btn mt-2 pl-3 pr-3 pt-2 pb-2 rounded-pill" id="declinaBtn" href="./verifica_e_processa_singola_categoria.php?id=<?php echo $categoria["IDCategoria"] ?>&valutazione=n">Declina</a>
                </td>
              </tr>  
          <?php $i++ ?>
          <?php endforeach ?>
          </tbody>
      </table>
    </div>
  </div>
  <div class="col-0 col-md-1"></div>
</div>
