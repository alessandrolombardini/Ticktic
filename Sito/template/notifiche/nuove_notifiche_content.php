<div class="row">
  <div class="col-0 col-md-1"></div>
  <div class="col-12 col-md-10">
    <div class="row mb-md-3 mb-0 mt-5 align-items-end">
        <p class="titolo_sezioni col-8 col-md-7 mt-2 mb-0">Nuove notifiche/p>
        <a class="col-md-5 col-4 text-right pt-3 cursor-pointer purple-black-link font-weight-bold" href="storico_notifiche.php"> Vai allo storico notifiche </a>
    </div>
    <hr class="mt-1 mx-2"/>
    <?php if (count($templateParams["notifiche"]) == 0):?>
        <div class="row error-template">
            <div class="col-1 col-md-2"></div>
            <div class="roundend-corners col-10 col-md-8 bg-white border mt-2 mb-4 px-4 py-3 mr-0 ">
                <div class="error-template text-center">
                    <p class="h5 pt-4">Non ci sono nuove notifiche</p>
                </div>
            </div>
            <div class="col-1 col-md-2"></div>
        </div>
    <?php endif ?>
    <div data-dataAggiornamento="<?php echo $templateParams["dataAggiornamento"] ?>" class="row dataPerNotifiche">
        <?php foreach ($templateParams["notifiche"] as $notifica): ?>
            <div class="col-12 col-md-6 col-xl-4">
                <div class="notifica">
                    <div class="roundend-corners col-md-12 bg-white border mt-2 mb-4 px-4 py-3 shadow-sm">
                        <div class="row m-0 p-0 d-block float-right">
                            <a data-IDNotificaPersonale="<?php echo $notifica["IDNotificaPersonale"] ?>" class="text-right m-0 p-0 click_nuove_notifiche pointer"><span class="fas fa-times color-purple fa-2x"></span></a>
                        </div>
                        <div class="mt-1 mt-md-0">
                            <section>
                                <h4 class="text-left mb-3"><?php echo $notifica["TitoloNotifica"]?></h4>
                                <div class="text-left">
                                    <p><?php echo $notifica["TestoNotifica"]?></p>
                                    <?php if(isset($notifica["IDOrganizzatore"])): ?>
                                      <p class="small">Pubblicato da <?php echo $notifica["Nome"]?> <?php echo $notifica["Cognome"]?> (ORGANIZZATORE) il <?php echo $notifica["DataNotifica"]?></p>
                                      <?php if(isset($notifica["IDEvento"])): ?>
                                      <p class="small">In merito all'evento <?php echo $notifica["NomeEvento"]." (in data ".$notifica["DataEvento"].")";?></p>
                                      <div class="text-right"><a href="./evento.php?IDEvento=<?php echo $notifica["IDEvento"]?>">Apri evento</a></div>
                                      <?php endif ?>
                                    <?php endif ?>
                                    <?php if(isset($notifica["IDAmministratore"])): ?>
                                    <p class="small">Pubblicato da <?php echo $notifica["Nome"]?> <?php echo $notifica["Cognome"]?> (AMMINISTRATORE) il <?php echo $notifica["DataNotifica"]?></p>
                                    <?php endif ?>
                                </div>
                            </section>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach ?>
    </div>
  </div>
  <div class="col-0 col-md-1"></div>
</div>
