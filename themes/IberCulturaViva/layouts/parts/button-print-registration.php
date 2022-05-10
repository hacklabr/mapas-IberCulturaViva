<?php
use MapasCulturais\i;

$url = $app->createUrl("registration", "print", ["id" => $registration->id]);
?>
<div class="clearfix clear" style="margin-bottom: 1rem;">
    <a href="<?=$url?>" class="alignright btn btn-default hltip print-registration" title="" hltitle="Acessar versão para impressão" target="_blank">
        <?php i::_e("Imprimir"); ?>
    </a>
</div>
