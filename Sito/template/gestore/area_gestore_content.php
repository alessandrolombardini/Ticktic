<div class="container mt-3">
    <div class="row">
        <div class="col-1"></div>
        <div class="col-10">
            <h3 class="text-black pt-2 mb-4 mt-4">Area Organizzatore</h3>
            <?php if (isset($templateParams["msg"]) && $templateParams["msg"]!= "0"):?>
            <div class="row">
                <p class="col-2"></p>
                <p class="col-7 text-center my-2 align-center msg <?php if($templateParams["error"] == 's') {echo "error-msg";} else {echo "good-msg";}?>"><?php echo $templateParams["msg"]?></p>
                <p class="col-3"></p>
            </div>
            <?php endif?>
            <a href="./inserisci_evento.php?action=1">
                <button type="submit" class="btn btn-gestore col-12 py-3 mt-5 mb-2 ml-0">
                    <p class="col-10 float-left mb-0 mt-1 align-center"> Inserisci nuovo evento </p> 
                    <i class="fa fa-angle-right fa-2x"></i> 
                </button>
            </a>
            <a href="./prossimi_eventi_organizzatore.php">
                <button type="button" class="btn btn-gestore col-12 py-3 mb-2 ml-0">
                    <p class="col-10 float-left mb-0 mt-1 align-center"> Visualizza prossimi eventi </p> 
                    <i class="fa fa-angle-right fa-2x"></i> 
                </button>
            </a>
            <a href="./storico_eventi.php">
                <button type="button" class="btn btn-gestore col-12 py-3 mb-10 ml-0">
                    <p class="col-10 float-left mb-0 mt-1 align-center"> Storico eventi </p> 
                    <i class="fa fa-angle-right fa-2x"></i> 
                </button>
            </a>
        </div>
        <div class="col-1"></div>
    </div>
</div>