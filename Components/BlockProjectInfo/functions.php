<?php

namespace Flynt\Components\BlockProjectInfo;

use Flynt\FieldVariables;

function getACFLayout()
{
    return [
        'name' => 'BlockProjectInfo',
        'label' => 'Block: Project Info',
        'sub_fields' => [
            [
                'label' => __('Info', 'flynt'),
                'name' => 'infoTab',
                'type' => 'tab',
                'placement' => 'top',
                'endpoint' => 0
            ],
            [
                'label' => __('Client', 'flynt'),
                'name' => 'client',
                'type' => 'text',
                'required' => 0,
                'wrapper' => [
                    'width' => '100',
                ],
            ],
            [
                'label' => __('Description', 'flynt'),
                'name' => 'descriptionTab',
                'type' => 'tab',
                'placement' => 'top',
                'endpoint' => 0,
            ],
            [
                'label' => __('Content', 'flynt'),
                'name' => 'contentHtml',
                'type' => 'wysiwyg',
                'delay' => 1,
                'media_upload' => 0,
                'required' => 1,
            ]
        ]
    ];
}
