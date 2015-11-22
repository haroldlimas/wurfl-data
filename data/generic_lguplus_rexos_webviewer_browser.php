<?php
return array(
    'id'           => 'generic_lguplus_rexos_webviewer_browser',
    'fallback'     => 'generic_lguplus_rexos',
    'capabilities' => array(
        'model_name' => 'LGUPlus/Rex/WebViewer',
        'mobile_browser' => 'LGUPlus WebViewer',
        'xhtml_supports_iframe' => 'partial',
        'css_spriting' => 'true',
        'css_supports_width_as_percentage' => 'false',
        'image_inlining' => 'true',
    ),
);
