<?php

namespace Flynt\Components\SideLogo;

use Flynt\Utils\Options;
use Flynt\FieldVariables;
use Timber\Timber;

Options::addGlobal('SideLogo', [
    [
        'label' => __('Logo Image', 'flynt'),
        'name' => 'logo',
        'type' => 'image',
        'return_format' => 'array',
        'preview_size' => 'medium',
        'library' => 'all',
        'mime_types' => 'jpg,jpeg,png',
        'required' => 0,
        'instructions' => __('Image-Format: JPG, PNG. Recommended resolution greater than 2048 x 800 px.', 'flynt'),
    ]
]);
