<?php

use ACFComposer\ACFComposer;
use Flynt\Components;

add_action('Flynt/afterRegisterComponents', function () {
    ACFComposer::registerFieldGroup([
        'name' => 'pagehomeComponents',
        'title' => 'Homepage Content',
        'style' => 'seamless',
        'fields' => [
            [
                'name' => 'pagehomeComponents',
                'label' => __('Homepage Modules', 'flynt'),
                'type' => 'flexible_content',
                'button_label' => __('Add Module', 'flynt'),
                'layouts' => [
                    Components\BlockImage\getACFLayout(),
                    Components\GridPostsSelector\getACFLayout(),
                    Components\BlockWysiwygQuote\getACFLayout(),
                    Components\HeroVideoHome\getACFLayout(),
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
