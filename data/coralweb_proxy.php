<?php
return array(
    'id'           => 'coralweb_proxy',
    'fallback'     => 'bloody_transcoder',
    'capabilities' => array(
        'model_name' => 'Proxy',
        'brand_name' => 'CoralWeb',
        'unique' => 'false',
        'release_date' => '2008_january',
        'transcoder_ua_header' => 'X-Operamini-Phone-UA',
    ),
);
