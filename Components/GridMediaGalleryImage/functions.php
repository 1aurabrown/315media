<?php

namespace Flynt\Components\GridMediaGalleryImage;

use Flynt\FieldVariables;
use Flynt\Utils\Options;

function getACFLayout()
{
    return [
        'name' => 'GridMediaGalleryImage',
        'label' => 'Image: Media Gallery',
        'sub_fields' => [
            [
                [
                    'label' => __('Image', 'flynt'),
                    'name' => 'mediaGalleryImage',
                    'type' => 'image',
                    'return_format' => 'array',
                    'preview_size' => 'medium',
                    'library' => 'all',
                    'wrapper' => [
                        'width' => '50',
                    ],
                ],
                [
                    'label' => __('Image Width', 'flynt'),
                    'name' => 'mediaGalleryImageWidth',
                    'type' => 'select',
                    'choices' => [
                        'one-third' => '1/3',
                        'two-third' => '2/3',
                        'one-half' => '1/2',
                        'three-third' => '3/3',
                    ],
                    'default_value' => '1/3',
                    'wrapper' => [
                        'width' => '25',
                    ],
                ],
                [
                    'label' => __('Inherent height?', 'flynt'),
                    'name' => 'mediaGalleryImageHeight',
                    'type' => 'true_false',
                    'default_value' => 0,
                    'ui' => 1,
                    // 'ui_on_text' => '',
                    // 'ui_off_text' => '',
                    'wrapper' => [
                        'width' => '25',
                    ],
                ],
            ],
        ],
    ];
}
