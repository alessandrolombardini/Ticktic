<div class="container mt-3 mb-5">
    <div class="row">
        <div class="col-0 col-md-1"></div>
        <div class="col-12 col-md-10">
            <h3 class="text-black pt-2 mb-4 mt-4"> Area personale </h3>
            <?php require("check_errori.php") ?>
            <?php if (isset($_SESSION["id"]) && $_SESSION["autorizzazione"] == "ORGANIZZATORE"):?>
            <a href="./area_gestore.php" class="btn btn-gestore col-12 py-3 mt-5 mb-2 ml-0">
                <p class="col-10 float-left mb-0 mt-1 align-center"> Area organizzatore </p> 
                <span class="fa fa-angle-right fa-2x"></span> 
            </a>
            <?php endif?>
            <?php if (isset($_SESSION["id"]) && $_SESSION["autorizzazione"] == "AMMINISTRATORE"):?>
            <a href="./area_amministratore.php" class="btn btn-gestore col-12 py-3 mb-2">
                <p class="col-10 float-left mb-0 mt-1 align-center"> Area amministratore </p> 
                <span class="fa fa-angle-right fa-2x"></span> 
            </a>
            <?php endif?>
            <a href="./nuove_notifiche.php" class="btn btn-gestore col-12 py-3 mb-2">
                <p class="col-10 float-left mb-0 mt-1 align-center"> Nuove notifiche </p> 
                <span class="fa fa-angle-right fa-2x"></span> 
            </a>
            <?php if (isset($_SESSION["id"]) && $_SESSION["autorizzazione"] == "UTENTE"):?>
            <a href="./prossimi_eventi_utente.php" class="btn btn-gestore col-12 py-3 mb-2">
                <p class="col-10 float-left mb-0 mt-1 align-center"> Prossimi eventi </p> 
                <span class="fa fa-angle-right fa-2x"></span> 
            </a>
            <?php endif?>
            <?php if (isset($_SESSION["id"]) && $_SESSION["autorizzazione"] == "UTENTE"):?>
            <a href="./ordini.php" class="btn btn-gestore col-12 py-3 mb-2">
                <p class="col-10 float-left mb-0 mt-1 align-center"> Ordini </p> 
                <span class="fa fa-angle-right fa-2x"></span> 
            </a>
            <?php endif?>
            <?php if (isset($_SESSION["id"]) && $_SESSION["autorizzazione"] == "UTENTE"):?>
            <a href="./lista_desideri.php" class="btn btn-gestore col-12 py-3 mb-2">
                <p class="col-10 float-left mb-0 mt-1 align-center"> Lista desideri </p> 
                <span class="fa fa-angle-right fa-2x"></span> 
            </a>
            <?php endif?>
            <a href="./informazioni_account.php" class="btn btn-gestore col-12 py-3 mb-2">
                <p class="col-10 float-left mb-0 mt-1 align-center"> Informazioni account </p> 
                <span class="fa fa-angle-right fa-2x"></span> 
            </a>
            <a href="./logout.php" class="btn btn-gestore col-12 py-3 mb-2">
                <p class="col-10 float-left mb-0 mt-1 align-center"> Logout </p> 
                <span class="fa fa-angle-right fa-2x"></span> 
            </a>
        </div>
        <div class="col-0 col-md-1"></div>
    </div>
</div>