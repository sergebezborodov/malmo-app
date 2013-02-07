<?php


return array(
	'name' => 'Malmo Console Application',

    'components' => array(
        'gearmanClient' => array(
            'servers' => array(
                array('host' => '127.0.0.1', 'port' => 4730)
            ),
        ),
    ),
);
