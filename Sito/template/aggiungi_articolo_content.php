<div class="container mt-3">
    <div class="col-12">
        <h3 class="mb-3">Aggiungi evento</h4>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="nome">Nome evento</label>
                <input type="text" class="form-control" id="nome"/>
            </div>
            <!-- mettere una form in cui è possibile ricercare un artista in real-time con json -->
            <div class="form-group">
                <label for="artista">Artista</label>
                <input type="text" class="form-control" id="artista"/>
            </div>
            <div class="form-group">
                <label for="data">Data evento</label>
                <input type="date" class="form-control" name="data" id="data"/> 
            </div>
            <div class="form-group">
                <label for="descrizione">Descrizione</label>
                <textarea name="descrizione" id="descrizione" class="form-control" rows="2"></textarea>
            </div>
            <div class="form-group">
                <label for="noteevento">Note evento</label>
                <textarea name="noteevento" id="noteevento" class="form-control" rows="1"></textarea>
            </div>
            <div class="form-group">
                <label for="categoria">Categoria</label>
                <select name="categoria" class="form-control">
                    <option value="Danza">Danza</option>
                    <option value="Concerto">Concerto</option>
                    <option value="Sport">Sport</option>
                </select>
            </div>
            <div class="form-group">
                <label for="immagine">Immagine</label>
                <input type="file" name="immagine" id="immagine" class="form-control" />
            </div>
            <div class="form-group col-12 text-center"> 
                <button type="submit" class="purple-btn bnt-default d-inline-block">Preview</button>
                <button type="submit" class="purple-btn btn-default d-inline-block">Pubblica</button>
            </div>
        </form>
    </div>
</div>