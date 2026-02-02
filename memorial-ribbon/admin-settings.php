<?php
add_action('admin_menu', 'mr_add_admin_menu');
function mr_add_admin_menu() {
    add_options_page(
        'تنظیمات نوار یادبود دی ۱۴۰۴',
        'نوار یادبود',
        'manage_options',
        'memorial-ribbon-settings',
        'mr_settings_page_html'
    );
}

add_action('admin_init', 'mr_settings_init');
function mr_settings_init() {
    register_setting('mr_settings_group', 'mr_ribbon_position');
    
    add_settings_section(
        'mr_section_main',
        'تنظیمات نمایش نوار تسلیت',
        'mr_section_callback',
        'memorial-ribbon-settings'
    );
    
    add_settings_field(
        'mr_field_position',
        'موقعیت نوار در سایت',
        'mr_position_field_html',
        'memorial-ribbon-settings',
        'mr_section_main'
    );
}

function mr_section_callback() {
    echo '<p>نوار یادبود دی ۱۴۰۴ به صورت سه‌گوش در گوشه سایت نمایش داده می‌شود.</p>';
}

function mr_position_field_html() {
    $current = get_option('mr_ribbon_position', 'right');
    ?>
    <div style="display: flex; gap: 20px; align-items: center;">
        <label style="display: flex; align-items: center; gap: 5px;">
            <input type="radio" name="mr_ribbon_position" value="right" 
                   <?php checked($current, 'right'); ?>>
            <span>گوشه راست بالا</span>
        </label>
        <label style="display: flex; align-items: center; gap: 5px;">
            <input type="radio" name="mr_ribbon_position" value="left" 
                   <?php checked($current, 'left'); ?>>
            <span>گوشه چپ بالا</span>
        </label>
    </div>
    <p class="description">پس از ذخیره تنظیمات، تغییرات بلافاصله در سایت اعمال می‌شود.</p>
    <?php
}

function mr_settings_page_html() {
    if (!current_user_can('manage_options')) return;
    ?>
    <div class="wrap">
        <h1 style="border-right: 4px solid #000; padding-right: 15px;">
            ⚫ تنظیمات نوار یادبود دی ۱۴۰۴
        </h1>
        
        <div style="background: #f8f8f8; padding: 20px; border-radius: 5px; margin: 20px 0;">
            <h3>پیش‌نمایش نوار:</h3>
            <div style="position: relative; height: 100px; background: #fff; border: 1px solid #ddd; overflow: hidden;">
                <div style="position: absolute; top: 0; right: 0; background: #000; color: #fff; 
                           padding: 8px 30px; clip-path: polygon(0 0, 100% 0, 100% 100%, 50% 85%, 0 100%); 
                           font-family: Tahoma; font-size: 14px;">
                    به یاد درگذشتگان<br>دی ۱۴۰۴
                </div>
            </div>
        </div>
        
        <form action="options.php" method="post">
            <?php
            settings_fields('mr_settings_group');
            do_settings_sections('memorial-ribbon-settings');
            submit_button('ذخیره تنظیمات');
            ?>
        </form>
        
        <div style="margin-top: 40px; padding: 20px; background: #fff; border: 1px solid #ddd; border-radius: 5px;">
            <h3>📚 راهنمای استفاده:</h3>
            <ol style="line-height: 2;">
                <li>پس از نصب پلاگین، نوار به صورت خودکار در سایت نمایش داده می‌شود.</li>
                <li>برای تغییر موقعیت نوار، از تنظیمات بالا استفاده کنید.</li>
                <li>با کلیک روی نوار، به صفحه پروژه در گیت‌هاب هدایت می‌شوید.</li>
                <li>برای مشاهده کدهای مستقل و مشارکت در پروژه، <a href="https://m4tinbeigi-official.github.io/memorial-ribbon/" target="_blank">اینجا کلیک کنید</a>.</li>
            </ol>
        </div>
    </div>
    <?php
}
