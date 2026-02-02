<?php
/**
 * Plugin Name: نوار یادبود دی ۱۴۰۴
 * Plugin URI: https://m4tinbeigi-official.github.io/memorial-ribbon/
 * Description: نمایش نوار مشکی عمودی "به یاد درگذشتگان دی ۱۴۰۴" در کنار سایت
 * Version: 1.0.0
 * Author: نام شما
 * License: GPL v2 or later
 */

// امنیت: جلوگیری از دسترسی مستقیم
defined('ABSPATH') || exit;

// بارگذاری فایل تنظیمات پیشخوان
require_once plugin_dir_path(__FILE__) . 'admin-settings.php';

// بارگذاری استایل‌های فرانت‌اند
add_action('wp_enqueue_scripts', 'mr_enqueue_styles');
function mr_enqueue_styles() {
    wp_enqueue_style(
        'memorial-ribbon-style',
        plugin_dir_url(__FILE__) . 'frontend-style.css',
        array(),
        '1.0.0'
    );
}

// نمایش نوار در سایت
add_action('wp_body_open', 'mr_display_ribbon');
function mr_display_ribbon() {
    $position = get_option('mr_ribbon_position', 'right');
    $position_class = ($position === 'left') ? 'left-side' : 'right-side';
    
    echo '
    <a href="https://m4tinbeigi-official.github.io/memorial-ribbon/" 
       class="memorial-ribbon ' . esc_attr($position_class) . '" 
       target="_blank" 
       rel="noopener noreferrer"
       aria-label="یادبود درگذشتگان دی ۱۴۰۴ - لینک به پروژه گیت‌هاب">
        <span class="ribbon-text">به یاد درگذشتگان دی ۱۴۰۴</span>
    </a>';
}