<div id="chart">
    <div class="chart-progress">
        <div class="row mt-4 px-3">
            <div class="col-md-2"></div>
            <div class="col-3 col-md-2 text-center chart-index color-purple"><i class="fas fa-dot-circle fa-2x"></i></div>
            <div class="col-3 col-md-2 text-center chart-delivery"><i class="fas fa-dot-circle fa-2x"></i></div>
            <div class="col-3 col-md-2 text-center chart-payment"><i class="fas fa-dot-circle fa-2x"></i></div>
            <div class="col-3 col-md-2 text-center chart-resume"><i class="fas fa-dot-circle fa-2x"></i></div>
            <div class="col-md-2"></div>
        </div>

        <div class="row px-3 mb-0">
            <div class="col-md-2"></div>
            <div class="col-3 col-md-2 text-center chart-index color-black"><p class="mb-0"> Carrello </p></div>
            <div class="col-3 col-md-2 text-center chart-delivery"><p class="mb-0"> Spedizione </p></i></div>
            <div class="col-3 col-md-2 text-center chart-payment"><p class="mb-0"> Pagamento </p></i></div>
            <div class="col-3 col-md-2 text-center chart-resume"><p class="mb-0"> Ordine </p></i></div>
            <div class="col-md-2"></div>
        </div>
    </div>

    <hr/>

    <form method="post" action="processa_carrello.php">
        <div class="chart-content">
            <div id="chart-index" class="selected">
                <?php require("carrello/carrello_index_content.php");?>
            </div> 

            <div id="chart-delivery">
                <?php require("carrello/carrello_delivery_content.php");?>
            </div> 

            <div id="chart-payment">
                <?php require("carrello/carrello_payment_content.php");?>
            </div> 

            <div id="chart-resume">
                <?php require("carrello/carrello_resume_content.php");?>
            </div> 
        </div>
    </form>
</div>