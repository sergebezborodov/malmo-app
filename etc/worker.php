<?php


return array(
    'components'=>array(
        'worker' => array(
            'class' => 'WorkerDaemon',
            'servers' => array('127.0.0.1'),
        ),
        'router' => array(
            'class' => 'WorkerRouter',
            'routes' => array(),
        ),
    ),
);
