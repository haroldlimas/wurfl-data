<?php
return array(
    'id'           => 'generic_desktop_application',
    'fallback'     => 'generic_web_browser',
    'capabilities' => array(
        'model_name' => 'App',
        'brand_name' => 'Generic',
        'device_os' => 'Desktop',
        'controlcap_is_app' => 'force_true',
    ),
);
