<?php

use ACFComposer\ACFComposer;
use Flynt\Components;

add_action('Flynt/afterRegisterComponents', function () {
    ACFComposer::registerFieldGroup([
        'name' => 'pageComponents',
        'title' => 'Page Components',
        'style' => 'seamless',
        'fields' => [
            [
                'name' => 'pageComponents',
                'label' => __('Page Components', 'flynt'),
                'type' => 'flexible_content',
                'button_label' => __('Add Component', 'flynt'),
                'layouts' => [
                    Components\BlockCollapse\getACFLayout(),
                    Components\BlockImage\getACFLayout(),
                    Components\BlockImageText\getACFLayout(),
                    Components\BlockVideoOembed\getACFLayout(),
                    Components\BlockWysiwyg\getACFLayout(),
                    Components\GridImageText\getACFLayout(),
                    Components\GridPostsLatest\getACFLayout(),
                    Components\ListComponents\getACFLayout(),
                    Components\SliderImages\getACFLayout(),
                    Components\AccordionDefault\getACFLayout(),
                    Components\BlockCountUp\getACFLayout(),
                    Components\BlockImageTextParallax\getACFLayout(),
                    Components\BlockTextImageCrop\getACFLayout(),
                    Components\BlockWysiwygSidebar\getACFLayout(),
                    Components\BlockWysiwygTwoCol\getACFLayout(),
                    Components\FormContactForm7\getACFLayout(),
                    Components\FormNewsletter\getACFLayout(),
                    Components\HeroCta\getACFLayout(),
                    Components\HeroImageCta\getACFLayout(),
                    Components\HeroImageText\getACFLayout(),
                    Components\HeroSlider\getACFLayout(),
                    Components\HeroTextImage\getACFLayout(),
                    Components\ListIcons\getACFLayout(),
                    Components\ListLogos\getACFLayout(),
                    Components\ListSocial\getACFLayout(),
                    Components\NavigationFooterColumns\getACFLayout(),
                    Components\SliderImageGallery\getACFLayout(),
                    Components\SliderImagesCentered\getACFLayout(),
                ]
            ]
        ],
        'location' => [
            [
                [
                    'param' => 'post_type',
                    'operator' => '!=',
                    'value' => 'post'
                ]
            ]
        ]
    ]);
});
