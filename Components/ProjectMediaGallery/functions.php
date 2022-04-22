<?php

namespace Flynt\Components\ProjectMediaGallery;

use Flynt\FieldVariables;
use Flynt\Utils\Options;

function getACFLayout()
{
    return [
        'name' => 'ProjectMediaGallery',
        'label' => 'Project Media Gallery',
        'sub_fields' => [
            [
                'label' => __('Project Media Gallery', 'flynt'),
                'name' => 'mediaBlocks',
                'type' => 'repeater',
                'layout' => 'table',
                'min' => 1,
                'instructions' => __('Add images and videos. For a given block, video takes precedence over image.', 'flynt'),
                'button_label' => __('Add Media', 'flynt'),
                'sub_fields' => [
                    [
                        [
                            'label' => __('Video', 'flynt'),
                            'name' => 'video',
                            'type' => 'file',
                            'return_format' => 'url',
                            'mime_types' => 'mp4',
                            'library' => 'all',
                        ],
                        [
                            'label' => __('Image', 'flynt'),
                            'name' => 'image',
                            'type' => 'image',
                            'return_format' => 'array',
                            'preview_size' => 'medium',
                            'library' => 'all',
                        ],
                        [
                            'label' => __('Media Width', 'flynt'),
                            'name' => 'width',
                            'type' => 'select',
                            'choices' => [
                                'one-third' => '1/3',
                                'two-third' => '2/3',
                                'one-half' => '1/2',
                                'three-third' => '3/3',
                            ],
                            'default_value' => '1/3',
                        ],
                    ],
                ],
            ],
        ],
    ];
}
