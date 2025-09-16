<?php

namespace App\Services;

use Exception;

class TestImapService
{
    public function testConnection()
    {
        try {
            // اختبار الاتصال بدون مكتبة IMAP
            $host = env('IMAP_HOST', 'mail.dexterity.com.sa');
            $port = env('IMAP_PORT', 993);
            $username = env('IMAP_USERNAME', '');
            $password = env('IMAP_PASSWORD', '');
            
            if (empty($username) || empty($password)) {
                return [
                    'success' => false,
                    'message' => 'اسم المستخدم أو كلمة المرور فارغة في ملف .env'
                ];
            }
            
            // اختبار الاتصال بالخادم
            $connection = @fsockopen($host, $port, $errno, $errstr, 10);
            
            if (!$connection) {
                return [
                    'success' => false,
                    'message' => "فشل في الاتصال بالخادم: $host:$port - $errstr ($errno)"
                ];
            }
            
            fclose($connection);
            
            return [
                'success' => true,
                'message' => 'تم الاتصال بالخادم بنجاح',
                'config' => [
                    'host' => $host,
                    'port' => $port,
                    'username' => $username,
                    'password_set' => !empty($password)
                ]
            ];
            
        } catch (Exception $e) {
            return [
                'success' => false,
                'message' => 'خطأ في الاختبار: ' . $e->getMessage()
            ];
        }
    }
}
