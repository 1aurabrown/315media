<?php

use ACFComposer\ACFComposer;
use Flynt\Components;
use Flynt\FieldVariables;
use Flynt\Utils\Oembed;

add_action('Flynt/afterRegisterComponents', function () {
    // ACFComposer::registerFieldGroup([
    //     'name' => 'projectMeta',
    //     'title' => 'Project Info',
    //     'style' => '',
    //     'menu_order' => 1,
    //     'position' => 'acf_after_title',
    //     'fields' => [
    //         [
    //             'label' => __('Client', 'flynt'),
    //             'name' => 'client',
    //             'type' => 'text',
    //         ],
    //         [
    //             'label' => __('Description', 'flynt'),
    //             'name' => 'description',
    //             'type' => 'wysiwyg',
    //             'tabs' => 'visual',
    //             'toolbar' => 'basic',
    //             'wrapper' => [
    //                 'width' => '100',
    //             ]
    //         ],
    //     ],
    //     'location' => [
    //         [
    //             [
    //                 'param' => 'post_type',
    //                 'operator' => '==',
    //                 'value' => 'post',
    //             ],
    //         ],
    //     ],
    // ]);
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
