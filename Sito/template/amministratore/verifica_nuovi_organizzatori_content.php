<div class="container">
  <div class="row col-12 col-md-12 row justify-content-center">
    <h3 class="d-block">Organizzatori da valutare</h3>
  </div>
  <div class="row">
      <div class="col-1 col-md-2"></div>
      <div class="table col-10 col-md-8">
      <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col"></th>
            <th scope="col">Nome</th>
            <th scope="col">Cognome</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($templateParams["organizzatoriDaAnalizzare"] as $organizzatore): ?>
            <tr>
              <th scope="row">1</th>
              <td><?php echo $organizzatore["Nome"] ?></td>
              <td><?php echo $organizzatore["Cognome"] ?></td>
              <td><a href="./verifica_singolo_organizzatore.php?id=<?php echo $organizzatore["IDOrganizzatore"] ?>">Apri</a></td>
            </tr>  
          <?php endforeach ?>
        </tbody>
      </table>
      </div>
      <div class="col-1 col-md-2"></div>
  </div>
</div>

