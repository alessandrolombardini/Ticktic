<div class="row">
        <div class="col-md-4"></div>
        <div class="col-12 col-md-4">
                <form action="./processa_login.php" method="POST" class="bg-white border mt-4 mb-4 px-5 py-4">
                    <div class="form-group text-center">
                        <img class="img-fluid col-8 col-md-5" src="./images/pic_ominostilizzato.png" alt="Login"></img>
                    </div>
                    <div class="form-group text-center">
                        <input type="email" name="email" id="email" class="form-control shadow-sm p-4 mt-5 bg-white rounded" aria-describedby="emailHelp" placeholder="username" required autofocus>
                    </div>
                    <div class="form-group text-center">
                        <input type="password" name="password" id="password" class="form-control shadow-sm p-4 mt-4 bg-white rounded" placeholder="password" required>
                    </div>
                    <div class="form-group text-center">
                        <input type="submit" value="Accedi" class="purple-btn col-10 shadow-sm p-3 mt-4 rounded-pill"></input>
                    </div>
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
                </form>      
        </div>
        <div class="col-md-4"></div>
</div>