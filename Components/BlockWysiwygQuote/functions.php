<?php

namespace Flynt\Components\BlockWysiwygQuote;

use Flynt\FieldVariables;

function getACFLayout()
{
    return [
        'name' => 'BlockWysiwygQuote',
        'label' => 'Homepage Intro Text',
        'sub_fields' => [
            [
                'label' => __('Content', 'flynt'),
                'name' => 'contentHtml',
                'type' => 'textarea',
            ]
        ]
    ];
}
