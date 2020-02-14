<div class="container mt-3 mb-5">
    <div class="row">
        <div class="col-0 col-md-1"></div>
        <div class="col-12 col-md-10">
            <h3 class="text-black pt-2 mt-4 mb-4">Area Organizzatore</h3>
            <?php require_once __DIR__.'/../check_errori.php'; ?>
            <a href="./inserisci_evento.php?action=1" class="btn btn-gestore col-12 py-3 mt-4 mb-2 ml-0">
                <p class="col-10 float-left mb-0 mt-1 align-center"> Inserisci nuovo evento </p> 
                <span class="fa fa-angle-right fa-2x"></span> 
            </a>
            <a href="./prossimi_eventi_organizzatore.php" class="btn btn-gestore col-12 py-3 mb-2 ml-0">
                <p class="col-10 float-left mb-0 mt-1 align-center"> Visualizza prossimi eventi </p> 
                <span class="fa fa-angle-right fa-2x"></span> 
            </a>
            <a href="./storico_eventi.php" class="btn btn-gestore col-12 py-3 mb-10 ml-0">
                <p class="col-10 float-left mb-0 mt-1 align-center"> Storico eventi </p> 
                <span class="fa fa-angle-right fa-2x"></span> 
            </a>
        </div>
        <div class="col-0 col-md-1"></div>
    </div>
</div>