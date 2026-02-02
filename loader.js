// memorial-ribbon/loader.js
(function() {
    // بارگذاری فونت وزیر
    const fontLink = document.createElement('link');
    fontLink.rel = 'stylesheet';
    fontLink.href = 'https://cdn.fontcdn.ir/Font/Persian/Vazir/Vazir.css';
    document.head.appendChild(fontLink);
    
    // ایجاد المان روبان
    const ribbon = document.createElement('a');
    ribbon.href = 'https://m4tinbeigi-official.github.io/memorial-ribbon/';
    ribbon.target = '_blank';
    ribbon.rel = 'noopener noreferrer';
    ribbon.title = 'به یاد درگذشتگان دی ۱۴۰۴ - کلیک برای اطلاعات بیشتر';
    ribbon.className = 'memorial-ribbon';
    ribbon.setAttribute('aria-label', 'نوار یادبود دی ۱۴۰۴');
    
    // استایل‌های اصلی روبان مورب
    ribbon.style.cssText = `
        position: fixed;
        top: 40px;
        left: -40px;
        z-index: 999999;
        width: 150px;
        height: 40px;
        background: linear-gradient(to bottom right, #000000 0%, #333333 50%, #000000 100%);
        color: #ffffff;
        text-decoration: none;
        font-family: 'Vazir', Tahoma, sans-serif;
        font-weight: 500;
        text-align: center;
        line-height: 40px;
        transform: rotate(-45deg);
        box-shadow: 3px 3px 10px rgba(0,0,0,0.5);
        transition: all 0.3s ease;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
        border: none;
        outline: none;
    `;
    
    // متن داخل روبان
    const ribbonText = document.createElement('span');
    ribbonText.style.cssText = `
        display: block;
        transform: rotate(45deg);
        font-size: 13px;
        letter-spacing: 0.5px;
        text-shadow: 0 1px 2px rgba(0,0,0,0.8);
        padding: 0 5px;
        line-height: 1.3;
    `;
    ribbonText.innerHTML = 'به یاد درگذشتگان<br><strong style="font-size:12px;">دی ۱۴۰۴</strong>';
    
    ribbon.appendChild(ribbonText);
    
    // افکت hover - شبیه پارچه نرم
    ribbon.onmouseenter = function() {
        this.style.background = 'linear-gradient(to bottom right, #222222 0%, #444444 50%, #222222 100%)';
        this.style.boxShadow = '4px 4px 12px rgba(0,0,0,0.6)';
        this.style.transform = 'rotate(-45deg) scale(1.05)';
    };
    
    ribbon.onmouseleave = function() {
        this.style.background = 'linear-gradient(to bottom right, #000000 0%, #333333 50%, #000000 100%)';
        this.style.boxShadow = '3px 3px 10px rgba(0,0,0,0.5)';
        this.style.transform = 'rotate(-45deg) scale(1)';
    };
    
    // افزودن روبان به صفحه
    document.body.appendChild(ribbon);
    
    // ریسپانسیو برای موبایل
    const makeResponsive = () => {
        if (window.innerWidth <= 768) {
            ribbon.style.width = '120px';
            ribbon.style.height = '35px';
            ribbon.style.top = '30px';
            ribbon.style.left = '-30px';
            ribbon.style.lineHeight = '35px';
            ribbonText.style.fontSize = '11px';
            ribbonText.innerHTML = 'به یاد درگذشتگان<br><strong style="font-size:10px;">دی ۱۴۰۴</strong>';
        } else {
            ribbon.style.width = '150px';
            ribbon.style.height = '40px';
            ribbon.style.top = '40px';
            ribbon.style.left = '-40px';
            ribbon.style.lineHeight = '40px';
            ribbonText.style.fontSize = '13px';
            ribbonText.innerHTML = 'به یاد درگذشتگان<br><strong style="font-size:12px;">دی ۱۴۰۴</strong>';
        }
    };
    
    window.addEventListener('resize', makeResponsive);
    makeResponsive();
    
    // برای سایت‌های RTL (راست‌به‌چپ) تنظیم موقعیت راست
    if (document.documentElement.dir === 'rtl' || document.documentElement.getAttribute('dir') === 'rtl') {
        ribbon.style.left = 'auto';
        ribbon.style.right = '-40px';
        ribbon.style.transform = 'rotate(45deg)';
        ribbonText.style.transform = 'rotate(-45deg)';
        
        ribbon.onmouseenter = function() {
            this.style.transform = 'rotate(45deg) scale(1.05)';
        };
        ribbon.onmouseleave = function() {
            this.style.transform = 'rotate(45deg) scale(1)';
        };
        
        // به‌روزرسانی موقعیت برای موبایل در حالت RTL
        const originalMakeResponsive = makeResponsive;
        makeResponsive = () => {
            originalMakeResponsive();
            if (window.innerWidth <= 768) {
                ribbon.style.right = '-30px';
            } else {
                ribbon.style.right = '-40px';
            }
        };
    }
    
    // اگر موقعیت روبان با محتوای سایت تداخل داشت
    setTimeout(() => {
        const ribbonRect = ribbon.getBoundingClientRect();
        const allElements = document.querySelectorAll('*');
        let hasOverlap = false;
        
        allElements.forEach(el => {
            if (el === ribbon) return;
            const elRect = el.getBoundingClientRect();
            if (
                elRect.top < ribbonRect.bottom &&
                elRect.bottom > ribbonRect.top &&
                elRect.left < ribbonRect.right &&
                elRect.right > ribbonRect.left
            ) {
                hasOverlap = true;
            }
        });
        
        if (hasOverlap) {
            // تغییر موقعیت به پایین‌تر
            ribbon.style.top = '60px';
            if (window.innerWidth <= 768) {
                ribbon.style.top = '40px';
            }
        }
    }, 1000);
})();
