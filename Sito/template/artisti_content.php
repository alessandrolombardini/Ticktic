<div class="row p-0 my-5">
    <div class="col-0 col-md-1"></div>
    <div class="col-12 col-md-10 p-0 m-0">
        <h3 class="mx-3 mb-3">Artisti</h3>
        <hr class="mx-2"/>
        <?php foreach($templateParams["artist"] as $artista):?>
            <div class="align-middle row shadow-sm  bg-white rounded border-dark m-2 mh-50">
                <div class="col-12 col-sm-5 col-lg-4 d-inline-block my-auto p-2 ">
                    <img src="./images/artisti/<?php echo $artista["ImmagineArtista"] ?>" class="img-fluid rounded mh-100" alt="<?php echo strtolower($artista["PseudonimoArtista"]) ?>" />
                </div>

                <div class="align-middle col-12 col-sm-7 col-lg-8 d-inline-block container-fluid mt-2">
                    <p class="font-weight-bold"><?php echo $artista["PseudonimoArtista"] ?></p>
                    <p class="text-black-50 font-description close-lines"><?php echo $artista["Descrizione"] ?></p>
                    <div class=" text-right mb-2">
                        <a href="./artista.php?IDArtista=<?php echo $artista["IDArtista"] ?>" class="btn purple-btn text-light shadow-sm p-1 mt-1 pr-3 pl-3 rounded-pill description">Visualizza</a>
                    </div>
                </div>
            </div>
        <?php endforeach ?>

    </div>
    <div class="col-0 col-md-1"></div>
</div>

