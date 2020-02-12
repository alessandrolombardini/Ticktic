<div class="row">
  <div class="col-0  col-md-1"></div>
  <div class="col-12  col-md-10">
    <div class="row mb-3 mt-5">
      <h3 class="col-8 col-md-7">Modifica Password</h3>
      <a class="col-md-5 col-4 text-right pt-3 cursor-pointer purple-black-link font-weight-bold" href="informazioni_account.php"> Annulla </a>
    </div>
    <hr/>
    <?php if (isset($templateParams["msg"]) && $templateParams["msg"]!= "0"): ?>
      <div class="row">
          <p class="col-12 my-2
          <?php if($templateParams["error"] == 's'){echo "error-msg";} else {echo "good-msg";}?>"><?php echo $templateParams["msg"]?></p>
      </div>
    <?php endif?>
    <div class="container">
      <form action="./processa_modifica_password.php" method="POST">
        <div class="row">
        <div class="col-md-4 col-12 mb-3">
            <label for="oldpassword">Password</label>
            <input type="password" maxlength="16" class="form-control" id="oldpassword" name="oldpassword" required/>
          </div>
          <div class="col-md-4 col-12 mb-3">
            <label for="password">Nuova password</label>
            <input type="password" maxlength="16" class="form-control" id="password" name="password" required/>
          </div>
          <div class="col-md-4 col-12 mb-3">
            <label for="ripetipassword">Ripeti nuova password</label>
            <input type="password" maxlength="16" class="form-control" id="ripetipassword" name="ripetipassword" required/>
          </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-2 col-3 p-0 m-0"> </div>
            <a class="col-md-2 text-center col-6 p-3 m-0 mb-md-5 mb-0 cursor-pointer purple-black-link font-weight-bold" href="informazioni_account.php"> Annulla </a>
            <div class="col-md-1 col-3 p-0 m-0"> </div>
            <div class="col-1 p-0 m-0"> </div>
            <input type="submit" class="purple-btn col-md-4 col-10 p-3 m-0 mb-5 rounded-pill" value="Modifica"/>
            <div class="col-md-3 col-1 p-0 m-0"> </div>
        </div>
      </form>
    </div>
  </div>
  <div class="col-0 col-md-1"></div>
</div>