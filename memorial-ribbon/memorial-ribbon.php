<?php
/**
 * Plugin Name: نوار یادبود درگذشتگان دی ۱۴۰۴
 * Plugin URI: https://m4tinbeigi-official.github.io/memorial-ribbon/
 * Description: نمایش نوار یادبود مورب "به یاد درگذشتگان دی ۱۴۰۴" - فقط فعال کنید
 * Version: 2.0
 * Author: پروژه یادبود دی ۱۴۰۴
 * License: GPL v2 or later
 */

defined('ABSPATH') || exit;

// اضافه کردن لینک تنظیمات به صفحه پلاگین‌ها
add_filter('plugin_action_links_' . plugin_basename(__FILE__), function($links) {
    $settings_link = '<a href="https://m4tinbeigi-official.github.io/memorial-ribbon/" target="_blank">راهنما</a>';
    array_unshift($links, $settings_link);
    return $links;
});

// بارگذاری فایل loader.js در فوتر سایت
add_action('wp_footer', function() {
    if (!is_admin()) {
        echo '<script src="https://m4tinbeigi-official.github.io/memorial-ribbon/loader.js"></script>';
    }
});

// اضافه کردن استایل برای جلوگیری از تداخل در پیشخوان وردپرس
add_action('admin_head', function() {
    echo '<style>.memorial-ribbon { display: none !important; }</style>';
});
