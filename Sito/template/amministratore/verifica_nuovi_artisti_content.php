<div class="row">
  <div class="col-0 col-md-1"></div>
  <div class="col-12 col-md-10">
    <div class="row mb-3 mt-5">
      <h3 class="col-8 col-md-7">Artisti da valutare</h3>
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
              <th id="pseudonimo">Pseudonimo</th>
              <th id="linkAdArtista"></th>
            </tr>
          </thead>
          <tbody>
            <?php $i = 1 ?>
            <?php foreach ($templateParams["artistiDaAnalizzare"] as $artista): ?>
              <tr>
                <th id="numero" headers="numeroInLista"><?php echo $i ?></th>
                <td headers="numero pseudonimo"><?php echo $artista["PseudonimoArtista"] ?></td>
                <td headers="numero linkAdArtista" class="text-right"><a href="./verifica_singolo_artista.php?id=<?php echo $artista["IDArtista"] ?>">Apri</a></td>
              </tr>  
            <?php $i++ ?>
            <?php endforeach ?>
          </tbody>
        </table>
    </div>
  </div>
  <div class="col-0 col-md-1"></div>
</div>

