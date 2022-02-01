<?php

namespace Flynt\Components\BlockWysiwyg;

use Flynt\FieldVariables;

function getACFLayout()
{
    return [
        'name' => 'blockWysiwyg',
        'label' => 'Block: Wysiwyg',
        'sub_fields' => [
            [
                'label' => __('General', 'flynt'),
                'name' => 'generalTab',
                'type' => 'tab',
                'placement' => 'top',
                'endpoint' => 0,
            ],
            [
                'label' => __('Headline', 'flynt'),
                'name' => 'preContent',
                'type' => 'text',
            ],
            [
                'label' => __('Content', 'flynt'),
                'name' => 'contentHtml',
                'type' => 'wysiwyg',
                'tabs' => 'visual',
                'toolbar' => 'full',
                'delay' => 0,
                'media_upload' => 0,
                'required' => 0,
            ]
        ]
    ];
}
