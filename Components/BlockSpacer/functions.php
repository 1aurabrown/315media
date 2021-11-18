<?php

namespace Flynt\Components\BlockSpacer;

use Flynt\FieldVariables;

function getACFLayout()
{
    return [
        'name' => 'BlockSpacer',
        'label' => 'Spacer',
        'sub_fields' => [
            [
                [
                    'label' => __('Spacer', 'flynt'),
                    'name' => 'message',
                    'type' => 'message',
                    'message' => __('The spacer block add space between components. You can choose its height (%) and color/theme. Simply move the component in between components.', 'flynt'),
                    'new_lines' => 'wpautop',
                    'esc_html' => 1
                ],
                [
                    'label' => __('Options', 'flynt'),
                    'name' => 'optionsTab',
                    'type' => 'tab',
                    'placement' => 'top',
                    'endpoint' => 0
                ],
                [
                    'label' => '',
                    'name' => 'height',
                    'type' => 'range',
                    'default_value' => 5,
                    'min' => '1',
                    'max' => '100',
                    'step' => '1',
                    'append' => '%',
                ]
            ],
        ]
    ];
}
