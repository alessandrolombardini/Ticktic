<?php
    $templateParams["page_content"] = "./template/registrazione_content.php";
    require_once("./template/base.php");
?>

<script>
  $(document).ready(function(){
      $("div.areagestore").hide();
      $("input[name='gestore']").click(function(){
        $("div.areagestore").fadeIn("slow");
      });
  });
</script>