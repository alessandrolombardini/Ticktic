<div class="container">
  <div class="col-md-2"></div>
  <div class="col-md-8"></div>
        <h3 class="mb-3">Registrazione utente</h4>
        <form class="needs-validation" novalidate>
          <div class="row">
            <div class="col-md-6 mb-3">
              <label for="nome">Nome</label>
              <input type="text" class="form-control" id="nome" name="nome" required/>
              <div class="invalid-feedback">Inserire il nome.</div>
            </div>
            <div class="col-md-6 mb-3">
              <label for="cognome">Cognome</label>
              <input type="text" class="form-control" id="cognome" name="cognome" required/>
              <div class="invalid-feedback">Inserire il cognome.</div>
            </div>
          </div>
          <div class="mb-3"> 
            <label for="email">Email</label>
            <input type="email" class="form-control" name="email" required/>
            <div class="invalid-feedback">Inserire una email valida.</div>
          </div>
          <div class="mb-3">
            <label for="indirizzo">Indirizzo</label>
            <input type="text" class="form-control" id="indirizzo"  name="indirizzo" required/>
            <div class="invalid-feedback">Inserire indizzo.</div>
          </div>
          <div class="d-block my-3">
            <p>Sesso</p>
            <div class="custom-control custom-radio">
              <input id="sessoMaschio" name="sesso" type="radio" class="custom-control-input" checked required/>
              <label class="custom-control-label" for="sessoMaschio">Maschio</label>
            </div>
            <div class="custom-control custom-radio">
              <input id="sessoFemmina" name="sesso" type="radio" class="custom-control-input" required/>
              <label class="custom-control-label" for="sessoFemmina">Femmina</label>
            </div>
            <div class="custom-control custom-radio">
              <input id="sessoAltro" name="sesso" type="radio" class="custom-control-input" required/>
              <label class="custom-control-label" for="sessoAltro">Altro</label>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 mb-3">
              <label for="password">Password</label>
              <input type="password" maxlength="16" class="form-control" id="password" name="password" required/>
              <div class="invalid-feedback">Inserisci la password</div>
            </div>
            <div class="col-md-6 mb-3">
              <label for="ripetipassword">Ripeti password</label>
              <input type="password" maxlength="16" class="form-control" id="ripetipassword" name="ripetipassword" required/>
              <div class="invalid-feedback">Inserisci nuovamente la password</div>
            </div>
          </div>
          <div class="mb-3">
            <label for="data">Data di nascita</label>
            <input type="date" class="form-control" name="data" id="data" required/> 
            <div class="invalid-feedback">Inserire data di nascita.</div>
          </div>
          <div class="mb-3"> 
            <label for="gestore"><input type="checkbox" name="gestore"> Richiedi abilitazione come gestore</input></label>
          </div>
          <div class="areagestore mb-3">
            <label for="iban">IBAN</label>
            <input type="text" class="form-control" id="iban" name="iban" required/>
            <div class="invalid-feedback">Inserire indizzo.</div>
          </div>
          <div class="mb-3">
              <input class="purple-btn btn-primary btn-lg btn-block rounded-pill" value="Registrati" type="submit"/>
          </div>
        </form>
      </div>
    </div>
    <div class="col-md-2"></div>
</div>

