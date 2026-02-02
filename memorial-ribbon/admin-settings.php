<?php
// ایجاد منو در پیشخوان وردپرس
add_action('admin_menu', 'mr_add_admin_menu');
function mr_add_admin_menu() {
    add_options_page(
        'تنظیمات نوار یادبود',      // عنوان صفحه
        'نوار یادبود',              // عنوان منو
        'manage_options',           // دسترسی مورد نیاز
        'memorial-ribbon-settings', // اسلاگ صفحه
        'mr_settings_page_html'     // تابع نمایش صفحه
    );
}

// ثبت تنظیمات و فیلدها
add_action('admin_init', 'mr_settings_init');
function mr_settings_init() {
    register_setting('mr_settings_group', 'mr_ribbon_position');
    
    add_settings_section(
        'mr_section_main',
        'تنظیمات نمایش نوار',
        null,
        'memorial-ribbon-settings'
    );
    
    add_settings_field(
        'mr_field_position',
        'موقعیت نمایش',
        'mr_position_field_html',
        'memorial-ribbon-settings',
        'mr_section_main'
    );
}

// HTML فیلد انتخاب موقعیت
function mr_position_field_html() {
    $current = get_option('mr_ribbon_position', 'right');
    ?>
    <label style="margin-left: 15px;">
        <input type="radio" name="mr_ribbon_position" value="right" 
               <?php checked($current, 'right'); ?>>
        سمت راست
    </label>
    <label>
        <input type="radio" name="mr_ribbon_position" value="left" 
               <?php checked($current, 'left'); ?>>
        سمت چپ
    </label>
    <p class="description">موقعیت نمایش نوار عمودی را انتخاب کنید.</p>
    <?php
}

// HTML صفحه تنظیمات
function mr_settings_page_html() {
    if (!current_user_can('manage_options')) return;
    ?>
    <div class="wrap">
        <h1>تنظیمات نوار یادبود دی ۱۴۰۴</h1>
        <form action="options.php" method="post">
            <?php
            settings_fields('mr_settings_group');
            do_settings_sections('memorial-ribbon-settings');
            submit_button('ذخیره تغییرات');
            ?>
        </form>
        <hr>
        <h3>راهنمای استفاده:</h3>
        <p>پس از ذخیره تنظیمات، نوار به صورت خودکار در سایت نمایش داده می‌شود.</p>
        <p>برای مشاهده پروژه در گیت‌هاب <a href="https://github.com/m4tinbeigi-official/memorial-ribbon" target="_blank">اینجا کلیک کنید</a>.</p>
    </div>
    <?php
}