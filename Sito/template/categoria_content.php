<div class="row">
    <div class="col-0 col-md-1"></div>
        <div class="roundend-corners col-12 col-md-10 bg-white border mt-2 mb-4 px-4 py-3 mr-0 shadow-sm concert-tickets">

            <h3 class="text-center">Categoria <?php echo $templateParams["categoria"][0]["NomeCategoria"] ?></h3>
            
            <?php if (isset($templateParams["eventi"]) && $templateParams["eventi"] != NULL) : ?>
                <p class="text-black-50 text-center">(<?php echo count($templateParams["eventi"]) ?> eventi in questa Categoria)</p>
                <hr/>
                <div class="row my-3">

                    <?php foreach ($templateParams["eventi"] as $evento) :?>
                        <div class="col-12 col-md-6 col-lg-3 col-xl-3 shadow-sm pl-1 pr-1 ml-0 mr-0 pt-2 pb-2 mt-3 mb-4 bg-white rounded border-dark d-inline-block">
                            <div class="col-12 m-0 p-0 float-left shadow-sm  bg-white rounded border-dark">
                                <img class="img-fluid rounded" src="images/<?php echo ($evento["ImmagineEvento"] == NULL ? "image-not-found.png" : "eventi/".$evento["ImmagineEvento"]) ?>"></img>
                            </div>
                            <div class="col-12 m-0 p-0 d-inline-block text-left pl-3 pb-3 pt-3">
                                <h5 class="mb-0"><?php echo $evento["NomeEvento"];?></h5>
                                <p class="date font-italic m-0 p-0 mt-1"> <?php echo date("d/m/Y h:m", strtotime(substr($evento["DataEvento"], 0, -3)));?></p>
                                <p class="m-0 p-0 font-description"><?php echo $evento["Luogo"];?> </p>
                            </div> 
                            <div class="col-12 m-0 p-0">
                                <div data-IDEvento="<?php echo $evento["IDEvento"]?>"><span class="cuore-pieno text-dark pointer mx-3 fas fa-heart fa-2x"></span></div>
                                <a href="./evento.php?IDEvento=<?php echo $evento["IDEvento"]?>"><button class="scopri btn py-1 px-3 mx-3 shadow-sm purple-btn rounded-pill">Scopri</button></a>
                            </div>
                        </div>
                    <?php endforeach ?>

                </div>
            </div>
            <?php else :?>
                <p class="text-black-50 text-center">(0 eventi in questa Categoria)</p>
                <hr/>
                <p class="text-center my-5">Siamo spiacenti ma questa categoria non contiene alcun evento al momento!</p>

            <?php endif ?>
            

            
            
        </div>
    </div>
</div>