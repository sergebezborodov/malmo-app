<?php
// main code starts here ;)

define('ROOT', realpath(dirname(__FILE__) . DIRECTORY_SEPARATOR . '..' ));
$local  = require ROOT.'/etc/local/local.php';

require_once ROOT.'/malmo/malmo.php';
$shared = require ROOT.'/etc/shared.php';
$web    = require ROOT.'/etc/web.php';

$webBackend = ROOT.'/etc/others/backend.php';
$webFrontend = ROOT.'/etc/others/frontend.php';

$config = CMap::mergeArray($shared, $web);


if (($sd = explode('.', $_SERVER['HTTP_HOST'])) && $sd[0] == BACKEND_SUBDOMAIN) {
    $config = CMap::mergeArray($config, require $webBackend);
} else {
    $config = CMap::mergeArray($config, require $webFrontend);
}

$config = CMap::mergeArray($config, $local);

$app = Yii::createWebApplication($config);
$app->run();
