<div class="row p-0 m-0">
    <div class="col-0 col-md-1"></div>
    <div class="col-12 col-md-10 p-0 m-0">
        <h3 class="mx-3 mb-3 mt-5">Categorie</h3>
        <hr/>

        <div class="row mb-2">
        <?php foreach($templateParams["categories"] as $categoria):?>
            <div class="col-6 col-md-4 col-xl-2">
            <div class="m-3">
                <a href="./categoria.php?IDCategoria=<?php echo $categoria["IDCategoria"]?>">
                    <img class="img-fluid roundend-corners" src="./images/categorie/<?php echo $categoria["ImmagineCategoria"] ?>" alt="<?php echo getAltFromImageName($categoria["ImmagineCategoria"]) ?>" />
                </a>
            </div>
            </div>
        <?php endforeach ?>
        </div>
    </div>
    <div class="col-0 col-md-1"></div>
</div>