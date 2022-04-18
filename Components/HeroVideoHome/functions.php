<?php

namespace Flynt\Components\HeroVideoHome;

use Flynt\FieldVariables;
use Flynt\Utils\Oembed;

add_filter('Flynt/addComponentData?name=HeroVideoHome', function ($data) {
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

            'playsinline' => 1,
            'controls'    => 0,
            'hd'  => 1,
            'autoplay' => 1,
            'background' => 1,
            'loop' => 1,
            'byline' => 0,
            'title' => 0,
            'muted' => 1
        ]
    );

    return $data;
});

function getACFLayout()
{
    return [
        'name' => 'HeroVideoHome',
        'label' => 'Homepage Hero: Video',
        'sub_fields' => [
            [
                'label' => __('Poster Image', 'flynt'),
                'name' => 'posterImage',
                'type' => 'image',
                'preview_size' => 'medium',
                'mime_types' => 'jpg,jpeg,png',
                'instructions' => __('Recommended Size: Min-Width 1920px; Image-Format: JPG, PNG.', 'flynt'),
                'wrapper' => [
                    'width' => 50
                ],
            ],
            [
                'label' => __('Video', 'flynt'),
                'name' => 'oembed',
                'type' => 'oembed',
                'wrapper' => [
                    'width' => 50
                ],
            ],
        ]
    ];
}
