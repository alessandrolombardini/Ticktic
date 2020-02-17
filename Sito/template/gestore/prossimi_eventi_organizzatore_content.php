<div class="row">
  <div class="col-0 col-md-1"></div>
  <div class="col-12 col-md-10">
    <div class="row mb-md-3 mb-0 mt-5 align-items-end">
        <p class="titolo_sezioni col-9 col-md-7 mt-2 mb-0">Prossimi eventi</p>
        <a class="col-md-5 col-3 text-right pt-3 cursor-pointer purple-black-link font-weight-bold" href="area_gestore.php"> Indietro </a>
    </div>
    <hr class="mt-1 mx-2"/>
    <?php if (count($templateParams["prossimiEventi"]) == 0):?>
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
    
    <div class="row mr-3 ml-3">
        <?php foreach ($templateParams["prossimiEventi"] as $evento) :?>
            <div class="col-12 col-md-6 col-lg-4 col-xl-3 p-2 ml-0 mt-1 mb-2">
                <div class="shadow-sm bg-white roundend-corners border-dark d-inline-block p-2">
                    <div class="col-12 m-0 p-0 float-left shadow-sm  bg-white roundend-corners border-dark">
                        <img class="img-fluid roundend-corners" src="images/eventi/<?php echo $evento["ImmagineEvento"];?>" alt="immagine evento"/>
                    </div>
                    <div class="col-12 m-0 p-0 d-inline-block text-left ml-3 mt-2 mb-2">
                        <h5 class="mb-0"><?php echo $evento["NomeEvento"];?></h5>
                        <p class="date font-italic m-0 p-0 mt-1"> <?php echo date("d/m/Y H:m", strtotime(substr($evento["DataEvento"], 0, -3)));?></p>
                        <p class="m-0 p-0 font-description"><?php echo $evento["Luogo"];?> </p>
                    </div> 
                    <div class="col-12 m-0 p-0 text-center mb-2">
                        <a class="purple-btn p-1 mt-2 font-little shadow-sm rounded-pill col-12 m-0" href="./inserisci_evento.php?action=2&id=<?php echo $evento["IDEvento"]?>">Modifica Evento</a>
                        <a class="purple-btn p-1 mt-2 font-little shadow-sm rounded-pill col-12 m-0" href="?deleteID=<?php echo $evento["IDEvento"]?>">Elimina Evento</a>
                        <a class="purple-btn p-1 mt-2 font-little shadow-sm rounded-pill col-12 m-0" href="crea_notifica_organizzatore.php?IDEvento=<?php echo $evento["IDEvento"]?>">Emetti Notifica</a>
                    </div>
                </div>
            </div>
        <?php endforeach ?>
    </div>
  </div>
  <div class="col-0 col-md-1"></div>
</div>
