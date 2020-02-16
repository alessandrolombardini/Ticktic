<div class="row my-5">
    <div class="col-0 col-md-1"></div>
        <div class="col-12 col-md-10 p-0 m-0">

            <div class="row">
                <div class="col-8 col-md-7 row">
                    <p class="titolo_sezioni d-inline mr-3">Eventi</p>
                    <p class="text-black-50 pt-2 mb-0">(<?php echo count($templateParams["eventi"]) ?> risultati)</p>
                </div>
            </div>
            <hr/>

            <div class="row">
                <?php foreach ($templateParams["eventi"] as $evento) :?>
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
                                <a href="./evento.php?IDEvento=<?php echo $evento["IDEvento"]?>" class="scopri py-1 px-3 mx-3 purple-btn rounded-pill">Scopri</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>
            
        </div>
    <div class="col-0 col-md-1"></div>
</div>