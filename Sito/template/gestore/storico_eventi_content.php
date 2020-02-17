<div class="row ml-3 mr-3">
  <div class="col-md-1"></div>
  <div class="col-12 col-md-10 p-0 m-0">
    <div class="row mb-md-3 mb-0 mt-5 align-items-end">
        <p class="titolo_sezioni col-9 col-md-7 mt-2 mb-0">Storico eventi</p>
        <a class="col-md-5 col-3 text-right pt-3 cursor-pointer purple-black-link font-weight-bold" href="area_gestore.php"> Indietro </a>
    </div>
    <hr class="mt-1 mx-2"/>
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
        <div class="event col-12 col-md-6 col-lg-4 col-xl-4 shadow-sm pl-1 pr-1 pt-2 pb-2 mt-1 mb-2 bg-white rounded border-dark d-inline-block">
            <div class="row m-0 p-0 float-left shadow-sm  bg-white rounded border-dark">
                <img alt="" class="img-fluid rounded" src="images/eventi/<?php echo $evento["ImmagineEvento"];?>"/>
            </div>
            <div class="row m-0 p-0 d-inline-block text-left pl-3 pb-2 pt-2">
                <h5 class="mb-0"><?php echo $evento["NomeEvento"];?></h5>
                <p class="date font-italic m-0 p-0 mt-1"> <?php echo date("d/m/Y H:m", strtotime(substr($evento["DataEvento"], 0, -3)));?></p>
                <p class="m-0 p-0 font-description"><?php echo $evento["Luogo"];?> </p>
            </div> 

            <div class="row text-center mb-1">
                <div class="col-6 mb-0 color-black mr-0 pr-3 font-storico text-left">
                    Bigl. venduti:
                </div>
                <div class="col-6 mb-0 mr-0 pr-3 sold-tickets font-storico mb-0 text-center">
                    <?php echo $evento["BigliettiVenduti"]?>
                </div>
            </div>
            <div class="row text-center mb-1">
                <div class="col-6 mb-0 color-black mr-0 pr-3 font-storico text-left">
                    Percentuale:
                </div>
                <div class="col-6 mb-0 mr-0 pr-3 font-storico mb-0 text-center">
                <span class="mb-0 color-purple font-weight-bold"><?php $percentuale=$evento["BigliettiVenduti"]*100/$evento["NumeroPosti"]; echo number_format($percentuale, 2)?></span>%
                </div>
            </div>
            <div class="row text-center mb-3">
                <div class="col-6 mb-0 color-black mr-0 pr-3 font-storico text-left">
                    Incasso:
                </div>
                <div class="col-6 mb-0 mr-0 pr-3 font-storico mb-0 text-center">
                    € <?php $totale = $evento["BigliettiVenduti"] * $evento["PrezzoBiglietto"]; echo $totale;?>
                </div>
            </div>

        </div>
    <?php endforeach ?>
    </div>
  </div>
  <div class="col-0 col-md-1"></div>
</div>
