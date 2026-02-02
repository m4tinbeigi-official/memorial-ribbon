// memorial-ribbon/loader.js
(function() {
    // ایجاد المان روبان
    const ribbon = document.createElement('a');
    ribbon.href = 'https://m4tinbeigi-official.github.io/memorial-ribbon/';
    ribbon.target = '_blank';
    ribbon.rel = 'noopener noreferrer';
    ribbon.title = 'به یاد درگذشتگان دی ۱۴۰۴ - کلیک برای اطلاعات بیشتر';
    ribbon.className = 'memorial-ribbon';
    ribbon.setAttribute('aria-label', 'نوار یادبود دی ۱۴۰۴');
    ribbon.style.cssText = `
        position: fixed;
        top: 0;
        right: 0;
        z-index: 999999;
        background: #000000;
        color: #ffffff;
        text-decoration: none;
        font-family: 'Vazir', Tahoma, sans-serif;
        font-weight: 500;
        text-align: center;
        padding: 12px 0 20px 0;
        width: 200px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.25);
        transition: all 0.3s ease;
        clip-path: polygon(0 0, 100% 0, 100% 100%, 0 85%);
        -webkit-clip-path: polygon(0 0, 100% 0, 100% 100%, 0 85%);
        cursor: pointer;
        border: none;
        outline: none;
        display: block;
        line-height: 1.4;
    `;
    
    // متن روبان
    ribbon.innerHTML = `
        <span style="display: block; font-size: 15px; padding: 2px 0;">به یاد درگذشتگان</span>
        <span style="display: block; font-size: 16px; font-weight: 700; padding: 2px 0; margin-top: 2px;">دی ۱۴۰۴</span>
    `;
    
    // افکت hover
    ribbon.onmouseenter = function() {
        this.style.background = '#222222';
        this.style.paddingTop = '14px';
    };
    ribbon.onmouseleave = function() {
        this.style.background = '#000000';
        this.style.paddingTop = '12px';
    };
    
    // بارگذاری فونت وزیر
    const fontLink = document.createElement('link');
    fontLink.rel = 'stylesheet';
    fontLink.href = 'https://cdn.fontcdn.ir/Font/Persian/Vazir/Vazir.css';
    
    // افزودن به صفحه
    document.head.appendChild(fontLink);
    document.body.appendChild(ribbon);
    
    // ریسپانسیو برای موبایل
    const makeResponsive = () => {
        if (window.innerWidth <= 768) {
            ribbon.style.width = '160px';
            ribbon.style.fontSize = '13px';
            ribbon.innerHTML = `
                <span style="display: block; font-size: 13px; padding: 2px 0;">به یاد درگذشتگان</span>
                <span style="display: block; font-size: 14px; font-weight: 700; padding: 2px 0;">دی ۱۴۰۴</span>
            `;
        } else {
            ribbon.style.width = '200px';
            ribbon.style.fontSize = '15px';
            ribbon.innerHTML = `
                <span style="display: block; font-size: 15px; padding: 2px 0;">به یاد درگذشتگان</span>
                <span style="display: block; font-size: 16px; font-weight: 700; padding: 2px 0; margin-top: 2px;">دی ۱۴۰۴</span>
            `;
        }
    };
    
    window.addEventListener('resize', makeResponsive);
    makeResponsive();
})();
