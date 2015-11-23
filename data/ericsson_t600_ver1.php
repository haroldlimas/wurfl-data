<?php
return array(
    'id'           => 'ericsson_t600_ver1',
    'fallback'     => 'ericsson_generic',
    'capabilities' => array(
        'model_name' => 'T600',
        'uaprof' => 'http://wap.sonyericssonmobile.com/UAprof/T600R101.xml',
        'resolution_width' => '101',
        'resolution_height' => '65',
        'max_image_width' => '101',
        'max_image_height' => '48',
        'gif' => 'true',
        'greyscale' => 'true',
        'colors' => '4',
        'ems' => 'true',
        'preferred_markup' => 'wml_1_1',
        'xhtml_support_level' => '-1',
        'streaming_real_media' => 'none',
    ),
);
