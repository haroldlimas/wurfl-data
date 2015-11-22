<?php
return array(
    'id'           => 'google_bot',
    'fallback'     => 'generic_web_crawler',
    'capabilities' => array(
        'model_name' => 'Bot',
        'brand_name' => 'Google',
        'is_bot' => 'true',
        'controlcap_is_robot' => 'force_true',
    ),
);
