<?php

use ACFComposer\ACFComposer;
use Flynt\Components;

add_action('Flynt/afterRegisterComponents', function () {
    ACFComposer::registerFieldGroup([
        'name' => 'pagehomeComponents',
        'title' => 'Featured Projects',
        'style' => 'seamless',
        'fields' => [
            [
                'name' => 'pagehomeComponents',
                'label' => __('Featured Projects', 'flynt'),
                'type' => 'flexible_content',
                'button_label' => __('Add Project', 'flynt'),
                'layouts' => [
                    Components\GridPostsSelector\getACFLayout(),
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
