<?

if (empty($functions)) {
    $functions = array();
}

define('ROOT', realpath(dirname(__FILE__) . '/..' ));
$local  = require ROOT . '/etc/local/local.php';

define('YII_ENABLE_ERROR_HANDLER', false);
mb_internal_encoding('UTF-8');
ini_set('memory_limit', '1024M');
ini_set('display_errors', 'On');
error_reporting  (E_ALL);
define('CONSOLE_APP', true);

require_once ROOT.'/malmo/malmo.php';

$shared  = require ROOT . '/etc/shared.php';
$worker = require ROOT . '/etc/worker.php';

$config = CMap::mergeArray($shared, $worker);
$config = CMap::mergeArray($config, $local);


$config = CMap::mergeArray($config, array(
    'components' => array(
        'router' => array(
            'routes' => $functions,
        ),
    ),
));

$app = Yii::createWorkerApplication($config);
$app->run();
