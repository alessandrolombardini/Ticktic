<div class="row">
    <div class="col-md-4"></div>
    <div class="col-12 col-md-4">
        <div class="row text-center">
        <?php if(isset($templateParams["congratulazioni"])): ?>
            <div class="col-md-1 col-1"></div>
            <div class="text-center bg-success roundend-corners col-md-10 col-10 border pt-2 mt-2">
                <p>Congratulazioni, fai ora parte della nostra comunity!</p>
            </div>
            <div class="col-md-1 col-1"></div>
        <?php endif ?>
        </div>
        <div class="bg-white border mt-4 mb-4 px-5 py-4">
            <div class="form-group text-center">
                <img class="img-fluid col-7 col-md-4" src="./images/pic_ominostilizzato.png" alt="Login"></img>
            </div>
            <form action="./processa_login.php" method="POST">
                <div class="form-group text-center">
                    <label class="invisible" for="email">Email</label>
                    <input type="email" name="email" id="email" class="form-control shadow-sm p-4 mt-3 bg-white rounded" placeholder="email" autofocus>
                </div>
                <div class="form-group text-center">
                    <label class="invisible" for="password">Password</label>
                    <input type="password" name="password" id="password" class="form-control shadow-sm p-4 bg-white rounded" placeholder="password" >
                </div>
                <div class="form-group text-center">
                    <input type="submit" value="Accedi" class="purple-btn col-10 shadow-sm p-3 mt-4 rounded-pill"></input>
                </div>
            </form>   
            <div class="form-group text-center">
                <label class="col-12 text-center">
                <?php 
                    if(isset($_SESSION["autorizzazione"]) && $_SESSION["autorizzazione"]=="NON LOGGATO"){    
                        echo $templateParams["loginErrorMessage"];
                    }
                ?>
                </label>
            </div>
            <div class="form-group text-center">
                <label class="col-4">o</label>
            </div>
            <div class="form-group text-center">
                <a href="./registrazione.php" class="col-4">Registrati</a>
            </div>   
        </div>
    </div>
    <div class="col-md-4"></div>
</div>
