# تعليمات التشغيل المحلي - Dexterity API

## 🚀 التشغيل السريع

### 1. تأكد من تشغيل XAMPP
- شغل Apache
- شغل MySQL
- تأكد أن MySQL يعمل على المنفذ 3306

### 2. إنشاء ملف .env
```bash
# انسخ الملف
cp .env.example .env

# أو أنشئ ملف .env جديد بهذا المحتوى:
```

```env
APP_NAME="Dexterity API"
APP_ENV=local
APP_KEY=
APP_DEBUG=true
APP_URL=http://localhost:8000

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=dexterity
DB_USERNAME=root
DB_PASSWORD=

# باقي الإعدادات تبقى كما هي
```

### 3. تثبيت المتطلبات
```bash
composer install
```

### 4. إنشاء مفتاح التطبيق
```bash
php artisan key:generate
```

### 5. إنشاء قاعدة البيانات
```sql
-- في phpMyAdmin أو MySQL
CREATE DATABASE dexterity CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
```

### 6. تشغيل الـ Migrations
```bash
php artisan migrate
```

### 7. إنشاء بيانات تجريبية (اختياري)
```bash
php artisan db:seed
```

### 8. إنشاء رابط Storage للصور
```bash
php artisan storage:link
```

### 9. تشغيل الخادم
```bash
php artisan serve
```

## 🌐 اختبار الـ API

الـ API سيعمل على: `http://localhost:8000/api`

### اختبار سريع:
```bash
# اختبار الأخبار
curl http://localhost:8000/api/news

# اختبار الخدمات
curl http://localhost:8000/api/services

# اختبار الوظائف
curl http://localhost:8000/api/jobs

# اختبار رسائل الاتصال
curl http://localhost:8000/api/contacts
```

## 🔧 استكشاف الأخطاء

### إذا واجهت مشكلة في الاتصال بقاعدة البيانات:
1. تأكد أن MySQL يعمل في XAMPP
2. تأكد أن قاعدة البيانات `dexterity` موجودة
3. تأكد من اسم المستخدم وكلمة المرور

### إذا واجهت مشكلة في الـ migrations:
```bash
php artisan migrate:status
php artisan migrate:rollback
php artisan migrate
```

### إذا واجهت مشكلة في Storage:
```bash
php artisan storage:link
# تأكد أن مجلد storage/app/public موجود
```

## 📱 اختبار باستخدام Postman

1. افتح Postman
2. أضف request جديد
3. اختر GET method
4. أدخل URL: `http://localhost:8000/api/news`
5. اضغط Send

## ✅ علامات النجاح

- الخادم يعمل على `http://localhost:8000`
- قاعدة البيانات متصلة بنجاح
- الـ migrations تمت بنجاح
- الـ API يستجيب للطلبات
- يمكن رفع الصور (إذا تم إنشاء storage link)

## 🆘 إذا احتجت مساعدة

1. تأكد من تشغيل XAMPP
2. تأكد من إنشاء قاعدة البيانات
3. تأكد من صحة إعدادات .env
4. راجع رسائل الخطأ في terminal
