<div class="row">
  <div class="col-0 col-md-1"></div>
  <div class="col-12 col-md-10">
    <div class="row mb-3 mt-5 ">
        <h3 class="col-8 col-md-7">Storico eventi</h3>
        <a class="col-md-5 col-4 text-right pt-3 cursor-pointer purple-black-link font-weight-bold" href="area_gestore.php"> Indietro </a>
    </div>
    <hr/>
    <?php if (count($templateParams["storicoEventi"]) == 0):?>
        <div class="row error-template">
            <div class="col-1 col-md-2"></div>
            <div class="roundend-corners col-10 col-md-8 bg-white border mt-2 mb-4 px-4 py-3 mr-0 ">
                <div class="error-template text-center">
                    <p class="h5 pt-4">Non ci sono eventi</p>
                </div>
            </div>
            <div class="col-1 col-md-2"></div>
        </div>
    <?php endif ?>
    
     <div class="row">
    <?php foreach ($templateParams["storicoEventi"] as $evento) :?>
        <div class="event col-12 col-md-6 col-lg-4 col-xl-4 shadow-sm pl-1 pr-1 pt-2 pb-2 mt-3 mb-4 bg-white rounded border-dark d-inline-block">
            <div class="row m-0 p-0 float-left shadow-sm  bg-white rounded border-dark">
                <img class="img-fluid rounded" src="images/eventi/<?php echo $evento["ImmagineEvento"];?>"></img>
            </div>
            <div class="row m-0 p-0 d-inline-block text-left pl-3 pb-3 pt-3">
                <h5 class="mb-0"><?php echo $evento["NomeEvento"];?></h5>
                <p class="date font-italic m-0 p-0 mt-1"> <?php echo date("d/m/Y h:m", strtotime(substr($evento["DataEvento"], 0, -3)));?></p>
                <p class="m-0 p-0 font-description"><?php echo $evento["Luogo"];?> </p>
            </div> 
            <div class="row text-center">
                <div class="col-12 col-md-4 mb-0 color-purple mr-0 pr-3">
                    <p class="sold-tickets mb-0 text-center"><?php echo $evento["BigliettiVenduti"]?></p>
                </div>
                <div class="col-12 col-md-8 text-md-left text-center mt-2 align-middle ml-md-0 pl-md-0">
                    <h6 class="font-mediumlittle"><?php if ($evento["BigliettiVenduti"] != 1) {
                        echo " biglietti venduti";
                    } else {
                        echo " biglietto venduto";
                    }?> (<span class="mb-0 color-purple font-weight-bold"><?php $percentuale=$evento["BigliettiVenduti"]*100/$evento["NumeroPosti"]; echo number_format($percentuale, 2)?></span>%)</h6>
                </div>
            </div>
            <div class="row align-text-bottom mb-1">
                <h5 class="col-12 mb-0 text-center font-mediumlittle">€ <?php $totale = $evento["BigliettiVenduti"] * $evento["PrezzoBiglietto"];
                echo $totale;?> </h5>
            </div>
        </div>
    <?php endforeach ?>
    </div>
  </div>
  <div class="col-0 col-md-1"></div>
</div>
