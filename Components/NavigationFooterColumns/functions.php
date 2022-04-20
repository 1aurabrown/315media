<?php

namespace Flynt\Components\NavigationFooterColumns;

use Flynt\Utils\Asset;
use Flynt\Utils\Options;
use Flynt\ComponentManager;
use Flynt\Shortcodes;
use Timber;

add_action('init', function () {
    register_nav_menus([
        'navigation_footer_columns' => __('Footer Navigation', 'flynt'),
    ]);
});

add_filter('Flynt/addComponentData?name=NavigationFooterColumns', function ($data) {
    $data['menu'] = new Timber\Menu('navigation_footer_columns');

    $componentManager = ComponentManager::getInstance();
    $componentPathFull = $componentManager->getComponentDirPath('NavigationFooterColumns');
    $componentPath = str_replace(trailingslashit(get_template_directory()), '', $componentPathFull);

    $data['logo'] = [
        'src' => get_theme_mod('custom_header_logo') ? get_theme_mod('custom_header_logo') : Asset::requireUrl("{$componentPath}Assets/logo.svg"),
        'alt' => get_bloginfo('name')
    ];

    if (!empty($data['social'])) {
        $data['social'] = array_map(function ($item) use ($componentPath) {
            $item['icon'] = Asset::getContents("{$componentPath}Assets/{$item['platform']['value']}.svg");
            return $item;
        }, $data['social']);
    }
    return $data;
});

function getACFLayout()
{
    return [
        'name' => 'navigationFooterColumns',
        'label' => 'Footer',
        'sub_fields' => [
            [
                'label' => '',
                'name' => 'message',
                'type' => 'message',
                'message' => "Add this component at the end of the page to expand footer.<br>Create columns from <a href=\"/wp/wp-admin/nav-menus.php\" target='_blank'>Menus</a> section and assign menu to \"Navigation Footer Columns\" location. Social settings are found in <a href=\"/wp/wp-admin/admin.php?page=TranslatableOptions-Default\" target='_blank'>Translatable Options</a>.<br> Alternatively, render the component in <b>document.twig</b> to have it always in fixed position throughout the website.",
                'new_lines' => 'wpautop',
            ]
        ]
    ];
}

Options::addTranslatable('NavigationFooterColumns', [
    [
        'label' => __('Content Examples', 'flynt'),
        'name' => 'groupContentExamples',
        'instructions' => __('Want some content inspiration? Here they are!', 'flynt'),
        'type' => 'group',
        'sub_fields' => [
            [
                'label' => sprintf(__('© %s Website Name', 'flynt'), date_i18n('Y')),
                'name' => 'messageShortcodeCopyrightYearWebsiteName',
                'type' => 'message',
                'message' => '<code>©' . htmlspecialchars('&nbsp;') . '[year] [sitetitle]</code>',
                'new_lines' => 'wpautop',
                'esc_html' => 0,
                'wrapper' => [
                    'width' => 50
                ],
            ],
            [
                'label' => sprintf(__('© %s Website Name — Subtitle', 'flynt'), date_i18n('Y')),
                'name' => 'messageShortcodeCopyrightYearWebsiteNameTagLine',
                'type' => 'message',
                'message' => '<code>©' . htmlspecialchars('&nbsp;') . '[year] [sitetitle] ' . htmlspecialchars('&mdash;') . ' [tagline]</code>',
                'new_lines' => 'wpautop',
                'esc_html' => 0,
                'wrapper' => [
                    'width' => 50
                ]
            ]
        ]
    ],
    [
        'label' => __('Copyright', 'flynt'),
        'name' => 'copyright',
        'type' => 'wysiwyg',
        'toolbar' => 'basic',
        'tabs' => 'visual',
        'media_upload' => 0,
        'default_value' => '©&nbsp;[year] [sitetitle]'
    ],
    [
        'label' => __('Social Platform', 'flynt'),
        'name' => 'social',
        'type' => 'repeater',
        'layout' => 'table',
        'button_label' => __('Add Social Link', 'flynt'),
        'sub_fields' => [
            [
                'label' => __('Platform', 'flynt'),
                'name' => 'platform',
                'type' => 'select',
                'allow_null' => 0,
                'multiple' => 0,
                'ui' => 1,
                'ajax' => 0,
                'return_format' => 'array',
                'choices' => [
                    'email' => 'Email',
                    'phone' => 'Phone',
                    'address' => 'Address',
                    'vimeo' => 'Vimeo',
                    'facebook' => 'Facebook',
                    'instagram' => 'Instagram',
                    'twitter' => 'Twitter',
                    'youtube' => 'Youtube'
                ]
            ],
            [
                'label' => __('Link URL', 'flynt'),
                'name' => 'url',
                'type' => 'text',
                'required' => 0
            ],
            [
                'label' => __('Link Text', 'flynt'),
                'name' => 'text',
                'type' => 'text',
                'required' => 1
            ],
            [
                'label' => __('Open In New Tab', 'flynt'),
                'name' => 'newTab',
                'type' => 'true_false',
                'required' => 1,
                'default' => 0
            ],
        ]
    ]
]);
