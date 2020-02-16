<div class="row newevent">
    <div class="col-0 col-md-1"></div>
    <div class="col-12 col-md-10">
        <div class="row mb-3 mt-5">
            <h3 class="col-8 col-md-7"><?php if ($templateParams["azione"] == 1){echo "Inserisci Evento";}?>
            <?php if ($templateParams["azione"] == 2){ echo "Modifica Evento";}?></h3>
            <a class="col-md-5 col-4 text-right pt-3 cursor-pointer purple-black-link font-weight-bold" href="area_gestore.php"> Annulla </a>
        </div>
        <hr/>
        <?php require_once __DIR__.'/../check_errori.php'; ?>
        <?php if ($templateParams["azione"] == 2){
            echo "<img src='". UPLOAD_DIR . "eventi/". $templateParams["evento"]["ImmagineEvento"] ."' class='mb-5 updateeventimg' alt='Immagine evento da modificare.'>";
        }?>
        <form action="processa_evento.php" method="POST" enctype="multipart/form-data" id="newevent">
            <div class="row mb-2">
                <h4 class="col-md-4 col-3"> Artisti </h4>
                <div class="col-4 col-md-7"> </div>
                <button type="button" class="reset little-btn col-md-1 col-4 m-0 p-2 <?php if ($templateParams["azione"] == 1) {echo "resethide";}?>">Reset</button>
            </div>
            <div class="row mb-3" id="inserimento_artisti">
                <div class="col-md-0 mb-3">
                </div>
                <?php if ($templateParams["azione"] == 1):?>
                    <div class="col-md-4 mb-3">
                        <label for="artisti_1" hidden>Artista</label>
                        <select name="artisti_1" id="artisti_1" class="form-control select_artisti">
                            <option value="none">...</option>
                            <?php foreach ($templateParams["artisti"] as $artista): ?>
                            <option value="<?php echo $artista["IDArtista"]?>"><?php echo $artista["PseudonimoArtista"]?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                <?php endif?>
                <?php if ($templateParams["azione"] == 2):
                    $i = 1; foreach($templateParams["artistiEvento"] as $artistaselezionato):?>
                    <div class="col-md-4 mb-3">
                        <label for="artisti_<?php echo $i;?>" hidden>Artista</label>
                        <select name="artisti_<?php echo $i;?>" id="artisti_<?php echo $i; $i++;?>" class="form-control select_artisti">
                        <option value="none">...</option>
                            <?php foreach ($templateParams["artisti"] as $artista): ?>
                            <option value="<?php echo $artista["IDArtista"]?>" <?php 
                                    if ($artista["IDArtista"] == $artistaselezionato["IDArtista"]){
                                        echo "selected";
                                    }
                                ?>><?php echo $artista["PseudonimoArtista"]?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <?php endforeach ?>
                <?php endif?>
                <div class="col-md-4 mb-3 pr-md-0 pl-md-3">
                    <div class="col-md-1"></div>
                    <button type="button" class="little-btn col-md-11 m-0 py-2 more-artists">Inserisci un altro artista</button>
                </div>
                <div class="col-md-4 mb-3 px-md-0">
                    <div class="col-md-1"></div>
                    <a href="./inserisci_artista.php" class="little-btn col-md-10 m-0 py-2 ml-md-3">
                        L'artista non è presente?
                    </a>
                    <div class="col-md-1"></div>
                </div>
                <div class="col-12 artist_not_selected col-md-4 text-center font-weight-bold"> <p class="mb-0"> Utilizza i menù a tua disposizione! </p></div>
                <div class="col-12 artist_already_selected col-md-4 text-center font-weight-bold"> <p class="mb-0"> Hai già selezionato questo artista! </p></div>
            </div>  
            <div class="artista_presente mt-5">
                <div class="row">
                    <div class="col-md-5 mb-3">
                        <label for="nome">Nome Evento*</label>
                        <input type="text" class="form-control" id="nome" name="nome" 
                        value="<?php if ($templateParams["azione"] == 2) {echo $templateParams["evento"]["NomeEvento"];} else {echo "";}?>" required/>
                    </div>
                    <div class="col-md-1 col-4 mb-3">
                        <label for="day">Giorno*</label>
                        <?php if ($templateParams["azione"] == 2) {echo '<p hidden>'.$templateParams["giornoEvento"].'</p>';}?>
                        <select class="form-control eventdate <?php if ($templateParams["azione"] == 2) {echo "updateevent ";}?>" id="day" name="day"></select>
                    </div>
                    <div class="col-md-2 col-8 mb-3">
                        <label for="month">Mese*</label>
                        <select id="month" class="form-control eventdate" name="month">
                        <option value="01" <?php if ((($templateParams["azione"] == 2) && ($templateParams["meseEvento"] == "01")) || $templateParams["azione"]==1) {echo "selected";}?>>Gennaio</option>
                        <option value="02" <?php if (($templateParams["azione"] == 2) && ($templateParams["meseEvento"] == "02")) {echo "selected";}?>>Febbraio</option>
                        <option value="03" <?php if (($templateParams["azione"] == 2) && ($templateParams["meseEvento"] == "03")) {echo "selected";}?>>Marzo</option>
                        <option value="04" <?php if (($templateParams["azione"] == 2) && ($templateParams["meseEvento"] == "04")) {echo "selected";}?>>Aprile</option>
                        <option value="05" <?php if (($templateParams["azione"] == 2) && ($templateParams["meseEvento"] == "05")) {echo "selected";}?>>Maggio</option>
                        <option value="06" <?php if (($templateParams["azione"] == 2) && ($templateParams["meseEvento"] == "06")) {echo "selected";}?>>Giugno</option>
                        <option value="07" <?php if (($templateParams["azione"] == 2) && ($templateParams["meseEvento"] == "07")) {echo "selected";}?>>Luglio</option>
                        <option value="08" <?php if (($templateParams["azione"] == 2) && ($templateParams["meseEvento"] == "08")) {echo "selected";}?>>Agosto</option>
                        <option value="09" <?php if (($templateParams["azione"] == 2) && ($templateParams["meseEvento"] == "09")) {echo "selected";}?>>Settembre</option>
                        <option value="10" <?php if (($templateParams["azione"] == 2) && ($templateParams["meseEvento"] == "10")) {echo "selected";}?>>Ottobre</option>
                        <option value="11" <?php if (($templateParams["azione"] == 2) && ($templateParams["meseEvento"] == "11")) {echo "selected";}?>>Novembre</option>
                        <option value="12" <?php if (($templateParams["azione"] == 2) && ($templateParams["meseEvento"] == "12")) {echo "selected";}?>>Dicembre</option>
                        </select>
                    </div>
                    <div class="col-md-2 col-6 mb-3">
                        <label for="year">Anno*</label>
                        <?php if ($templateParams["azione"] == 2) {echo '<p hidden>'.$templateParams["annoEvento"].'</p>';}?>
                        <select id="year" class="form-control eventdate <?php if ($templateParams["azione"] == 2) {echo "updateevent ";}?>" name="year"></select>
                    </div>
                    <div class="col-md-2 col-6 mb-3">
                        <label for="orario">Orario*</label>
                        <input type="time" class="form-control eventdate" id="orario" name="orario" <?php if ($templateParams["azione"] == 2) {echo 'value="' . $templateParams["oraEvento"] . '"';}?> required/>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-md-6 mb-3">
                        <label for="luogo">Luogo*</label>
                        <input type="text" class="form-control" id="luogo" name="luogo"
                        value="<?php if ($templateParams["azione"] == 2) {echo $templateParams["evento"]["Luogo"];} else {echo "";}?>" required/>
                    </div>
                    <div class="col-md-3 col-6 mb-3">
                        <label for="biglietti">Totale Biglietti*</label>
                        <input type="number" class="form-control" id="biglietti" name="biglietti" min='0' max='1000000'
                        value="<?php if ($templateParams["azione"] == 2) {echo $templateParams["evento"]["NumeroPosti"];} else {echo "";}?>" required/>
                    </div>
                    <div class="col-md-3 col-6 mb-3 input-number input-number-currency">
                        <label for="prezzo">Prezzo*</label>
                        <input type="number" class="form-control" id="prezzo" name="prezzo" step="0.01" min='0' max='1000000' value="<?php if ($templateParams["azione"] == 2) {echo $templateParams["evento"]["PrezzoBiglietto"];} else {echo "";}?>" required/>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-md-3 mb-3">
                        <label for="categoria">Categoria*</label>
                        <select id="categoria" name="categoria" class="form-control">
                            <?php foreach ($templateParams["categorie"] as $categoria): ?>
                                <option value="<?php echo $categoria["IDCategoria"]?>" 
                                    <?php if ($templateParams["azione"] == 2 && $templateParams["evento"]["IDCategoria"] == $categoria["IDCategoria"]) {
                                        echo 'selected = "selected"';}?>>
                                    <?php echo $categoria["NomeCategoria"]?>
                                </option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="col-md-5 mb-3">
                        <a href="./inserisci_categoria.php" class="little-btn col-md-10 mt-md-4 mb-1 py-2">
                            La categoria non è presente?
                        </a>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="eventimg">Immagine*</label><input type="file" name="eventimg" id="eventimg" <?php if ($templateParams["azione"] == 1) {echo "required";}?>/>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-md-6 mb-3">
                        <label for="descrizione">Descrizione*</label>
                        <textarea class="form-control" id="descrizione" name="descrizione" required><?php if ($templateParams["azione"] == 2) {echo $templateParams["evento"]["DescrizioneEvento"];} else {echo "";}?> </textarea>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="note">Note</label>
                        <textarea class="form-control" id="note" name="note"><?php if ($templateParams["azione"] == 2) {echo $templateParams["evento"]["NoteEvento"];} else {echo "";}?></textarea>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-4 col-1 p-0 m-0"> </div>
                    <input type="submit" class="purple-btn col-md-4 col-10 p-3 m-0 mb-5 text-center rounded-pill" value="Inserisci"/>
                    <div class="col-md-4 col-1 p-0 m-0"> </div>
                </div>
                <input type="hidden" name="action" value="<?php echo $templateParams["azione"]; ?>"/>
                <input type="hidden" name="oldimg" value="<?php echo $templateParams["evento"]["ImmagineEvento"]?>"/>
                <input type="hidden" name="eventid" value="<?php echo $templateParams["evento"]["IDEvento"]; ?>"/>
            </div>
        </form>
        <div class="col-0 col-md-1"></div>
    </div>
</div>