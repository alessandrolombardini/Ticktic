<div id="chart">
    <?php if (count($templateParams["eventi"]) == 0):?>
        <div class="row error-template">
            <div class="col-1 col-md-2"></div>
            <div class="roundend-corners col-10 col-md-8 bg-white border mt-2 mb-4 px-4 py-3 mr-0 ">
                <div class="error-template text-center">
                    <p class="h5 pt-4 pb-4">Il carrello è vuoto.</p>
                </div>
            </div>
            <div class="col-1 col-md-2"></div>
        </div>
    <?php endif ?>

    <?php if (count($templateParams["eventi"]) != 0):?>
    <div class="chart-progress">
        <div class="row mt-4 px-3">
            <div class="col-md-2"></div>
            <div class="col-3 col-md-2 text-center chart-index color-purple"><i class="fas fa-dot-circle fa-2x"></i></div>
            <div class="col-3 col-md-2 text-center chart-delivery"><i class="fas fa-dot-circle fa-2x"></i></div>
            <div class="col-3 col-md-2 text-center pl-4 chart-payment"><i class="fas fa-dot-circle fa-2x"></i></div>
            <div class="col-3 col-md-2 text-center chart-resume"><i class="fas fa-dot-circle fa-2x"></i></div>
            <div class="col-md-2"></div>
        </div>

        <div class="row px-3 mb-0">
            <div class="col-md-2"></div>
            <div class="col-3 col-md-2 text-center m-0 p-0 chart-index color-black"><p class="mb-0"> Carrello </p></div>
            <div class="col-3 col-md-2 text-center m-0 p-0 chart-delivery"><p class="mb-0"> Spedizione </p></i></div>
            <div class="col-3 col-md-2 text-center m-0 p-0 pl-2 chart-payment"><p class="mb-0"> Pagamento </p></i></div>
            <div class="col-3 col-md-2 text-center m-0 p-0 chart-resume"><p class="mb-0"> Ordine </p></i></div>
            <div class="col-md-2"></div>
        </div>
    </div>

    <hr/>

        <div class="chart-content mr-3 ml-3">
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
    <?php endif ?>
</div>
