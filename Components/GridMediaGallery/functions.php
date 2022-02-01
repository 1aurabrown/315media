<?php

namespace Flynt\Components\GridMediaGallery;

use Flynt\FieldVariables;
use Flynt\Utils\Options;

function getACFLayout()
{
    return [
        'name' => 'GridMediaGallery',
        'label' => 'Grid: Media Gallery',
        'sub_fields' => [
            [
                'label' => __('Gallery', 'flynt'),
                'name' => 'repeaterGallery',
                'type' => 'repeater',
                'layout' => 'block',
                'min' => 1,
                'button_label' => __('Add Media', 'flynt'),
                'sub_fields' => [
                    [
                        'label' => __('Image', 'flynt'),
                        'name' => 'panelImage',
                        'type' => 'image',
                        'return_format' => 'array',
                        'preview_size' => 'medium',
                        'library' => 'all',
                        'conditional_logic' => [
                            [
                                [
                                    'fieldPath' => 'panelVideo',
                                    'operator' => '==empty',
                                ]
                            ]
                        ],
                        'wrapper' => [
                            'width' => '50',
                        ],
                    ],
                    [
                        'label' => __('Image Width', 'flynt'),
                        'name' => 'panelImageWidth',
                        'type' => 'select',
                        'choices' => [
                            'one-third' => '1/3',
                            'two-third' => '2/3',
                            'three-third' => '3/3',
                        ],
                        'default_value' => '1/3',
                        'conditional_logic' => [
                            [
                                [
                                    'fieldPath' => 'panelImage',
                                    'operator' => '!=empty',
                                ]
                            ]
                        ],
                        'wrapper' => [
                            'width' => '50',
                        ],
                    ],
                    [
                        'label' => __('Video', 'flynt'),
                        'name' => 'panelVideo',
                        'type' => 'file',
                        'return_format' => 'url',
                        'mime_types' => 'mp4',
                        'conditional_logic' => [
                            [
                                [
                                    'fieldPath' => 'panelImage',
                                    'operator' => '==empty',
                                ]
                            ]
                        ],
                        'wrapper' => [
                            'width' => '50',
                        ],
                    ],
                    [
                        'label' => __('Video Width', 'flynt'),
                        'name' => 'panelVideoWidth',
                        'type' => 'select',
                        'choices' => [
                            'one-third' => '1/3',
                            'two-third' => '2/3',
                            'three-third' => '3/3',
                        ],
                        'default_value' => '1/3',
                        'conditional_logic' => [
                            [
                                [
                                    'fieldPath' => 'panelVideo',
                                    'operator' => '!=empty',
                                ]
                            ]
                        ],
                        'wrapper' => [
                            'width' => '50',
                        ],
                    ],
                ],
            ],
        ],
    ];
}
