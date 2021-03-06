<?php

namespace Flynt\Components\Contact;

use Flynt\FieldVariables;
use Flynt\Utils\Options;

Options::addTranslatable('Contact', [
    [
        'label' => __('General', 'flynt'),
        'name' => 'generalTab',
        'type' => 'tab',
        'placement' => 'top',
        'endpoint' => 0
    ],
    [
        'label' => __('Content', 'flynt'),
        'name' => 'contentHtml',
        'type' => 'wysiwyg',
        'tabs' => 'visual',
        'toolbar' => 'basic',
        'delay' => 0,
        'media_upload' => 0,
        'required' => 0,
    ]
]);
