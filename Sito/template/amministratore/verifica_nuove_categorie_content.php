<div class="row">
  <div class="col-0 col-md-1"></div>
  <div class="col-12 col-md-10">
    <div class="row mb-3 mt-5">
      <h3 class="col-8 col-md-7">Categorie da valutare</h3>
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
              <th id="nomecategoria">Nome categoria</th>
              <th id="consensodissenso"></th>
          </tr>
          </thead>
          <tbody>
          <?php $i = 1 ?>
          <?php foreach ($templateParams["categorieDaAnalizzare"] as $categoria): ?>
              <tr>
              <th id="numero" headers="numeroInLista"><?php echo $i ?></th>
              <td  headers="numero nomecategoria"><?php echo $categoria["NomeCategoria"] ?></td>
              <td class=" text-right" headers="numero consensodissenso">
                  <a class="text-white" href="./verifica_e_processa_singola_categoria.php?id=<?php echo($categoria["IDCategoria"]) ?>&valutazione=s"><button type="button" class="purple-btn mt-2 pl-3 pr-3 pt-2 pb-2 rounded-pill" id="declinaBtn">Accetta</button></a>
                  <a class="text-white" href="./verifica_e_processa_singola_categoria.php?id=<?php echo $categoria["IDCategoria"] ?>&valutazione=n">><button type="button" class="purple-btn mt-2 pl-3 pr-3 pt-2 pb-2 rounded-pill" id="declinaBtn">Declina</button></a>
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
