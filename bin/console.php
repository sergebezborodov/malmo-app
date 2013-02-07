<?php

define('ROOT', realpath(dirname(__FILE__) . '/..' ));
$local  = require ROOT . '/etc/local/local.php';

define('YII_ENABLE_ERROR_HANDLER', false);
ini_set('memory_limit', '1024M');
ini_set('display_errors', 'On');
mb_internal_encoding('UTF-8');
error_reporting  (E_ALL);
define('CONSOLE_APP', true);

require_once ROOT.'/malmo/malmo.php';

$shared  = require ROOT . '/etc/shared.php';
$console = require ROOT . '/etc/console.php';

$config = CMap::mergeArray($shared, $console);
$config = CMap::mergeArray($config, $local);

defined('STDIN') or define('STDIN', fopen('php://stdin', 'r'));

$app = Yii::createConsoleApplication($config);
$app->commandRunner->addCommands(YII_PATH.'/cli/commands');
$app->run();
