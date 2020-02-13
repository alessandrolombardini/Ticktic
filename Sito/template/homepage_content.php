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
<div id="carousel" class="carousel slide containter-fluid mt-2" data-ride="carousel">
  <div class="carousel-inner ">
    <?php foreach($templateParams["rand_categories"] as $categoria):?>
      
      <div class="carousel-item">
        <div><p><?php echo $categoria["IDCategoria"]?></p></div>
      </div>
    <?php endforeach ?>
  </div>
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