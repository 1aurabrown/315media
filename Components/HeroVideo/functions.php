<?php

namespace Flynt\Components\HeroVideo;

use Flynt\FieldVariables;
use Flynt\Utils\Oembed;

add_filter('Flynt/addComponentData?name=HeroVideo', function ($data) {
    $data['video'] = Oembed::setSrcAsDataAttribute(
        $data['oembed'],
        [
            'autoplay' => 'true',
            'background' => 'true',
            'mute' => 'true',
            'loop' => 'true',
            'playsinline' => 'true',
            'controls' => 'false',
            'showinfo' => 'false',
            'autohide' => 'true',
            'allowfullscreen' => 'false',
            'frameborder' => 'false',
            'modestbranding' => 'true',
        ]
    );

    return $data;
});

function getACFLayout()
{
    return [
        'name' => 'HeroVideo',
        'label' => 'Hero: Video',
        'sub_fields' => [
            [
                'label' => __('Video', 'flynt'),
                'name' => 'videoTab',
                'type' => 'tab',
                'placement' => 'top',
                'endpoint' => 0
            ],
            [
                'label' => __('Poster Image', 'flynt'),
                'name' => 'posterImage',
                'type' => 'image',
                'preview_size' => 'medium',
                'mime_types' => 'jpg,jpeg,png',
                'instructions' => __('Recommended Size: Min-Width 1920px; Min-Height: 1080px; Image-Format: JPG, PNG. Aspect Ratio 2/1.', 'flynt'),
                'required' => 1,
                'wrapper' => [
                    'width' => 50
                ],
            ],
            [
                'label' => __('Video', 'flynt'),
                'name' => 'oembed',
                'type' => 'oembed',
                'required' => 1,
                'wrapper' => [
                    'width' => 50
                ],
            ],
            [
                'label' => __('Content', 'flynt'),
                'name' => 'contentTab',
                'type' => 'tab',
                'placement' => 'top',
                'endpoint' => 0
            ],
            [
                'label' => __('Content Alignment', 'flynt'),
                'name' => 'contentAlignment',
                'type' => 'button_group',
                'choices' => [
                    'alignTop' =>
                        '<i class=\'dashicons dashicons-arrow-up-alt\' title=\'Align content top\'></i>',
                    'alignCenter' =>
                        '<i class=\'dashicons dashicons-minus\' title=\'Align content Center\'></i>',
                    'alignBottom' =>
                        '<i class=\'dashicons dashicons-arrow-down-alt\' title=\'Align content bottom\'></i>'
                ],
                'required' => 0,
                'default_value' => 'textLeft'
            ],
            [
                'label' => __('Content', 'flynt'),
                'name' => 'contentHtml',
                'type' => 'wysiwyg',
                'tabs' => 'visual',
                'media_upload' => 0,
                'delay' => 1,
            ]
        ]
    ];
}
