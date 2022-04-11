<?php

use ACFComposer\ACFComposer;
use Flynt\Components;
use Flynt\FieldVariables;
use Flynt\Utils\Oembed;

add_action('Flynt/afterRegisterComponents', function () {
    ACFComposer::registerFieldGroup([
        'name' => 'postBannerComponents',
        'title' => 'Banner',
        'style' => 'seamless',
        'fields' => [
            [
                'name' => 'postBannerComponents',
                'label' => __('Banner', 'flynt'),
                'type' => 'flexible_content',
                'button_label' => __('Add Component', 'flynt'),
                'layouts' => [
                    Components\HeroVideo\getACFLayout(),
                    Components\BlockImage\getACFLayout(),
                ],
            ],
        ],
        'location' => [
            [
                [
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'post',
                ],
            ],
        ],
    ]);
});
