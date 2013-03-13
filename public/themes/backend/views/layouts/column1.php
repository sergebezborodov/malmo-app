<?php $this->beginContent('//layouts/main') ?>
<div class="container">
    <? $this->renderPartial('//layouts/_flash') ?>
    <? $this->widget('bootstrap.widgets.TbBreadcrumbs', array('links' => $this->breadcrumbs, 'homeLink' => false)) ?>
    <?=$content?>
    <hr />
    <footer> <p>&copy; <?=date('Y')?> <?=Y::app()->name?></p></footer>
</div>
<? $this->endContent() ?>
