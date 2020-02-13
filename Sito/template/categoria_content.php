<div class="row my-5">
    <div class="col-0 col-md-1"></div>
        <div class="col-12 col-md-10 p-0 m-0">
 
            <div class="row">
                <div class="col-8 col-md-7 row">
                    <h3 class="d-inline">Categoria <?php echo $templateParams["categoria"]?></h3>
                    <p class="text-black-50 pt-2">(<?php echo count($templateParams["eventi"]) ?> risultati)</p>
                </div>
                <a class="col-md-5 col-4 text-right pt-2 cursor-pointer purple-black-link font-weight-bold " href="./categorie.php"> Vai a tutte le categorie </a>
            </div>
            <hr/>


            <div class="row">
        <?php foreach ($templateParams["eventi"] as $evento) :?>
            <div class="col-12 col-md-6 col-lg-3 col-xl-3 pt-2 pl-2 pr-2 ml-0 mt-3 mb-4">
                <div class="shadow-sm bg-white rounded border-dark d-inline-block">
                    <div class="col-12 m-0 p-0 float-left shadow-sm  bg-white rounded border-dark">
                        <img class="img-fluid rounded" src="images/eventi/<?php echo $evento["ImmagineEvento"];?>"></img>
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
            </div>
            <div class="col-12 col-md-6 col-lg-3 col-xl-3 p-2 ml-0 mt-3 mb-4">
                <div class="shadow-sm bg-white rounded border-dark d-inline-block">
                    <div class="col-12 m-0 p-0 float-left shadow-sm  bg-white rounded border-dark">
                        <img class="img-fluid rounded" src="images/eventi/<?php echo $evento["ImmagineEvento"];?>"></img>
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
            </div>
            
        <?php endforeach ?>
    </div>
            
        </div>
    <div class="col-0 col-md-1"></div>
</div>