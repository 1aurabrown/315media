<?php

namespace Flynt\Components\HeroVideo;

use Flynt\FieldVariables;
use Flynt\Utils\Oembed;

add_filter('Flynt/addComponentData?name=HeroVideo', function ($data) {
    $data['video'] = Oembed::setSrcAsDataAttribute(
        $data['oembed'],
        [
        ]
    );

    return $data;
});


add_filter( 'oembed_fetch_url', function( $provider, $url, $args) {
    // unset args that WP is already taking care
    $newargs = array_merge($args,
    [
        'responsive' => 1,
        'controls' => 1,
        'byline'=> 0,
        'portrait' => 0,
        'autoplay' => 0,
        'title' => 0,
        'discover' => 0,
        'color' => '0060ff'
    ]);


    // build the query url
    $parameters = urlencode( http_build_query(  $newargs ) );

    return $provider . '&'. $parameters;
}, 10, 3);

function getACFLayout()
{
    return [
        'name' => 'HeroVideo',
        'label' => 'Hero: Video',
        'sub_fields' => [
            [
                'label' => __('Poster Image', 'flynt'),
                'name' => 'posterImage',
                'type' => 'image',
                'preview_size' => 'medium',
                'mime_types' => 'jpg,jpeg,png',
                'instructions' => __('Recommended Size: Min-Width 1920px', 'flynt'),
                'required' => 1,
                'wrapper' => [
                    'width' => 50
                ],
            ],
            [
                'label' => __('Video Embed Code', 'flynt'),
                'name' => 'videoEmbedLink',
                'type' => 'textarea',
                'instructions' => 'Copy paste the "responsive" embed code from Vimeo. Should begin with somethign like "<div style="padding:XX.XX% ..." This is necessary to display your video at the correct aspect ratio.',
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
