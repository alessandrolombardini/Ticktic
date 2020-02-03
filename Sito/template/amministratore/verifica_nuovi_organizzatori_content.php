<div class="container">
  <div class="row col-12 col-md-12 justify-content-center">
    <h3 class="d-block">Organizzatori da valutare</h3>
  </div>
  <div class="row">
      <div class="col-1 col-md-2"></div>
      <div class="table col-10 col-md-8">
      <table class="table table-striped">
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
              <td headers="numero linkAdOrganizzatore"><a href="./verifica_singolo_organizzatore.php?id=<?php echo $organizzatore["IDOrganizzatore"] ?>">Apri</a></td>
            </tr>  
          <?php $i++ ?>
          <?php endforeach ?>
        </tbody>
      </table>
      </div>
      <div class="col-1 col-md-2"></div>
  </div>
</div>

