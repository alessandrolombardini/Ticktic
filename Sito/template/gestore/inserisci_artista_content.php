<div class="row">
    <div class="col-1"></div>
    <div class="col-10">
        <div class="row mb-3 mt-5">
            <h3 class="col-8 col-md-7">Richiedi inserimento Artista </h3>
            <a class="col-md-5 col-4 text-right pt-3 cursor-pointer purple-black-link font-weight-bold" href="area_gestore.php"> Annulla </a>
        </div>
        <hr/>
        <form action="processa_artista.php" method="POST" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-4 col-12 mb-3">
                    <label for="nome">Artista*</label>
                    <input type="text" class="form-control" id="nome" name="nome" required/>
                </div>
                <div class="col-md-4 col-12 mb-3">
                    <label for="artistimg">Immagine*</label> <input type="file" name="artistimg" id="artistimg"/>
                </div>
                <div class="col-md-4 col-12 mb-3">
                    <label for="descrizione">Descrizione*</label>
                    <textarea class="form-control" id="descrizione" name="descrizione"> </textarea>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-md-2 col-3 p-0 m-0"> </div>
                <a class="col-md-2 text-center col-6 p-3 m-0 mb-md-5 mb-0 cursor-pointer purple-black-link font-weight-bold" href="inserisci_evento?action=1.php"> Annulla </a>
                <div class="col-md-1 col-3 p-0 m-0"> </div>
                <div class="col-1 p-0 m-0"> </div>
                <input type="submit" class="purple-btn col-md-4 col-10 p-3 m-0 mb-5 rounded-pill" value="Inserisci"/>
                <div class="col-md-3 col-1 p-0 m-0"> </div>
            </div>
        </form>
        <div class="col-1"></div>
    </div>
</div>