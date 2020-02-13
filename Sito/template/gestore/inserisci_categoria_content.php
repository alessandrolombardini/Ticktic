<div class="row">
    <div class="col-1"></div>
    <div class="col-10">
        <div class="row mb-3 mt-5">
            <h3 class="col-8 col-md-7">Richiedi inserimento categoria </h3>
            <a class="col-md-5 col-4 text-right pt-3 cursor-pointer purple-black-link font-weight-bold" href="inserisci_evento.php?action=1"> Annulla </a>
        </div>
        <hr/>
        <?php require_once __DIR__.'/../check_errori.php'; ?>
        <form action="processa_richiesta_categoria.php" method="POST">
            <div class="row">
                <div class="col-md-4 col-12 mb-3">
                    <label for="nome">Categoria*</label>
                    <input type="text" class="form-control" id="nome" name="nome" required/>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-md-4 col-1 p-0 m-0"> </div>
                <input type="submit" class="purple-btn col-md-4 col-10 p-3 m-0 mb-5 text-center rounded-pill" value="Richiedi"/>
                <div class="col-md-4 col-1 p-0 m-0"> </div>
            </div>
        </form>
        <div class="col-1"></div>
    </div>
</div>