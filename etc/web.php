<?php

return array(

    'preload' => array('bootstrap'),

    // application components
    'components' => array(
        'errorHandler' => array(
            'errorAction' => 'site/error',
        ),
        'bootstrap' => array(
            'class' => 'malmo-ext.bootstrap.components.Bootstrap',
        ),
    ),
);
