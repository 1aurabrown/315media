<?php

namespace Flynt\Components\GridMediaGalleryVideo;

use Flynt\FieldVariables;
use Flynt\Utils\Options;

function getACFLayout()
{
    return [
        'name' => 'GridMediaGalleryVideo',
        'label' => 'Video: Media Gallery',
        'sub_fields' => [
            [
                [
                    'label' => __('Video', 'flynt'),
                    'name' => 'mediaGalleryVideo',
                    'type' => 'file',
                    'return_format' => 'url',
                    'mime_types' => 'mp4',
                    'wrapper' => [
                        'width' => '50',
                    ],
                ],
                [
                    'label' => __('Video Width', 'flynt'),
                    'name' => 'mediaGalleryVideoWidth',
                    'type' => 'select',
                    'choices' => [
                        'one-third' => '1/3',
                        'two-third' => '2/3',
                        'one-half' => '1/2',
                        'three-third' => '3/3',
                    ],
                    'default_value' => '1/3',
                    'wrapper' => [
                        'width' => '50',
                    ],
                ],
            ],
        ],
    ];
}
