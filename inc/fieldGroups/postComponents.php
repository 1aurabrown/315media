<?php

use ACFComposer\ACFComposer;
use Flynt\Components;
use Flynt\FieldVariables;
use Flynt\Utils\Oembed;

add_action('Flynt/afterRegisterComponents', function () {
    ACFComposer::registerFieldGroup([
        'name' => 'projectMeta',
        'title' => 'Project Info',
        'position' => 'normal',
        'fields' => [
            [
                'label' => __('Main Image', 'flynt'),
                'name' => 'image',
                'type' => 'image',
                'return_format' => 'url',
                'preview_size' => 'medium',
                'library' => 'all',
                'instructions' => 'Used as main thumbnail image and hero image.',
                'required' => 1,
                'wrapper' => [
                    'width' => '33',
                ],
            ],
            [
                'label' => __('Thumbnail Hover Image', 'flynt'),
                'name' => 'hoverImage',
                'type' => 'image',
                'return_format' => 'url',
                'preview_size' => 'medium',
                'library' => 'all',
                'wrapper' => [
                    'width' => '33',
                ],
            ],
            [
                'label' => __('Thumbnail Video', 'flynt'),
                'name' => 'coverVideo',
                'type' => 'file',
                'return_format' => 'url',
                'mime_types' => 'mp4',
                'instructions' => 'A short video clip displayed in the projects grid on the homepage. Thumbnail Video takes precedence over Hover Image.',
                'wrapper' => [
                    'width' => '33',
                ],
            ],
            [
                'label' => __('Client', 'flynt'),
                'name' => 'client',
                'type' => 'text',
                'wrapper' => [
                    'width' => '100',
                ],
            ],
            [
                'label' => __('Description', 'flynt'),
                'name' => 'description',
                'type' => 'wysiwyg',
                'tabs' => 'visual',
                'toolbar' => 'basic',
                'wrapper' => [
                    'width' => '100',
                ]
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
    ACFComposer::registerFieldGroup([
        'name' => 'postBannerComponents',
        'title' => 'Project Page Hero',
        'fields' => [
            [
                'name' => 'postBannerComponents',
                'label' => __('Hero', 'flynt'),
                'type' => 'flexible_content',
                'button_label' => __('Add Component', 'flynt'),
                'layouts' => [
                    Components\HeroVideo\getACFLayout(),
                    Components\HeroVideoHome\getACFLayout(),
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
    ACFComposer::registerFieldGroup([
        'name' => 'postComponents',
        'title' => 'Project Page Main Components',
        'fields' => [
            [
                'name' => 'postComponents',
                'label' => __('Components', 'flynt'),
                'type' => 'flexible_content',
                'button_label' => __('Add Component', 'flynt'),
                'layouts' => [
                    Components\ProjectMediaGallery\getACFLayout(),
                    Components\ListColumn\getACFLayout(),
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
