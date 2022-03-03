<?php

add_filter('acf/load_value/name=postBannerComponents', 'postBanner_default_components', 10, 3);

function postBanner_default_components($value, $post_id, $field)
{
    if ($value !== null) {
        // $value will only be NULL on a new post
        return $value;
    }
    // add default layouts
    $value = array(
        array(
            'acf_fc_layout' => 'HeroVideo',
        ),
    );
    return $value;
}
