<div class="container mt-3">
    <div class="row">
        <div class="col-1"></div>
        <div class="col-10">
            <h3 class="text-black pt-2 mb-4"> Area Utente</h3>
            <?php if (isset($templateParams["msg"]) && $templateParams["msg"]!= "0"):?>
            <div class="row">
                <p class="col-1"></p>
                <p class="col-8 text-center my-2 align-center msg <?php if($templateParams["error"] == 's') {echo "error-msg";}?>"><?php echo $templateParams["msg"]?></p>
                <p class="col-3"></p>
            </div>
            <?php endif?>
            <a href="./nuove_notifiche.php">
                <button type="submit" class="btn btn-gestore col-12 py-3 mt-5 mb-2 ml-0">
                    <?php if($templateParams["nuoveNotifiche"] == true):?>
                        <i class="fas fa-circle notify color-purple font-medium mt-1 float-left"></i>
                    <?php endif ?>
                    <p class="col-10 float-left mb-0 mt-1 align-center"> Notifiche ricevute </p> 
                    <i class="fa fa-angle-right fa-2x"></i> 
                </button>
            </a>
            <a href="./ordini.php">
                <button type="submit" class="btn btn-gestore col-12 py-3 mt-5 mb-2 ml-0">
                    <p class="col-10 float-left mb-0 mt-1 align-center"> Ordini </p> 
                    <i class="fa fa-angle-right fa-2x"></i> 
                </button>
            </a>
            <button type="button" class="btn btn-gestore col-12 py-3 mb-10 ml-0">
                <p class="col-10 float-left mb-0 mt-1 align-center"> Visualizza prossimi eventi </p> 
                <i class="fa fa-angle-right fa-2x"></i> 
            </button>
        </div>
        <div class="col-1"></div>
    </div>
</div>