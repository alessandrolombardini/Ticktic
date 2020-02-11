<div class="row p-0 m-0">
  <div class="col-1 col-md-1"></div>
  <div class="col-10 col-md-10 p-0 m-0">
    <div class="row mb-3 mt-5 ">
        <h3 class="col-8 col-md-7">Lista desideri</h3>
        <a class="col-md-5 col-4 text-right pt-3 cursor-pointer purple-black-link font-weight-bold" href="account.php"> Indietro </a>
    </div>
    <hr/>
    <?php if (count($templateParams["eventiListaDesideri"]) == 0):?>
        <div class="row error-template">
            <div class="col-1 col-md-2"></div>
            <div class="roundend-corners col-10 col-md-8 bg-white border mt-2 mb-4 px-4 py-3 mr-0 ">
                <div class="error-template text-center">
                    <p class="h5 pt-4">Non ci sono eventi nella tua lista dei desideri</p>
                </div>
            </div>
            <div class="col-1 col-md-2"></div>
        </div>
    <?php endif ?>
    <div class="row">
        <?php foreach ($templateParams["eventiListaDesideri"] as $evento) :?>
            <div class="col-12 col-md-6 col-lg-3 col-xl-3 shadow-sm pl-1 pr-1 ml-0 mr-0 pt-2 pb-2 mt-3 mb-4 bg-white rounded border-dark d-inline-block">
                <div class="col-12 m-0 p-0 float-left shadow-sm  bg-white rounded border-dark">
                    <img class="img-fluid rounded" src="images/eventi/<?php echo $evento["ImmagineEvento"];?>"></img>
                </div>
                <div class="col-12 m-0 p-0 d-inline-block text-left pl-3 pb-3 pt-3">
                    <h5 class="mb-0"><?php echo $evento["NomeEvento"];?></h5>
                    <p class="date font-italic m-0 p-0 mt-1"> <?php echo date("d/m/Y h:m", strtotime(substr($evento["DataEvento"], 0, -3)));?></p>
                    <p class="m-0 p-0 font-description"><?php echo $evento["Luogo"];?> </p>
                </div> 
                <div class="col-12 m-0 p-0">
                    <div data-IDEvento="4"><span class="cuore-pieno text-dark pointer mx-3 fas fa-heart fa-2x"></span></div>
                    <button class="scopri btn py-1 px-3 mx-3 shadow-sm purple-btn rounded-pill">Scopri</button>
                </div>
            </div>
        <?php endforeach ?>
    </div>
  </div>
  <div class="col-1 col-md-1"></div>
</div>
