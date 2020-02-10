<div class="row mt-5">
    <div class="col-1 col-md-2"></div>
    <div class="col-10 col-md-8">
        <div class="row">
            <h3 class="col-8 col-md-7 text-black pt-2"> Prossimi Eventi </h3>
            <a class="col-md-5 col-4 text-right pt-3 cursor-pointer purple-black-link font-weight-bold" href="area_gestore.php"> Indietro </a>
        </div>
    </div>
    <div class="col-1 col-md-2"></div>
</div>
<hr/>

<?php foreach ($templateParams["prossimiEventi"] as $evento) :?>
<div class="row">
    <div class="col-1 col-md-2 mt-3 mb-4"></div>
    <div class="event col-10 col-md-4 shadow-sm p-2 mt-3 mb-4 bg-white rounded border-dark">
        <div class="row">
            <div class="col-4 p-0 m-0 p-0 float-left shadow-sm  bg-white rounded border-dark">
                <img class="img-fluid rounded" src="images/eventi/<?php echo $evento["ImmagineEvento"];?>"></img>
            </div>
            <div class="d-inline-block col-4 m-0 p-2 text-left pl-3">
                <h5 class="mb-0"><?php echo $evento["NomeEvento"];?></h5>
                <p class="date font-italic m-0 p-0 mt-1"> <?php echo date("d/m/Y h:m", strtotime(substr($evento["DataEvento"], 0, -3)));?></p>
                <p class="m-0 p-0 font-description"><?php echo $evento["Luogo"];?> </p>
            </div> 
            <div class="col-4 m-0 p-2 text-right pr-3">
                <a class="col-12 p-0 m-0" href="./inserisci_evento.php?action=2&id=<?php echo $evento["IDEvento"]?>">
                    <button class="purple-btn p-1 mt-2 pr-3 pl-3 d-inline-block font-little shadow-sm rounded-pill">Modifica Evento</button>
                </a>
                <a class="col-12 p-0 m-0" href="?deleteID=<?php echo $evento["IDEvento"]?>">
                    <button class="purple-btn p-1 mt-2 pr-3 pl-3 d-inline-block font-little shadow-sm rounded-pill">Elimina Evento</button>
                </a>
                <a class="col-12 p-0 m-0" href="crea_notifica_organizzatore.php?id=<?php echo $_SESSION["id"]?>&IDEvento=<?php echo $evento["IDEvento"]?>">
                    <button class="purple-btn p-1 mt-2 pr-3 pl-3 d-inline-block font-little shadow-sm rounded-pill">Emetti Notifica</button>
                </a>
            </div>
        </div>  
    </div>
    <div class="col-1 col-md-2"></div>
</div>
<?php endforeach?>
