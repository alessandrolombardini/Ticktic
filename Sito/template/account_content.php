<div class="container mt-3 mb-5">
    <div class="row">
        <div class="col-1"></div>
        <div class="col-10">
            <h3 class="text-black pt-2 mb-4 mt-4"> Area personale </h3>
            <?php if (isset($_SESSION["id"]) && $_SESSION["autorizzazione"] == "ORGANIZZATORE"):?>
            <a href="./area_gestore.php">
                <button type="submit" class="btn btn-gestore col-12 py-3 mt-5 mb-2 ml-0">
                    <p class="col-10 float-left mb-0 mt-1 align-center"> Area organizzatore </p> 
                    <i class="fa fa-angle-right fa-2x"></i> 
                </button>
            </a>
            <?php endif?>
            <?php if (isset($_SESSION["id"]) && $_SESSION["autorizzazione"] == "AMMINISTRATORE"):?>
            <a href="./area_amministratore.php">
                <button type="submit" class="btn btn-gestore col-12 py-3 mb-2">
                    <p class="col-10 float-left mb-0 mt-1 align-center"> Area amministratore </p> 
                    <i class="fa fa-angle-right fa-2x"></i> 
                </button>
            </a>
            <?php endif?>
            <a href="./nuove_notifiche.php">
                <button type="submit" class="btn btn-gestore col-12 py-3 mb-2">
                    <p class="col-10 float-left mb-0 mt-1 align-center"> Nuove notifiche </p> 
                    <i class="fa fa-angle-right fa-2x"></i> 
                </button>
            </a>
            <?php if (isset($_SESSION["id"]) && $_SESSION["autorizzazione"] == "UTENTE"):?>
            <a href="./ordini.php">
                <button type="submit" class="btn btn-gestore col-12 py-3 mb-2">
                    <p class="col-10 float-left mb-0 mt-1 align-center"> Ordini </p> 
                    <i class="fa fa-angle-right fa-2x"></i> 
                </button>
            </a>
            <?php endif?>
            <?php if (isset($_SESSION["id"]) && $_SESSION["autorizzazione"] == "UTENTE"):?>
            <a href="./lista_desideri.php">
                <button type="submit" class="btn btn-gestore col-12 py-3 mb-2">
                    <p class="col-10 float-left mb-0 mt-1 align-center"> Lista desideri </p> 
                    <i class="fa fa-angle-right fa-2x"></i> 
                </button>
            </a>
            <?php endif?>
            <a href="./informazioni_account.php">
                <button type="submit" class="btn btn-gestore col-12 py-3 mb-2">
                    <p class="col-10 float-left mb-0 mt-1 align-center"> Informazioni account </p> 
                    <i class="fa fa-angle-right fa-2x"></i> 
                </button>
            </a>
            <a href="./logout.php">
                <button type="submit" class="btn btn-gestore col-12 py-3 mb-2">
                    <p class="col-10 float-left mb-0 mt-1 align-center"> Logout </p> 
                    <i class="fa fa-angle-right fa-2x"></i> 
                </button>
            </a>
        </div>
        <div class="col-1"></div>
    </div>
</div>