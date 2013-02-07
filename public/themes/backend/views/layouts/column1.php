<?php $this->beginContent('//layouts/main') ?>
<div class="container">
    <? $this->renderPartial('//layouts/_flash') ?>
    <?=$content?>
    <hr />
    <footer> <p>&copy; <?=date('Y')?> <?=Y::app()->name?></p></footer>
</div>
<? $this->endContent() ?>
