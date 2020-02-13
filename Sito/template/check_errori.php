<?php if (isset($templateParams["msg"]) && isset($templateParams["error"])):?>
    <div class="row mt-1 mb-2">
        <p class="col-2"></p>
        <p class="col-8 text-center my-2 align-center msg <?php if($templateParams["error"] == 's') {echo "error-msg";} else {echo "good-msg";}?>"><?php echo $templateParams["msg"]?></p>
        <p class="col-2"></p>
    </div>
<?php endif?>