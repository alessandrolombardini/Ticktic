<div class="row">
    <div class="col-0 col-md-1"></div>
    <div class="col-12 col-md-10">
        <div class="row mb-3 mt-5">
            <h3 class="col-8 col-md-7">Inserimento categoria </h3>
            <a class="col-md-5 col-4 text-right pt-3 cursor-pointer purple-black-link font-weight-bold" href="./area_amministratore.php"> Annulla </a>
        </div>
        <hr/>
        <?php if(isset($templateParams["msg"])): ?>
        <div class="row">
            <p class="col-12 my-2
            <?php if($templateParams["error"] == 's'){echo "error-msg";} else {echo "good-msg";}?>"><?php echo $templateParams["msg"]?></p>
        </div>
        <?php endif ?>
        <form class="pt-3" action="processa_inserimento_nuova_categoria.php" method="POST">
            <div class="row">
                <div class="col-12 col-md-4 mb-3">
                    <label for="nome">Nome</label>
                    <input type="text" class="form-control" id="nome" name="nome" required/>
                </div>
                <div class="col-0 col-md-2 mb-3"></div>

                <div class="col-12 col-md-4 mb-3">
                    <label for="categimg">Immagine</label><br/>
                    <input type="file" name="categimg" id="categimg"/>
                </div>
                <div class="col-0 col-md-2 mb-3"></div>
            </div>
            <div class="row text-center mt-3 pt-5 pb-3">
                <div class="col-1 col-md-4"></div>
                <input type="submit" class="d-inline-block purple-btn col-md-4 col-10 p-3 m-0 mb-5 rounded-pill" value="Inserisci"/>
                <div class="col-1 col-md-4"></div>
            </div>
        </form>
        <div class="col-0 col-md-1"></div>
    </div>
</div>