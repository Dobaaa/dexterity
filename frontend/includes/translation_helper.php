<?php
/**
 * Translation Helper for Dexterity Website
 * This file provides PHP functions for server-side translation support
 */

// Get current language from session or default to English
function getCurrentLanguage() {
    if (isset($_SESSION['dexterity_lang'])) {
        return $_SESSION['dexterity_lang'];
    }
    
    // Check if language is set in URL parameter
    if (isset($_GET['lang']) && in_array($_GET['lang'], ['en', 'ar'])) {
        $_SESSION['dexterity_lang'] = $_GET['lang'];
        return $_GET['lang'];
    }
    
    // Default language
    return 'en';
}

// Set language
function setLanguage($lang) {
    if (in_array($lang, ['en', 'ar'])) {
        $_SESSION['dexterity_lang'] = $lang;
        return true;
    }
    return false;
}

// Get translation text
function t($key, $lang = null) {
    if ($lang === null) {
        $lang = getCurrentLanguage();
    }
    
    $translations = [
        'en' => [
            'home' => 'Home',
            'about_us' => 'About Us',
            'our_team' => 'Our Team',
            'our_services' => 'Our Services',
            'contact_us' => 'Contact Us',
            'read_more' => 'Read More',
            'learn_more' => 'Learn More',
            'download' => 'Download',
            'subscribe' => 'Subscribe',
            'send' => 'Send',
            'send_message' => 'Send Us a Message',
            'for_any_query' => 'For Any Query',
            'your_name' => 'Your Name',
            'your_email' => 'Your Email',
            'phone_no' => 'Phone No',
            'your_subject' => 'Your Subject',
            'message' => 'Message',
            'office_address' => 'Office Address',
            'call_us_for_help' => 'Call Us For Help',
            'mail_info' => 'Mail info',
            'subscribe_newsletter' => 'Subscribe Newsletter',
            'subscribe_text' => 'Subscribe and get latest news and updates.',
            'enter_email' => 'Enter your email address...',
            'copyright' => 'Copyright',
            'all_rights_reserved' => 'All Rights Reserved',
            'get_in_touch' => 'Get In Touch',
            'asset_management_reliability' => 'Asset Management & Reliability Services',
            'consultation_services' => 'Consultation Services',
            'training_services' => 'Training Services',
            'professional_manpower' => 'Professional Manpower Supply',
            'arbitration_services' => 'Arbitration Services',
            'asset_hierarchy' => 'Asset Hierarchy (Assessment & Creation)',
            'asset_management_iso' => 'Asset Management (ISO 55001:2014)',
            'building_kpis' => 'Building Key Performance Indicators (KPIs)',
            'criticality_assessment' => 'Criticality Assessment & Ranking (Assessment & Creation)',
            'shutdown_turnaround' => 'Shutdown & Turnaround planning and management',
            'reliability_maintenance' => 'Reliability Centered Maintenance & PMO Projects',
            'mro_inventory' => 'MRO Inventory and Spare parts Optimization',
            'maintenance_reliability' => 'Maintenance & Reliability Effectiveness Assessment',
            'data_preparation' => 'Data Preparation for EAM implementation (SAP/Maximo)',
            'building_maintenance' => 'Building Maintenance, Reliability and Asset Management',
            'cmrp' => 'Certified Maintenance and Reliability Professional (CMRP)',
            'cama' => 'Certified Asset Management Accessor, CAMA, Asset Management & ISO 55001',
            'shutdown_training' => 'Shutdowns & Turnarounds Planning & Management',
            'rcm' => 'Reliability Centered Maintenance, RCM',
            'maintenance_planning' => 'Maintenance Planning & Scheduling',
            'rcfa' => 'Root Cause Failure Analysis, RCFA',
            'excellence_maintenance' => 'Excellence in Maintenance & Reliability Management',
            'asset_policy' => 'Creation of Asset Management Policy & Plan According to ISO 55001',
            'pmo' => 'Preventive Maintenance Optimization, PMO',
            'financial_management' => 'Financial Management of maintenance, reliability & asset management',
            'managing_maintenance' => 'Managing Maintenance resources',
            'mro_management' => 'MRO Inventory Management',
            'hero_title_1' => 'Asset Management &',
            'hero_title_2' => 'Reliability',
            'hero_description' => 'Arabian Dexterity is a leading performance improvement company in the Kingdom of Saudi Arabia, delivery the full spectrum of Asset Management, Risk Management and Operational Excellence Solution, We provide consultations, Training and Troubleshooting solutions across multiple industries.',
            'consultation_services_title' => 'Consultation Services',
            'consultation_services_description' => 'Arabian Dexterity Consultancy provides exceptional services to our clients. With years of industry experience, we have established ourselves as a trusted partner for organizations seeking expert guidance, advice, and implementation.',
            'about_title' => 'About Us',
            'about_subtitle' => 'DEXTERITY INDUSTRIAL Company',
            'about_description' => 'Arabian Dexterity Company is newly established company, gaining its strength from its Senior Experts in the fields of Asset Management and Plant maintenance optimization. The company has a competetive advantage with its ability to provide decent services, specialized consultancy and engineering solutions to the industrial, oil and gas sectors under challenging circumstances.',
            'mission_vision' => 'Mission & Vision',
            'mission_description' => 'To be the most trusted business partner in the field of asset management, risk management & operational excellence.',
            'vision_description' => 'To profitably grow our business by providing innovative, technologically superior-effective industrial services and systems.',
            'years_experience' => 'Years Business Experience'
        ],
        'ar' => [
            'home' => 'الرئيسية',
            'about_us' => 'من نحن',
            'our_team' => 'فريق العمل',
            'our_services' => 'خدماتنا',
            'contact_us' => 'اتصل بنا',
            'certificate' => 'الشهادات',
            'careers' => 'الوظائف',
            'read_more' => 'اقرأ المزيد',
            'learn_more' => 'اعرف المزيد',
            'download' => 'تحميل',
            'subscribe' => 'اشتراك',
            'send' => 'إرسال',
            'send_message' => 'أرسل لنا رسالة',
            'for_any_query' => 'لأي استفسار',
            'your_name' => 'اسمك',
            'your_email' => 'بريدك الإلكتروني',
            'phone_no' => 'رقم الهاتف',
            'your_subject' => 'الموضوع',
            'message' => 'الرسالة',
            'office_address' => 'عنوان المكتب',
            'call_us_for_help' => 'اتصل بنا للمساعدة',
            'mail_info' => 'معلومات البريد',
            'subscribe_newsletter' => 'اشترك في النشرة الإخبارية',
            'subscribe_text' => 'اشترك واحصل على آخر الأخبار والتحديثات.',
            'enter_email' => 'أدخل عنوان بريدك الإلكتروني...',
            'copyright' => 'حقوق النشر',
            'all_rights_reserved' => 'جميع الحقوق محفوظة',
            'get_in_touch' => 'تواصل معنا',
            'asset_management_reliability' => 'خدمات إدارة الأصول والموثوقية',
            'consultation_services' => 'الخدمات الاستشارية',
            'training_services' => 'خدمات التدريب',
            'professional_manpower' => 'إمداد القوى العاملة المهنية',
            'arbitration_services' => 'خدمات التحكيم',
            'asset_hierarchy' => 'تقييم وإنشاء التسلسل الهرمي للأصول',
            'asset_management_iso' => 'إدارة الأصول (ISO 55001:2014)',
            'building_kpis' => 'بناء مؤشرات الأداء الرئيسية للمباني',
            'criticality_assessment' => 'تقييم وترتيب الأصول حسب الأهمية',
            'shutdown_turnaround' => 'تخطيط وإدارة الإغلاق والتشغيل',
            'reliability_maintenance' => 'الصيانة المعتمدة على الموثوقية ومشاريع PMO',
            'mro_inventory' => 'تحسين مخزون قطع الغيار',
            'maintenance_reliability' => 'تقييم فعالية الصيانة والموثوقية',
            'data_preparation' => 'إعداد البيانات لتنفيذ أنظمة إدارة الأصول',
            'building_maintenance' => 'صيانة المباني والموثوقية وإدارة الأصول',
            'cmrp' => 'محترف الصيانة والموثوقية المعتمد',
            'cama' => 'مقيم إدارة الأصول المعتمد، CAMA، إدارة الأصول و ISO 55001',
            'shutdown_training' => 'تخطيط وإدارة الإغلاق والتشغيل',
            'rcm' => 'الصيانة المعتمدة على الموثوقية، RCM',
            'maintenance_planning' => 'تخطيط وجدولة الصيانة',
            'rcfa' => 'تحليل أسباب الأعطال الجذرية، RCFA',
            'excellence_maintenance' => 'التميز في إدارة الصيانة والموثوقية',
            'asset_policy' => 'إنشاء سياسة وخطة إدارة الأصول وفقاً لـ ISO 55001',
            'pmo' => 'تحسين الصيانة الوقائية، PMO',
            'financial_management' => 'الإدارة المالية للصيانة والموثوقية وإدارة الأصول',
            'managing_maintenance' => 'إدارة موارد الصيانة',
            'mro_management' => 'إدارة مخزون قطع الغيار',
            'hero_title_1' => 'إدارة الأصول',
            'hero_title_2' => 'والموثوقية',
            'hero_description' => 'شركة العربية دكستريتي هي شركة رائدة في تحسين الأداء في المملكة العربية السعودية، تقدم الطيف الكامل من حلول إدارة الأصول وإدارة المخاطر والتميز التشغيلي، نحن نقدم الاستشارات والتدريب وحلول استكشاف الأخطاء عبر صناعات متعددة.',
            'consultation_services_title' => 'الخدمات الاستشارية',
            'consultation_services_description' => 'تقدم العربية دكستريتي للاستشارات خدمات استثنائية لعملائنا. مع سنوات من الخبرة في الصناعة، لقد أثبتنا أنفسنا كشريك موثوق للمنظمات التي تسعى للحصول على التوجيه والخبرة والتنفيذ.',
            'about_title' => 'من نحن',
            'about_subtitle' => 'شركة دكستريتي الصناعية',
            'about_description' => 'شركة العربية دكستريتي هي شركة حديثة التأسيس، تستمد قوتها من خبرائها الكبار في مجالات إدارة الأصول وتحسين صيانة المصانع. تتمتع الشركة بميزة تنافسية مع قدرتها على تقديم خدمات لائقة واستشارات متخصصة وحلول هندسية للقطاعات الصناعية والنفط والغاز في ظروف صعبة.',
            'mission_vision' => 'الرسالة والرؤية',
            'mission_description' => 'أن نكون الشريك التجاري الأكثر ثقة في مجال إدارة الأصول وإدارة المخاطر والتميز التشغيلي.',
            'vision_description' => 'أن ننمو أعمالنا بشكل مربح من خلال تقديم خدمات وأنظمة صناعية مبتكرة ومتفوقة تقنياً وفعالة.',
            'years_experience' => 'سنوات الخبرة التجارية'
        ]
    ];
    
    return isset($translations[$lang][$key]) ? $translations[$lang][$key] : $key;
}

// Get HTML direction attribute - NO RTL changes
function getHtmlDir() {
    // Always use LTR to preserve exact original design
    return 'ltr';
}

// Get HTML lang attribute
function getHtmlLang() {
    return getCurrentLanguage();
}

// Check if current language is RTL
function isRTL() {
    return false; // Never RTL to preserve design
}

// Get RTL class if needed - NO RTL class
function getRTLClass() {
    // Never add rtl class to preserve exact original design
    return '';
}

// Echo translation with proper escaping
function et($key, $lang = null) {
    echo htmlspecialchars(t($key, $lang), ENT_QUOTES, 'UTF-8');
}

// Echo translation for placeholder
function et_placeholder($key, $lang = null) {
    echo 'placeholder="' . htmlspecialchars(t($key, $lang), ENT_QUOTES, 'UTF-8') . '"';
}

// Echo translation for title attribute
function et_title($key, $lang = null) {
    echo 'title="' . htmlspecialchars(t($key, $lang), ENT_QUOTES, 'UTF-8') . '"';
}
?>
