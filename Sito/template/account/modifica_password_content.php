<div class="row">
  <div class="col-0  col-md-1"></div>
  <div class="col-12  col-md-10">
    <div class="row mb-md-3 mb-0 mt-5 align-items-end">
        <p class="titolo_sezioni col-8 col-md-7 mt-2 mb-0">Modifica Password</p>
        <a class="col-md-5 col-4 text-right pt-3 cursor-pointer purple-black-link font-weight-bold" href="informazioni_account.php"> Annulla </a>
    </div>
    <hr class="mt-1 mx-2"/>
    <?php require_once __DIR__.'/../check_errori.php'; ?>
    <div class="p-0 m-0">
      <form class="p-0 m-0" action="./processa_modifica_password.php" method="POST">
        <div class="row">
        <div class="col-md-4 col-12 p-md-4 m-0 mb-3">
            <label for="oldpassword">Password*</label>
            <input type="password" maxlength="16" class="form-control" id="oldpassword" name="oldpassword" required/>
          </div>
          <div class="col-md-4 col-12 p-md-4 m-0 mb-3">
            <label for="password">Nuova password*</label>
            <input type="password" maxlength="16" class="form-control" id="password" name="password" required/>
          </div>
          <div class="col-md-4 col-12 p-md-4 m-0 mb-3">
            <label for="ripetipassword">Ripeti nuova password*</label>
            <input type="password" maxlength="16" class="form-control" id="ripetipassword" name="ripetipassword" required/>
          </div>
        </div>
        <div class="row mt-3">
          <div class="col-md-4 col-1 p-0 m-0"> </div>
            <input type="submit" class="purple-btn col-md-4 col-10 p-3 m-0 mb-5 text-center rounded-pill" value="Modifica"/>
            <div class="col-md-4 col-1 p-0 m-0"> </div>
        </div>
      </form>
    </div>
  </div>
  <div class="col-0 col-md-1"></div>
</div>