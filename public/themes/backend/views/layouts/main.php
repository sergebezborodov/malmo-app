<?
$bUrl = Yii::app()->baseUrl;
/** @var CClientScript $cs */
$cs = Yii::app()->clientScript;

$cs->registerCoreScript('jquery');
$cs->registerCssFile(Html::asset('css/utils.css'));
$cs->registerScriptFile(Html::asset('js/utils.js'));

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title><?=Html::encode($this->pageTitle)?></title>
    <!-- Le styles -->
    <style type="text/css">
      body {
        padding-top: 60px;
        padding-bottom: 40px;
      }
      .sidebar-nav {
        padding: 9px 0;
      }
    </style>

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Le fav and touch icons -->
    <link rel="shortcut icon" href="/favicon.ico">
  </head>

  <body>

  <? $this->widget('bootstrap.widgets.TbNavbar', array(
          'brand' => Yii::app()->name,
          'type' => 'inverse',
          'items' => array(
              array(
                  'class' => 'bootstrap.widgets.TbMenu',
                  'items' => $this->menu,
              )
          )
      ))
  ?>

  <?=$content?>

  </body>
</html>
