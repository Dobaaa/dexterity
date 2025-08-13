# نظام الترجمة - موقع Dexterity

## نظرة عامة
تم إنشاء نظام ترجمة ذكي وفعال لموقع Dexterity يدعم اللغتين الإنجليزية والعربية بشكل ديناميكي.

## الميزات
- **ترجمة ديناميكية**: تغيير اللغة بدون إعادة تحميل الصفحة
- **دعم RTL**: دعم كامل للغة العربية مع اتجاه من اليمين إلى اليسار
- **حفظ التفضيلات**: حفظ اللغة المفضلة في المتصفح
- **أداء عالي**: لا حاجة لإنشاء نسخ منفصلة من الملفات
- **سهولة الاستخدام**: نظام بسيط وسهل الاستخدام

## الملفات المطلوبة

### 1. ملف الترجمة الرئيسي
```
frontend/assets/js/translations.js
```
يحتوي على جميع النصوص باللغتين الإنجليزية والعربية.

### 2. ملف CSS للدعم العربي
```
frontend/assets/css/rtl.css
```
يحتوي على أنماط CSS للدعم العربي والـ RTL.

### 3. ملف PHP المساعد
```
frontend/includes/translation_helper.php
```
يوفر دوال PHP للترجمة من جانب الخادم.

## كيفية الاستخدام

### 1. إضافة سمة الترجمة للنصوص
```html
<!-- ترجمة النص -->
<h1 data-translate="hero_title_1">Asset Management &</h1>

<!-- ترجمة placeholder -->
<input type="text" data-translate-placeholder="your_name" placeholder="Your Name">

<!-- ترجمة title -->
<a href="#" data-translate-title="learn_more" title="Learn More">Read More</a>
```

### 2. إضافة زر تغيير اللغة
```html
<div class="header-dropdown">
    <a class="dropdown-toggle language-switcher" href="#" role="button">
        <i class="fas fa-globe"></i><span class="current-lang">English</span>
    </a>
    <ul class="dropdown-menu">
        <li><a href="#" class="language-switcher" data-lang="en">English</a></li>
        <li><a href="#" class="language-switcher" data-lang="ar">العربية</a></li>
    </ul>
</div>
```

### 3. تضمين الملفات المطلوبة
```html
<!-- في الهيدر -->
<link rel="stylesheet" href="assets/css/rtl.css">

<!-- في الفوتر -->
<script src="assets/js/translations.js"></script>
```

### 4. استخدام دوال PHP للترجمة
```php
<?php
session_start();
include_once 'includes/translation_helper.php';

// الحصول على النص المترجم
echo t('home'); // يعرض "Home" أو "الرئيسية"

// الحصول على اتجاه الصفحة
echo getHtmlDir(); // يعرض "rtl" أو "ltr"

// الحصول على لغة الصفحة
echo getHtmlLang(); // يعرض "en" أو "ar"

// فحص إذا كانت اللغة RTL
if (isRTL()) {
    echo 'اللغة العربية مفعلة';
}
?>
```

## إضافة نصوص جديدة للترجمة

### 1. إضافة النص في ملف JavaScript
```javascript
// في ملف translations.js
const translations = {
    en: {
        "new_text": "New English Text",
        // ... باقي النصوص
    },
    ar: {
        "new_text": "نص عربي جديد",
        // ... باقي النصوص
    }
};
```

### 2. إضافة النص في ملف PHP
```php
// في ملف translation_helper.php
$translations = [
    'en' => [
        'new_text' => 'New English Text',
        // ... باقي النصوص
    ],
    'ar' => [
        'new_text' => 'نص عربي جديد',
        // ... باقي النصوص
    ]
];
```

### 3. استخدام النص الجديد
```html
<h2 data-translate="new_text">New English Text</h2>
```

## تخصيص التصميم

### 1. تخصيص زر تغيير اللغة
```css
.language-switcher {
    background-color: #007bff;
    color: white;
    padding: 8px 16px;
    border-radius: 20px;
}

.language-switcher:hover {
    background-color: #0056b3;
}
```

### 2. تخصيص أنماط RTL
```css
.rtl {
    direction: rtl;
    text-align: right;
}

.rtl .main-menu {
    text-align: right;
}
```

## استكشاف الأخطاء

### 1. مشكلة عدم ظهور الترجمة
- تأكد من تضمين ملف `translations.js`
- تأكد من إضافة سمة `data-translate` للنص
- تحقق من وحدة تحكم المتصفح للأخطاء

### 2. مشكلة عدم عمل RTL
- تأكد من تضمين ملف `rtl.css`
- تأكد من إضافة class `rtl` للجسم
- تحقق من اتجاه HTML (`dir` attribute)

### 3. مشكلة حفظ اللغة
- تأكد من تفعيل localStorage في المتصفح
- تحقق من إعدادات الخصوصية

## أفضل الممارسات

1. **استخدم مفاتيح واضحة**: استخدم مفاتيح وصفية مثل `hero_title` بدلاً من `title1`
2. **حافظ على التناسق**: استخدم نفس المفاتيح في جميع الملفات
3. **اختبر على كلا اللغتين**: تأكد من عمل التصميم بشكل صحيح في كلا الاتجاهين
4. **استخدم UTF-8**: تأكد من استخدام ترميز UTF-8 لجميع الملفات

## الدعم

للمساعدة أو الاستفسارات حول نظام الترجمة، يرجى التواصل مع فريق التطوير.

---

**ملاحظة**: هذا النظام مصمم خصيصاً لموقع Dexterity وقد يحتاج إلى تعديلات للاستخدام في مواقع أخرى.

