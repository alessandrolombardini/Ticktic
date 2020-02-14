<div class="row p-0 m-0">
  <div class="col-0 col-md-1"></div>
  <div class="col-12 col-md-10 p-0 m-0">
    <div class="row mb-3 mt-5 ">
        <p class="titolo_sezioni col-8 col-md-7">Prossimi eventi</p>
        <a class="col-md-5 col-4 text-right pt-3 cursor-pointer purple-black-link font-weight-bold" href="account.php"> Indietro </a>
    </div>
    <hr/>
    <?php if (count($templateParams["prossimiEventi"]) == 0):?>
        <div class="row error-template">
            <div class="col-1 col-md-2"></div>
            <div class="roundend-corners col-10 col-md-8 bg-white border mt-2 mb-4 px-4 py-3 mr-0 ">
                <div class="error-template text-center">
                    <p class="h5 pt-4">Non ci sono eventi in programma</p>
                </div>
            </div>
            <div class="col-1 col-md-2"></div>
        </div>
    <?php endif ?>
    <div class="row mr-3 ml-3">
        <?php foreach ($templateParams["prossimiEventi"] as $evento) :?>
            <div class="col-12 col-md-6 col-lg-3 col-xl-3 p-2 ml-0 mt-3 mb-4">
                <div class="shadow-sm bg-white roundend-corners border-dark d-inline-block p-2">
                    <div class="col-12 m-0 p-0 float-left shadow-sm  bg-white roundend-corners border-dark">
                        <img class="img-fluid roundend-corners" alt="immagine evento" src="images/eventi/<?php echo $evento["ImmagineEvento"];?>"/>
                    </div>
                    <div class="col-12 d-inline-block text-left m-3">
                        <h5 class="mb-0"><?php echo $evento["NomeEvento"];?></h5>
                        <p class="date font-italic m-0 p-0 mt-1"> <?php echo date("d/m/Y h:m", strtotime(substr($evento["DataEvento"], 0, -3)));?></p>
                        <p class="m-0 p-0 font-description"><?php echo $evento["Luogo"];?> </p>
                    </div> 
                    <div class="col-12 m-0 mb-2">
                        <div data-IDEvento="<?php echo $evento["IDEvento"]?>"><span class="cuore-pieno text-dark pointer mx-3 fas fa-heart fa-2x"></span></div>
                        <a class="scopri btn py-1 px-3 mx-3 shadow-sm purple-btn rounded-pill" href="./evento.php?IDEvento=<?php echo $evento["IDEvento"]?>">Scopri</a>
                    </div>
                </div>
            </div>
        <?php endforeach ?>
    </div>
  </div>
  <div class="col-0 col-md-1"></div>
</div>
