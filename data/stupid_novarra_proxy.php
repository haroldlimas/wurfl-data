<?php
return array(
    'id'           => 'stupid_novarra_proxy',
    'fallback'     => 'bloody_transcoder',
    'capabilities' => array(
        'unique' => 'false',
        'model_name' => 'CTS reformatting proxy',
        'brand_name' => 'Novarra',
        'is_wireless_device' => 'false',
        'accept_third_party_cookie' => 'false',
        'transcoder_ua_header' => 'X-Device-User-Agent',
        'columns' => '28',
        'physical_screen_height' => '60',
        'physical_screen_width' => '40',
        'rows' => '12',
        'max_image_width' => '165',
        'resolution_height' => '200',
        'resolution_width' => '176',
        'max_image_height' => '160',
    ),
);
