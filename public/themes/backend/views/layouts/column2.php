<? $this->beginContent('//layouts/main')?>
<div class="container">
  <div class="row">
    <div class="span2">
        <?if ($this->leftMenu):?>
            <?  $this->widget('bootstrap.widgets.TbMenu', array(
                'type'  => 'list',
                'items' => $this->leftMenu,
            ))?>
        <?else:?>
            &nbsp;
        <?endif?>

    </div><!--/span-->
    <div class="span10">
        <? $this->renderPartial('//layouts/_flash') ?>

        <? $this->widget('bootstrap.widgets.TbBreadcrumbs', array('links' => $this->breadcrumbs, 'homeLink' => false)) ?>

        <?=$content?>
    </div><!--/span-->
  </div><!--/row-->
    <hr/>

    <footer> <p>&copy; <?=date('Y')?> <?=Y::app()->name?></p></footer>
</div>
<? $this->endContent()?>
