<?php if (isset($templateParams["msg"]) && isset($templateParams["error"])):?>
<div class="row mb-2">
    <p class="col-3"></p>
    <p class="col-6 text-center my-2 align-center msg <?php if($templateParams["error"] == 's') {echo "error-msg";} else {echo "good-msg";}?>"><?php echo $templateParams["msg"]?></p>
    <p class="col-3"></p>
</div>
<?php endif?>