<div class="row">
  <div class="col-1"></div>
  <div class="col-10">
    <div class="row mb-3 mt-5">
        <h3 class="col-8 col-md-7">Nuove notifiche</h3>
    </div>
    <hr/>
    <?php if (isset($templateParams["msg"]) && $templateParams["msg"]!= "0"):?>
        <p class="col-8 mb-3"> <?php echo $templateParams["msg"] ?> </p> 
    <?php endif?>
    <div class="row">
        <?php foreach ($templateParams["notifiche"] as $notifica): ?>
            <div class="notifica col-12 col-md-6" data-IDNotificaPersonale=<?php echo $notifica["IDNotificaPersonale"] ?>>
                <div class="roundend-corners col-md-12 bg-white border mt-2 mb-4 px-4 py-3 shadow-sm">
                    <div class="row m-0 p-0 d-block float-right">
                        <a class="text-right m-0 p-0 click_nuove_notifiche pointer"><i class="fas fa-times color-purple fa-2x"></i></a>
                    </div>
                    <div class="mt-1 mt-md-0">
                        <section>
                            <h4 class="text-left mb-3"><?php echo $notifica["TitoloNotifica"]?></h4>
                            <div class="text-left">
                                <p><?php echo $notifica["TestoNotifica"]?></p>
                                <?php if(isset($notifica["IDOrganizzatore"])): ?>
                                <!-- TODO: Correggere il link per aprire l'evento -->
                                <?php if(isset($notifica["IDEvento"])): ?>
                                <p>In merito all'evento <?php echo $notifica["NomeEvento"]."(".$notifica["DataEvento"].")";?></p>
                                <a href="./evento?IDEvento=<?php echo $notifica["IDEvento"]?>">Apri evento</a>
                                <?php endif ?>
                                <p class="small">Pubblicato da <?php echo $notifica["Nome"]?> <?php echo $notifica["Cognome"]?> (ORGANIZZATORE) il <?php echo $notifica["DataNotifica"]?></p>
                                <?php endif ?>
                                <?php if(isset($notifica["IDAmministratore"])): ?>
                                <p class="small">Pubblicato da <?php echo $notifica["Nome"]?> <?php echo $notifica["Cognome"]?> (AMMINISTRATORE) il <?php echo $notifica["DataNotifica"]?></p>
                                <?php endif ?>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        <?php endforeach ?>
    </div>
  </div>
  <div class="col-1"></div>
</div>