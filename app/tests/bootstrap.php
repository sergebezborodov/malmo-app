<?php

define('ROOT', realpath(__DIR__.'/../..'));
$local = require ROOT.'/etc/local/local.php';

require __DIR__.'/../../malmo/malmot.php';
$shared = require ROOT.'/etc/shared.php';
$test = require ROOT.'/etc/test.php';

$config = CMap::mergeArray($shared, $test);
$config = CMap::mergeArray($config, $local);

require_once(dirname(__FILE__) . '/WebTestCase.php');

Yii::createWebApplication($config);
