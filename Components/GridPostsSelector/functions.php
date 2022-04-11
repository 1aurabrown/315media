<?php

namespace Flynt\Components\GridPostsSelector;

use Flynt\FieldVariables;
use Flynt\Utils\Options;

function getACFLayout()
{
    return [
        'name' => 'GridPostsSelector',
        'label' => 'Featured Projects',
        'sub_fields' => [
            [
                'label' => __('Featured Projects', 'flynt'),
                'name' => 'projectsBlocks',
                'type' => 'repeater',
                'layout' => 'table',
                'min' => 1,
                'button_label' => __('Add Project', 'flynt'),
                'sub_fields' => [
                    [
                        'label' => __('Project', 'flynt'),
                        'name' => 'post',
                        'type' => 'post_object',
                        'wrapper' => [
                            'width' => '50',
                        ],
                    ],
                    [
                        'label' => __('Block Width', 'flynt'),
                        'name' => 'projectWidth',
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
                ]
            ]
        ],
    ];
}
