<div class="container">
    <div class="row text-center">
        <h3 class="mb-3"> Storico notifiche </h4>        
    </div>
    <?php foreach ($templateParams["notifiche"] as $notifica): ?>
        <div class="row">
            <div class="col-1 col-md-2"></div>
            <div class="roundend-corners col-10 col-md-8 bg-white border mt-2 mb-4 px-4 py-3 shadow-sm">
                <div class="mt-1 mt-md-0">
                    <h4 class="text-left mb-3"><?php echo $notifica["TitoloNotifica"]?></h4>
                    <div class="text-left">
                        <p><?php echo $notifica["TestoNotifica"]?></p>
                        <?php if(isset($notifica["IDOrganizzatore"])): ?>
                        <p>Pubblicato da <?php echo $notifica["Nome"]?> <?php echo $notifica["Cognome"]?> (ORGANIZZATORE) il <?php echo $notifica["DataNotifica"]?></p>
                        <?php endif ?>
                        <?php if(isset($notifica["IDAmministratore"])): ?>
                        <p>Pubblicato da <?php echo $notifica["Nome"]?> <?php echo $notifica["Cognome"]?> (AMMINISTRATORE) il <?php echo $notifica["DataNotifica"]?></p>
                        <?php endif ?>
                        <!-- TODO: Correggere il link per aprire l'evento -->
                        <?php if(isset($notifica["IDEvento"])): ?>
                        <p>In merito all'evento <?php echo $notifica["NomeEvento"]."(".$notifica["DataEvento"].")";?></p>
                        <a href="./evento?IDEvento=<?php echo $notifica["IDEvento"]?>">Apri evento</a>
                        <?php endif ?>
                    </div>
                </div>
            </div>
            <div class="col-1 col-md-2"></div>
        </div>
    <?php endforeach ?>
</div>