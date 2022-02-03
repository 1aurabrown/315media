<?php

namespace Flynt\Components\ListHorizontal;

use Flynt\FieldVariables;

function getACFLayout()
{
    return [
        'name' => 'ListHorizontal',
        'label' => 'Clients List',
        'sub_fields' => [
            [
                'label' => __('General', 'flynt'),
                'name' => 'generalTab',
                'type' => 'tab',
                'placement' => 'top',
                'endpoint' => 0
            ],
            [
                'label' => __('Title', 'flynt'),
                'name' => 'preContentHtml',
                'type' => 'text',
            ],
            [
                'label' => __('List Horizontal', 'flynt'),
                'name' => 'listHorizontal',
                'type' => 'repeater',
                'layout' => 'row',
                'min' => 1,
                'button_label' => __('Add Accordion Panel', 'flynt'),
                'sub_fields' => [
                    [
                        'label' => __('Title', 'flynt'),
                        'name' => 'title',
                        'type' => 'link',
                        'return_format' => 'array'
                    ],
                ],
            ]
        ],
    ];
}
