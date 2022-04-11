<?php

namespace Flynt\Components\ListHorizontal;

use Flynt\FieldVariables;

function getACFLayout()
{
    return [
        'name' => 'ListHorizontal',
        'label' => 'Clients Link List',
        'sub_fields' => [
            [
                'label' => __('Title', 'flynt'),
                'name' => 'preContentHtml',
                'type' => 'text',
            ],
            [
                'label' => __('Clients', 'flynt'),
                'name' => 'listHorizontal',
                'type' => 'repeater',
                'layout' => 'row',
                'min' => 1,
                'button_label' => __('Add Link', 'flynt'),
                'sub_fields' => [
                    [
                        'label' => __('Link', 'flynt'),
                        'name' => 'title',
                        'type' => 'link',
                        'return_format' => 'array'
                    ],
                ],
            ]
        ],
    ];
}
