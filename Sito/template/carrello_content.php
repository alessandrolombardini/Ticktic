<div id="chart">
    <div class="row mt-4 px-3">
        <a class="col-3 d-flex justify-content-center chart-progress" id="btn-chart-index" href="#"><i class="fas fa-dot-circle fa-2x chart-progress-selected"></i></a>
        <a class="col-3 d-flex justify-content-center chart-progress" id="btn-chart-delivery" href="#"><i class="fas fa-dot-circle fa-2x chart-progress"></i></a>
        <a class="col-3 d-flex justify-content-center chart-progress" id="btn-chart-payment" href="#"><i class="fas fa-dot-circle fa-2x chart-progress"></i></a>
        <a class="col-3 d-flex justify-content-center chart-progress" id="btn-chart-resume" href="#"><i class="fas fa-dot-circle fa-2x chart-progress"></i></a>
    </div>

    <div class="row px-3">
        <div class="col-3 d-flex justify-content-center chart-progress"><p class="selected"> Carrello </p></div>
        <div class="col-3 d-flex justify-content-center chart-progress"><p> Spedizione </p></i></div>
        <div class="col-3 d-flex justify-content-center chart-progress"><p> Pagamento </p></i></div>
        <div class="col-3 d-flex justify-content-center chart-progress"><p> Ordine </p></i></div>
    </div>

    <div id="chart-index" class="chart-content selected">
        <?php require("carrello/carrello_index_content.php");?>
    </div> 

    <div id="chart-delivery" class="chart-content">
        <?php require("carrello/carrello_delivery_content.php");?>
    </div> 

    <div id="chart-payment" class="chart-content">
        <?php require("carrello/carrello_payment_content.php");?>
    </div> 

    <div id="chart-resume" class="chart-content">
        <?php require("carrello/carrello_resume_content.php");?>
    </div> 
</div>