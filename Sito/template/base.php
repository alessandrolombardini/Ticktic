<!DOCTYPE html>
<html lang="it">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <!-- Bootstrap, CSS and JQuery -->
        <link rel="stylesheet" type="text/css" href="./css/style.css" />
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-1/css/all.css"/>
        <script type="text/javascript" src="./js/utils.js"> </script>
        <title>TickTic</title>
    </head>
    <body class ="bg-light">
        <header >
            <nav class="navbar navbar-dark navbar-top row"> <!-- navbar-expand-md per far comparire il menù con display grandi-->
                
                <!-- Navbar Toggler -->
                <button onclick="openNav()" class="navbar-toggler mx-0 border-0">
                    <span  class="fa fa-bars icona-destra"></span>
                </button>

                <!-- Navbar Logo -->
<<<<<<< HEAD
                <a class="navbar-brand py-0 mx-0 float-center" href="./index.php">
=======
                <a class="navbar-brand py-0  float-center" href="./index.php">
>>>>>>> c5892e29ec35083a1844ccd48e303136caccf469
                    <img id="nav-logo" src="./images/ticktic_logo.png" alt="ticktic logo" />
                </a>

                <!-- Search Bar Desktop -->
                <ul class=" ml-10 navbar-nav align-items-center d-none d-xl-block mr-auto desktop-search-bar">
                    <li class="nav-item" >
                        <form class="form-inline search-box" >
                            <input class="form-control rounded-pill search-input w-100"  type="search" placeholder="Cerca ..." aria-label="Search" />
                        </form>
                    </li>
                </ul>

                <!-- Navbar Right Side-->
                <ul class="navbar nav align-items-center float-right">
                    <li class="nav-item mx-1">
                        <a class="nav-link font-white px-0 icona-destra" href="nuove_notifiche.php">
                            <i class="fas fa-bell campanella"></i>
                        </a> 
                    </li>
                    <?php if (!isset($_SESSION["id"]) || $_SESSION["autorizzazione"] == "UTENTE"):?>
                      <li class="nav-item  mx-2">
                          <a class="nav-link font-white px-0 icona-destra" href="carrello.php">
                              <i class="fa fa-shopping-cart"></i>  
                          </a>
                      </li>
                    <?php endif?> 
                </ul> 
            </nav>

            <!-- Search Bar Mobile -->  
            <div class="row text-center">  
                <ul class=" mb-2 mx-auto navbar-nav d-block d-xl-none align-items-center d-none mobile-search-bar">
                    <li class="nav-item" >
                        <form class="form-inline search-box" >
                            <input class="form-control rounded-pill search-input w-100"  type="search" placeholder="Cerca ..." aria-label="Search" />
                        </form>
                    </li>
                </ul>
            </div>

            <!-- Nav overlay -->
            <div class="overlay" id="nav"> <!-- Contenuto del menu -->
                <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                <div class="overlay-content">
                    <a class="font-weight-bold" href="./account.php">Account</a>   
                    <?php if (isset($_SESSION["id"]) && $_SESSION["autorizzazione"] == "ORGANIZZATORE"):?>
                      <a class="font-weight-bold" href="./area_gestore.php?msg=0">Area organizzatore</a>                       
                    <?php endif?>                     
                    <?php if (isset($_SESSION["id"]) && $_SESSION["autorizzazione"] == "AMMINISTRATORE"):?>
                      <a class="font-weight-bold" href="./area_gestore.php?msg=0">Area amministratore</a>                       
                    <?php endif?>                     
                    <a class="font-weight-bold" href="./nuove_notifiche.php">Notifiche</a>       
                    <?php if (!isset($_SESSION["id"]) || $_SESSION["autorizzazione"] == "UTENTE"):?>
                        <a class="font-weight-bold" href="./ordini.php">Ordini</a>                
                        <a class="font-weight-bold" href="./lista_desideri.php">Lista Desideri</a>
                    <?php endif?> 
                    <a class="font-weight-bold dropdown-btn">Naviga
                        <span class="fa fa-caret-down"></span>
                    </a>
                    <div class="dropdown-container overlay-bg-color">
                        
                        <a class="font-weight-bold" href="./eventi.php">Eventi</a>
                        <a class="font-weight-bold" href="./categorie.php">Categorie</a>
                        <a class="font-weight-bold" href="./artisti.php">Artisti</a>
                        <a class="font-weight-bold" href="./luoghi.php" >Luoghi</a>
                    </div>
                    <?php if (isset($_SESSION["id"])):?>
                        <a class="font-weight-bold" href="./logout.php">Logout</a>
                    <?php endif?>      
                </div>
            </div>
        </header>
        <main>
            <!-- Main content of the page -->
            <?php
                if(isset($templateParams["page_content"])){
                    require($templateParams["page_content"]);
                }
            ?>
        </main>
        <footer class="py-3 text-white">
            <div class="row mb-3">
                <div class="col-1"></div>
                <div class="col-3">
                    <nav class="nav flex-column">
                        <p class="pl-3 mb-0 pb-0 font-white">CATEGORIE</p>
                        <div class="dropdown-divider"></div>
                            
                            <?php foreach ($templateParams["categories"] as $categoria) :?>
                                <a class="nav-link font-white" href="./categoria?id=<?php echo $categoria["IDCategoria"]?>"> <?php echo $categoria["NomeCategoria"] ?></a>
                            <?php endforeach ?>
                    </nav>
                </div>
                <div class="col-2"></div>
                <div class="col-1"></div>
                <div class="col-3">
                    <nav class="nav flex-column">
                        <p class="pl-3 mb-0 pb-0 font-white"> OVERVIEW </p>
                        <div class="dropdown-divider"></div>
                        <a class="nav-link font-white" href="#">Eventi</a>
                        <a class="nav-link font-white" href="#">Categorie</a>
                        <a class="nav-link font-white" href="#">Luoghi</a>
                        <a class="nav-link font-white" href="#">Artisti</a>
                        <a class="nav-link font-white" href="#">Area Personale</a>
                    </nav>
                </div>
                <div class="col-2"></div>
            </div>
            <div class="row">
                <div class="col-1"></div>
                <div class="col-10">  
                    <div class="dropdown-divider mb-2"></div>
                </div>
                <div class="col-1"></div>
            </div>
            <div class="row">
                <div class="col-1 col-md-1"></div>
                <div class="col-md-5 col-10">  
                    <p class="text-md-right text-center mb-0 font-little font-white">ticktic - Via Roma dell'Università 612, FC - Cesena - 47042</p>
                </div>
                <div class="col md-5">
                    <p class="text-md-left text-center pl-5 pl-md-0 font-little font-white">info@ticktic.com - tel. 0547892346 - P.IVA 0243546576678  </p>
                </div>
                <div class="col-1 col-md-1"></div>
            </div>
        </footer>   
    </body>
</html>

