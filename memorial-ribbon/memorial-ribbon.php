<?php
/**
 * Plugin Name: نوار یادبود دی ۱۴۰۴
 * Plugin URI: https://m4tinbeigi-official.github.io/memorial-ribbon/
 * Description: نمایش نوار تسلیت سه‌گوش "به یاد درگذشتگان دی ۱۴۰۴" در گوشه سایت
 * Version: 2.0.0
 * Author: یادبود دی ۱۴۰۴
 * License: GPL v2 or later
 * GitHub Plugin URI: https://github.com/m4tinbeigi-official/memorial-ribbon
 */

defined('ABSPATH') || exit;

require_once plugin_dir_path(__FILE__) . 'admin-settings.php';

add_action('wp_enqueue_scripts', 'mr_enqueue_styles');
function mr_enqueue_styles() {
    wp_enqueue_style(
        'memorial-ribbon-style',
        plugin_dir_url(__FILE__) . 'frontend-style.css',
        array(),
        '2.0.0'
    );
}

add_action('wp_body_open', 'mr_display_ribbon');
function mr_display_ribbon() {
    $position = get_option('mr_ribbon_position', 'right');
    $position_class = ($position === 'left') ? 'left-side' : 'right-side';
    
    echo '
    <a href="https://m4tinbeigi-official.github.io/memorial-ribbon/" 
       class="memorial-ribbon ' . esc_attr($position_class) . '" 
       target="_blank" 
       rel="noopener noreferrer"
       title="یادبود درگذشتگان دی ۱۴۰۴ - کلیک برای اطلاعات بیشتر"
       aria-label="نوار یادبود دی ۱۴۰۴">
        <span class="ribbon-text">به یاد درگذشتگان</span>
        <span class="ribbon-year">دی ۱۴۰۴</span>
    </a>';
}

add_filter('plugin_action_links_' . plugin_basename(__FILE__), 'mr_add_settings_link');
function mr_add_settings_link($links) {
    $settings_link = '<a href="' . admin_url('options-general.php?page=memorial-ribbon-settings') . '">تنظیمات</a>';
    array_unshift($links, $settings_link);
    $docs_link = '<a href="https://m4tinbeigi-official.github.io/memorial-ribbon/" target="_blank">راهنما</a>';
    array_unshift($links, $docs_link);
    return $links;
}
