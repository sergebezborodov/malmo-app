<?php

return array(
    'name'        => 'Malmo Application',
    'basePath'    => ROOT . DS . 'app',
    'runtimePath' => ROOT . DS . 'tmp',
    'modulePath'  => ROOT . DS . 'modules',

    // preloading 'log' component
    'preload' => array('log'),

    // autoloading model and component classes
    'import' => array(
        'application.components.*',
        'application.components.helpers.*',
        'application.models.*',
        'ext.slog.*',
    ),

    // application components
    'components' => array(
        'db' => require 'local/database.php',
        'urlManager' => array(
            'urlFormat'       => 'path',
            'showScriptName'  => false,
            'rules' => array(
                '/' => 'site/index',


                '<controller:\w+>/<id:\d+>'              => '<controller>/view',
                '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
                '<controller:\w+>/<action:\w+>'          => '<controller>/<action>',
            ),
        ),
        'log' => array(
            'class' => 'CLogRouter',
            'routes' => array(
                array(
                    'class'=>'CFileLogRoute',
                    'levels'=>'error, warning',
                ),
            ),
        ),
    ),

    'params' => require 'others/params.php',
);
