# Dexterity API Documentation

## نظرة عامة
هذا الـ API يوفر واجهة برمجة لإدارة محتوى موقع Dexterity، بما في ذلك الأخبار والخدمات والوظائف ورسائل الاتصال.

## المتطلبات الأساسية
- PHP 8.2 أو أحدث
- Laravel 12
- MySQL
- Composer

## التثبيت والتشغيل

### 1. تثبيت المتطلبات
```bash
composer install
```

### 2. إعداد ملف البيئة
```bash
cp .env.example .env
php artisan key:generate
```

### 3. تعديل ملف .env
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=dexterity_db
DB_USERNAME=root
DB_PASSWORD=
```

### 4. إنشاء قاعدة البيانات
```sql
CREATE DATABASE dexterity_db;
```

### 5. تشغيل الـ Migrations
```bash
php artisan migrate
```

### 6. إنشاء بيانات تجريبية (اختياري)
```bash
php artisan db:seed
```

### 7. إنشاء رابط Storage
```bash
php artisan storage:link
```

### 8. تشغيل الخادم
```bash
php artisan serve
```

الـ API سيعمل على: `http://localhost:8000/api`

## Endpoints

### الأخبار (News)

#### عرض جميع الأخبار
```
GET /api/news
```

#### إضافة خبر جديد
```
POST /api/news
Content-Type: multipart/form-data

{
    "title": "عنوان الخبر",
    "content": "محتوى الخبر",
    "image": [ملف صورة]
}
```

#### عرض خبر واحد
```
GET /api/news/{id}
```

#### تعديل خبر
```
PUT /api/news/{id}
Content-Type: multipart/form-data

{
    "title": "عنوان محدث",
    "content": "محتوى محدث",
    "image": [ملف صورة جديد]
}
```

#### حذف خبر
```
DELETE /api/news/{id}
```

### الخدمات (Services)

#### عرض جميع الخدمات
```
GET /api/services
```

#### إضافة خدمة جديدة
```
POST /api/services
Content-Type: multipart/form-data

{
    "name": "اسم الخدمة",
    "description": "وصف الخدمة",
    "image": [ملف صورة]
}
```

#### عرض خدمة واحدة
```
GET /api/services/{id}
```

#### تعديل خدمة
```
PUT /api/services/{id}
Content-Type: multipart/form-data

{
    "name": "اسم محدث",
    "description": "وصف محدث",
    "image": [ملف صورة جديد]
}
```

#### حذف خدمة
```
DELETE /api/services/{id}
```

### الوظائف (Jobs)

#### عرض جميع الوظائف
```
GET /api/jobs
```

#### إضافة وظيفة جديدة
```
POST /api/jobs
Content-Type: application/json

{
    "title": "عنوان الوظيفة",
    "description": "وصف الوظيفة",
    "requirements": "متطلبات الوظيفة"
}
```

#### عرض وظيفة واحدة
```
GET /api/jobs/{id}
```

#### تعديل وظيفة
```
PUT /api/jobs/{id}
Content-Type: application/json

{
    "title": "عنوان محدث",
    "description": "وصف محدث",
    "requirements": "متطلبات محدثة"
}
```

#### حذف وظيفة
```
DELETE /api/jobs/{id}
```

### رسائل الاتصال (Contacts)

#### عرض جميع الرسائل
```
GET /api/contacts
```

#### إرسال رسالة جديدة
```
POST /api/contacts
Content-Type: application/json

{
    "name": "اسم المرسل",
    "email": "email@example.com",
    "phone": "رقم الهاتف",
    "subject": "الموضوع",
    "message": "نص الرسالة"
}
```

## استجابة الـ API

جميع الردود بصيغة JSON وتحتوي على:

### نجح العملية
```json
{
    "success": true,
    "message": "تم إنشاء الخبر بنجاح",
    "data": {
        "id": 1,
        "title": "عنوان الخبر",
        "content": "محتوى الخبر",
        "image": "news/image.jpg",
        "image_url": "http://localhost:8000/storage/news/image.jpg",
        "created_at": "2024-01-01 12:00:00",
        "updated_at": "2024-01-01 12:00:00"
    }
}
```

### خطأ في التحقق
```json
{
    "success": false,
    "message": "Validation errors",
    "errors": {
        "title": ["حقل العنوان مطلوب"],
        "content": ["حقل المحتوى مطلوب"]
    }
}
```

## رفع الصور

- الصور تُرفع عبر `multipart/form-data`
- الصور تُخزن في مجلد `storage/app/public`
- الصور تدعم الصيغ: JPEG, PNG, JPG, GIF
- الحد الأقصى لحجم الصورة: 2MB
- الصور تُخزن في مجلدات منفصلة:
  - الأخبار: `storage/app/public/news/`
  - الخدمات: `storage/app/public/services/`

## ملاحظات مهمة

1. **لا يوجد مصادقة حالياً**: الـ API مفتوح بدون حماية مؤقتاً
2. **CORS**: تأكد من إعداد CORS إذا كنت تستخدم frontend منفصل
3. **Rate Limiting**: يمكن إضافة حدود للطلبات لاحقاً
4. **Logging**: جميع العمليات تُسجل في ملفات Laravel

## اختبار الـ API

يمكنك استخدام:
- Postman
- Insomnia
- cURL
- أي أداة اختبار API أخرى

### مثال باستخدام cURL

```bash
# عرض جميع الأخبار
curl -X GET http://localhost:8000/api/news

# إضافة خبر جديد
curl -X POST http://localhost:8000/api/news \
  -F "title=عنوان الخبر" \
  -F "content=محتوى الخبر" \
  -F "image=@/path/to/image.jpg"
```

## الدعم

لأي استفسارات أو مشاكل، يرجى التواصل مع فريق التطوير.
