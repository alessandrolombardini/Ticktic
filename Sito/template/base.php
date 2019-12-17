<!doctype html>
<html lang="it">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

        <!-- Bootstrap, CSS and JQuery -->
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-1/css/all.css"/>
        <link rel="stylesheet" type="text/css" href="./css/style.css" />
        
        <title>TickTick</title>
  </head>
  <body class ="bg-light">
        <header class="">
            <nav class="navbar navbar-static-top navbar-dark"> <!-- navbar-expand-md per far comparire il menù con display grandi-->
                <div class="container-fluid ml-mr-0">
                    <button class="navbar-toggler text-light collapsed float-left" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fa fa-bars "></i>
                    </button>
                    
                    <a class="blog-header-logo w-50 float-left" href="index.php">
                        <img src="./images/ticktic_logo.png" class="img-fluid float-left" alt="" />
                    </a>                      

                    <a class="nav-link text-light">
                                <i class="fa fa-shopping-cart " href="#"></i>  
                    </a>            
                    
                    <div class="collapse navbar-collapse" id="navbar"> <!-- Contenuto del menu -->
                        <ul class="nav navbar-nav mr-auto">
                            <li class="nav-item mt-3 mt-md-0">
                                <a class="nav-link text-light" href="./login.php">
                                    <span>Account</span>
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link text-light" href="./ordini.php">
                                    <span>Ordini</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-light" href="./lista_desideri.php">
                                    <span>Lista Desideri</span>
                                </a>
                            </li>
                            <div class="dropdown-divider"></div>
                            <li class="nav-item dropdown show">
                                <a id="#site-navigation" class="nav-link text-light dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span>Naviga</span>
                                </a>
                                <div class="dropdown-menu bg-dark border-dark " aria-labelledby="site-navigation">
                                    <a class="dropdown-item text-light" href="./eventi.php">Eventi</a>
                                    <a class="dropdown-item text-light" href="./categorie.php">Categorie</a>
                                    <a class="dropdown-item text-light" href="./artisti.php">Artisti</a>
                                    <a class="dropdown-item text-light" href="./luoghi.php" >Luoghi</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>
        <main>
            <!-- Main content of the page -->
            <?php
                if(isset($templateParams["page_content"])){
                    require($templateParams["page_content"]);
                }
            ?>
        </main>
        <div class="row">
            <div class="col-12">
                <footer class="py-3 text-white">
                    <div class="row mb-3">
                        <div class="col-1"></div>
                        <div class="col-3">
                            <nav class="nav flex-column">
                                <p class="pl-3 mb-0 pb-0">CATEGORIE</p>
                                <div class="dropdown-divider"></div>
                                <a class="nav-link" href="#">Sport</a>
                                <a class="nav-link" href="#">Concerti</a>
                                <a class="nav-link" href="#">Cinema</a>
                                <a class="nav-link" href="#">Spettacoli</a>
                                <a class="nav-link" href="#">Fiere</a>
                                <a class="nav-link" href="#">Mostre e Musei</a>
                                <a class="nav-link" href="#">Altro</a>
                            </nav>
                        </div>
                        <div class="col-2"></div>
                        <div class="col-1"></div>
                        <div class="col-3">
                            <nav class="nav flex-column">
                                <p class="pl-3 mb-0 pb-0"> OVERVIEW </p>
                                <div class="dropdown-divider"></div>
                                <a class="nav-link" href="#">Eventi</a>
                                <a class="nav-link" href="#">Categorie</a>
                                <a class="nav-link" href="#">Luoghi</a>
                                <a class="nav-link" href="#">Artisti</a>
                                <a class="nav-link" href="#">Area Personale</a>
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

                    <div class="row" id="footer-info">
                        <div class="col-1 col-md-1"></div>
                        <div class="col-md-5 col-10">  
                            <p class="text-md-right text-center mb-0">ticktic - Via Roma dell'Università 612, FC - Cesena - 47042</p>
                        </div>
                        <div class="col md-5">
                            <p class="text-md-left text-center pl-5 pl-md-0">info@ticktic.com - tel. 0547892346 - P.IVA 0243546576678  </p>
                        </div>
                        <div class="col-1 col-md-1"></div>
                    </div>
                    </div>
                </footer>   
            </div>   
        </div>
  </body>
</html>

