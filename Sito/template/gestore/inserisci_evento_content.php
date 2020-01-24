<div class="row">
    <div class="col-1"></div>
    <div class=" col-10">
        <h3 class="mb-3 mt-5">Inserisci Evento</h3>
        <hr/>
        <form action="processa_evento.php" method="POST" enctype="multipart/form-data">
            <label for="artisti"><h4> Artisti </h4></label>
            <?php if ($templateParams["azione"] == 1):?>
            <div class=" row">
                <div class="col-md-0 mb-3">
                </div>
                <div class="col-md-4 mb-3">
                    <select name="artisti_1" class="form-control select_artisti" required>
                        <option value="none">...</option>
                        <?php foreach ($templateParams["artisti"] as $artista): ?>
                        <option value="<?php echo $artista["IDArtista"]?>"><?php echo $artista["PseudonimoArtista"]?></option>
                        <?php endforeach ?>
                    </select>
                </div>
                <div class="col-md-4 mb-3 pr-md-0 pl-md-3">
                    <div class="col-md-1"></div>
                    <button class="little-btn col-md-11 m-0 py-2 more-artists"><p class="mb-0">Inserisci un altro artista</p></button>
                </div>
                <div class="col-md-4 mb-3 px-md-0">
                    <div class="col-md-1"></div>
                    <button class="little-btn col-md-10 m-0 py-2"><p class="mb-0">L'artista non è presente?</p></button>
                    <div class="col-md-1"></div>
                </div>
            </div>  
            <?php endif ?>
            <div class="artista_presente mt-5">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="nome">Nome Evento *</label>
                        <input type="text" class="form-control" id="nome" name="nome" required/>
                    </div>
                    <div class="col-md-3 col-6 mb-3">
                        <label for="data">Data *</label>
                        <input type="day" id="data" name="data" class="form-control" min="<?php echo date("d-m-Y"); ?>" value="<?php $d=strtotime("+ 1 Month"); echo date("d-m-Y", $d) ?>"/>
                    </div>
                    <div class="col-md-3 col-6 mb-3">
                        <label for="orario">Orario *</label>
                        <input type="time" class="form-control" id="orario" name="orario" required/>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="luogo">Luogo *</label>
                        <input type="text" class="form-control" id="luogo" name="luogo" required/>
                    </div>
                    <div class="col-md-3 col-6 mb-3">
                        <label for="biglietti">Totale Biglietti *</label>
                        <input type="text" class="form-control" id="biglietti" name="biglietti" required/>
                    </div>
                    <div class="col-md-3 col-6 mb-3">
                        <label for="prezzo">Prezzo *</label>
                        <input type="text" class="form-control" id="prezzo" name="prezzo" required/>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label for="categoria">Categoria *</label>
                        <select name="categoria" class="form-control" required>
                            <?php foreach ($templateParams["categorie"] as $categoria): ?>
                                <option value="<?php echo $categoria["IDCategoria"]?>"><?php echo $categoria["NomeCategoria"]?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="imga">Immagine *</label><input type="file" name="imga" id="imga"/>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="anteprima">Anteprima</label>
                        <input type="text" class="form-control" id="anteprima" name="anteprima" required/>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="descrizione">Descrizione*</label>
                        <textarea class="form-control" id="descrizione" name="descrizione"> </textarea>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="note">Note</label>
                        <textarea class="form-control" id="note" name="note"> </textarea>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-2 col-3 p-0 m-0"> </div>
                    <a class="col-md-2 text-center col-6 p-3 m-0 mb-md-5 mb-0 cursor-pointer purple-black-link font-weight-bold"> Annulla </a>
                    <div class="col-md-1 col-3 p-0 m-0"> </div>
                    <div class="col-1 p-0 m-0"> </div>
                    <input type="submit" class="purple-btn col-md-4 col-10 p-3 m-0 mb-5 rounded-pill" value="Inserisci"/>
                    <div class="col-md-3 col-1 p-0 m-0"> </div>
                </div>
                <input type="hidden" name="action" value="<?php echo $templateParams["azione"]; ?>"/>
                <input type="hidden" name="tempid" value="0"/>
            </div>
        </form>
        <div class="col-1"></div>
    </div>
</div>