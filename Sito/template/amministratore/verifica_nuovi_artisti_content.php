<div class="container">
  <div class="row col-12 col-md-12 justify-content-center">
    <h3 class="d-block">Artisti da valutare</h3>
  </div>
  <div class="row">
      <div class="col-1 col-md-2"></div>
      <div class="table col-10 col-md-8">
      <table class="table table-striped">
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
              <td headers="numero linkAdArtista"><a href="./verifica_singolo_artista.php?id=<?php echo $artista["IDArtista"] ?>">Apri</a></td>
            </tr>  
          <?php $i++ ?>
          <?php endforeach ?>
        </tbody>
      </table>
      </div>
      <div class="col-1 col-md-2"></div>
  </div>
</div>

