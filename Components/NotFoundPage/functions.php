<?php

namespace Flynt\Components\NotFoundPage;

use Flynt\Utils\Options;

Options::addTranslatable('NotFoundPage', [
    [
        'label' => __('General', 'flynt'),
        'name' => 'general',
        'type' => 'tab',
        'placement' => 'top',
        'endpoint' => 0,
    ],
    [
        'label' => __('Content', 'flynt'),
        'name' => 'contentHtml',
        'instructions' => __('Content to be displayed on the 404 Not Found Page', 'flynt'),
        'type' => 'wysiwyg',
        'media_upload' => 0,
        'default_value' => '<h1>Not Found</h1><p>The page you are looking for does not exist.</p>',
        'required' => 1,
        'delay' => 1,
    ],
    [
        'label' => __('Back to Homepage Label', 'flynt'),
        'name' => 'backLinkLabel',
        'instructions' => __('Leave empty to remove back to home link below the content area.', 'flynt'),
        'type' => 'text',
        'default_value' => 'Back to homepage'
    ]
]);
