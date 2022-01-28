<?php

namespace Flynt\Components\GridImageGallery;

use Flynt\FieldVariables;
use Flynt\Utils\Options;

add_filter('Flynt/addComponentData?name=GridGallery', function ($data) {
    $data['jsonData'] = [
        'options' => Options::getTranslatable('SliderOptions')
    ];
    return $data;
});

function getACFLayout()
{
    return [
        'name' => 'GridImageGallery',
        'label' => 'Grid: Image Gallery',
        'sub_fields' => [
            [
                'label' => __('General', 'flynt'),
                'name' => 'generalTab',
                'type' => 'tab',
                'placement' => 'top',
                'endpoint' => 0
            ],
            [
                'label' => __('Title', 'flynt'),
                'name' => 'text',
                'type' => 'wysiwyg',
                'media_upload' => 0,
            ],
            [
                'label' => __('Gallery', 'flynt'),
                'name' => 'galleryTab',
                'type' => 'tab',
                'placement' => 'top',
                'endpoint' => 0
            ],
            [
                'label' => __('Images', 'flynt'),
                'name' => 'images',
                'type' => 'gallery',
                'min' => 2,
                'preview_size' => 'medium',
                'mime_types' => 'jpg,jpeg,png',
                'instructions' => __('Image-Format: JPG, PNG.', 'flynt'),
                'required' => 1
            ],
        ]
    ];
}
