<?php

namespace Flynt\Components\GridPostsSelector;

use Flynt\FieldVariables;
use Flynt\Utils\Options;
use Timber\Timber;

const POST_TYPE = 'post';

add_filter('Flynt/addComponentData?name=GridPostsSelector', function ($data) {

    $postType = POST_TYPE;

    $data['items'] = Timber::get_posts($data[$postType]);

    return $data;
});

function getACFLayout()
{
    return [
        'name' => 'GridPostsSelector',
        'label' => 'Project',
        'sub_fields' => [
            [
                'label' => __('Content Selection', 'flynt'),
                'name' => 'contentSelectionTab',
                'type' => 'tab',
                'placement' => 'top',
                'endpoint' => 0
            ],
            [
                'label' => __('Project', 'flynt'),
                'name' => 'post',
                'type' => 'post_object',
                'wrapper' => [
                    'width' => '50',
                ],
            ],
            [
                'label' => __('Project Width', 'flynt'),
                'name' => 'projectWidth',
                'type' => 'select',
                'choices' => [
                    'one-third' => '1/3',
                    'two-third' => '2/3',
                    'three-third' => '3/3',
                ],
                'default_value' => '1/3',
                'wrapper' => [
                    'width' => '50',
                ],
            ],
            // [
            //     'label' => __('Clients', 'flynt'),
            //     'name' => 'clientsTab',
            //     'type' => 'tab',
            //     'placement' => 'top',
            //     'endpoint' => 0
            // ],
            // [
            //     'label' => __('Title', 'flynt'),
            //     'name' => 'preContentHtml',
            //     'type' => 'text',
            // ],
            // [
            //     'label' => __('Featured Clients', 'flynt'),
            //     'name' => 'listHorizontal',
            //     'type' => 'repeater',
            //     'layout' => 'row',
            //     'min' => 1,
            //     'button_label' => __('Add Client', 'flynt'),
            //     'sub_fields' => [
            //         [
            //             'label' => __('Title', 'flynt'),
            //             'name' => 'title',
            //             'type' => 'link',
            //             'return_format' => 'array'
            //         ],
            //     ],
            // ]
        ]
    ];
}

Options::addTranslatable('GridPostsSelector', [
    [
        'label' => __('Labels', 'flynt'),
        'name' => 'labelsTab',
        'type' => 'tab',
        'placement' => 'top',
        'endpoint' => 0
    ],
    [
        'label' => '',
        'name' => 'labels',
        'type' => 'group',
        'sub_fields' => [
            [
                'label' => __('All Posts', 'flynt'),
                'name' => 'allPosts',
                'type' => 'text',
                'default_value' => 'See More Posts',
                'required' => 1,
                'wrapper' => [
                    'width' => 50
                ],
            ],
        ],
    ]
]);
