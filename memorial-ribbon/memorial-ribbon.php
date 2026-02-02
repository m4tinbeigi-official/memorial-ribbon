<?php
/**
 * Plugin Name: نوار یادبود دی ۱۴۰۴
 * Plugin URI: https://m4tinbeigi-official.github.io/memorial-ribbon/
 * Description: نمایش نوار یادبود سه‌گوش "به یاد درگذشتگان دی ۱۴۰۴" - فقط فعال کنید
 * Version: 1.0
 * Author: پروژه یادبود دی ۱۴۰۴
 */

// کد کوتاه که فایل loader.js را بارگذاری می‌کند
add_action('wp_footer', function() {
    echo '<script src="https://m4tinbeigi-official.github.io/memorial-ribbon/loader.js"></script>';
});
