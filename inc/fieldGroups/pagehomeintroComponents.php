<?php

use ACFComposer\ACFComposer;
use Flynt\Components;

add_action('Flynt/afterRegisterComponents', function () {
    ACFComposer::registerFieldGroup([
        'name' => 'pagehomeintroComponents',
        'title' => 'Intro',
        'style' => 'seamless',
        'fields' => [
            [
                'name' => 'pagehomeintroComponents',
                'label' => __('Intro', 'flynt'),
                'type' => 'flexible_content',
                'button_label' => __('Add Component', 'flynt'),
                'layouts' => [
                    Components\BlockImage\getACFLayout(),
                    Components\BlockWysiwyg\getACFLayout(),
                    Components\BlockWysiwygQuote\getACFLayout(),
                    Components\HeroVideoHome\getACFLayout(),
                    Components\ListColumn\getACFLayout(),
                    Components\ListHorizontal\getACFLayout(),
                ]
            ]
        ],
        'position' => 'acf_after_title',
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
