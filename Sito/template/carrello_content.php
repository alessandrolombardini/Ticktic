<div id="chart">
    <div class="row mt-4 px-3">
        <div class="col-md-2"></div>
        <div class="col-3 col-md-2 text-center chart-progress" id="btn-chart-index" href="#"><i class="fas fa-dot-circle fa-2x chart-progress color-purple"></i></div>
        <div class="col-3 col-md-2 text-center chart-progress" id="btn-chart-delivery" href="#"><i class="fas fa-dot-circle fa-2x chart-progress"></i></div>
        <div class="col-3 col-md-2 text-center chart-progress" id="btn-chart-payment" href="#"><i class="fas fa-dot-circle fa-2x chart-progress"></i></div>
        <div class="col-3 col-md-2 text-center chart-progress" id="btn-chart-resume" href="#"><i class="fas fa-dot-circle fa-2x chart-progress"></i></div>
        <div class="col-md-2"></div>
    </div>

    <div class="row px-3 mb-0">
        <div class="col-md-2"></div>
        <div class="col-3 col-md-2 text-center chart-progress color-black"><p class="mb-0"> Carrello </p></div>
        <div class="col-3 col-md-2 text-center chart-progress"><p class="mb-0"> Spedizione </p></i></div>
        <div class="col-3 col-md-2 text-center chart-progress"><p class="mb-0"> Pagamento </p></i></div>
        <div class="col-3 col-md-2 text-center chart-progress"><p class="mb-0"> Ordine </p></i></div>
        <div class="col-md-2"></div>
    </div>

    <hr/>

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
</div>