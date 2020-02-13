<div class="row my-3">
    <div class="col-0 col-md-1"></div>
        <div class="col-12 col-md-10 p-0 m-0">

        <div class="container-fluid text-center row"> <!-- Foto e descrizione del gruppo musicale -->
            <div class="col-12 col-lg-6 my-auto">
                <img class="img-fluid rounded" src="./images/artisti/<?php echo $templateParams["artista"]["ImmagineArtista"]?>" alt="<?php echo getAltFromImageName($templateParams["artista"]["ImmagineArtista"]) ?>"/>
            </div>
            <div class="col-12 col-lg-6 my-auto">
                <h3 class="mt-2"><?php echo $templateParams["artista"]["PseudonimoArtista"]?></h3>
                <p class="text-black-50 font-description  close-lines mb-3 px-5"><?php echo $templateParams["artista"]["Descrizione"]?></p>
            </div>
        </div>

            <div class="row mb-3 mt-5 ">
                <div class="col-8 col-md-7 row">
                    <h3 class="mx-3 d-inline">Eventi <?php echo $templateParams["artista"]["PseudonimoArtista"]?></h3>
                    <p class="text-black-50 mx-3 pt-2">(<?php echo count($templateParams["eventi"]) ?> risultati)</p>
                </div>
                <a class="col-md-5 col-4 text-right pt-2 cursor-pointer purple-black-link font-weight-bold " href="./artisti.php"> Vai a tutti gli artisti </a>
            </div>
                
            <hr/>

        <?php if (isset($templateParams["eventi"]) && $templateParams["eventi"] != NULL) : ?>
                
                
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
                
                <p class="text-center my-5">Siamo spiacenti ma non ci sono in programma eventi per questo artista!</p>

            <?php endif ?>

        </div>
    </div>
    <div class="col-0 col-md-2"></div>
</div>