<?php

use ACFComposer\ACFComposer;
use Flynt\Components;

add_action('Flynt/afterRegisterComponents', function () {
    ACFComposer::registerFieldGroup([
        'name' => 'pagehomeoutroComponents',
        'title' => 'Outro',
        'style' => 'seamless',
        'fields' => [
            [
                'name' => 'pagehomeoutroComponents',
                'label' => __('Outro', 'flynt'),
                'type' => 'flexible_content',
                'button_label' => __('Add Component', 'flynt'),
                'layouts' => [
                    Components\ListHorizontal\getACFLayout(),
                ]
            ]
        ],
        'position' => 'normal',
        'location' => [
            [
                [
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'page'
                ],
                [
                    'param' => 'page',
                    'operator' => '==',
                    'value' => '184'
                ]
            ]
        ]
    ]);
});
