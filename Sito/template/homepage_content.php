<!-- Testata del sito -->
<div id="homepage-image" class="position-relative m-0 p-0"> 
      <h1 class="text-light text-center pt-5">Benvenuti su ticktic! </h1>
      <h2 class="text-light text-center">Il miglior portale di ricerca e acquisto di eventi!</h2>
      <!-- Search form -->
      <div class="row mt-10">
        <div class="col-lg-3"></div>
        <div class="col-12 col-lg-6">
          <form class="search-box mx-3 mb-5">
            <input class="form-control rounded-pill search-input text-center" type="search" placeholder="Cerca per Eventi, Artisti, Luoghi, ..." aria-label="Search">
          </form>
        </div>
        <div class="col-lg-3"></div>
      </div>
    
</div>

<!-- Carousel -->
<div class="container-fluid mt-2">
  <h3 class="d-inline mr-3">Suggeriti per te</h3>
  <div class=" mb-3 mt-1 dropdown-divider w-50 font-weight-bold"></div>
</div>



<div class="slideshow row">
  <?php foreach ($templateParams["eventi"] as $evento) :?>
    <div class="row p-3">
      <div class="roundend-corners border p-2">
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

<!-- Categorie -->
<div class="container-fluid mt-2 mb-3">
  <h3 class="d-inline mr-3">Categorie</h3>
  <div class=" mb-3 mt-1 dropdown-divider w-50 font-weight-bold"></div>
</div>
<div class="row">

  <?php foreach($templateParams["rand_categories"] as $categoria):?>
    <div class="col-6 col-md-4 col-xl-2">
      <div class="m-3">
        <a href="./categoria.php?IDCategoria=<?php echo $categoria["IDCategoria"]?>">
          <img class="img-fluid" src="./images/categorie/<?php echo $categoria["ImmagineCategoria"] ?>" alt="<?php echo getAltFromImageName($categoria["ImmagineCategoria"]) ?>" />
        </a>
      </div>
    </div>
  <?php endforeach ?>

</div>