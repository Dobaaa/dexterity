<?php

namespace App\Services;

use App\Models\Email;
use Webklex\PHPIMAP\ClientManager;
use Carbon\Carbon;
use Exception;

class ImapService
{
    protected $client;

    public function __construct()
    {
        try {
            $cm = new ClientManager();
            $this->client = $cm->account('default');
        } catch (Exception $e) {
            \Log::error('IMAP Connection Error: ' . $e->getMessage());
            $this->client = null;
        }
    }

    public function fetchEmails()
    {
        try {
            if (!$this->client) {
                return 'فشل في الاتصال بخادم البريد الإلكتروني - تحقق من إعدادات IMAP في ملف .env';
            }

            // الاتصال بالخادم
            $this->client->connect();

            // الحصول على صندوق الوارد
            $folder = $this->client->getFolder('INBOX');

            // جلب الرسائل (آخر 50 رسالة)
            $messages = $folder->messages()->all()->limit(50, 0);

            $savedCount = 0;

            foreach ($messages as $message) {
                try {
                    // التحقق من وجود الرسالة في قاعدة البيانات
                    $existingEmail = Email::where('message_id', $message->getMessageId())->first();
                    
                    if (!$existingEmail) {
                        // حفظ الرسالة الجديدة
                        Email::create([
                            'message_id' => $message->getMessageId(),
                            'subject' => $message->getSubject(),
                            'body' => $message->getHTMLBody() ?: $message->getTextBody(),
                            'from_email' => $message->getFrom()[0]->mail ?? null,
                            'from_name' => $message->getFrom()[0]->personal ?? null,
                            'to_email' => $message->getTo()[0]->mail ?? null,
                            'date' => $message->getDate() ? Carbon::parse($message->getDate()) : now(),
                        ]);
                        
                        $savedCount++;
                    }
                } catch (Exception $e) {
                    \Log::error('Error saving email: ' . $e->getMessage());
                    continue;
                }
            }

            // قطع الاتصال
            $this->client->disconnect();

            return "تم جلب وحفظ {$savedCount} رسالة جديدة";

        } catch (Exception $e) {
            \Log::error('IMAP Fetch Error: ' . $e->getMessage());
            return 'خطأ في جلب الرسائل: ' . $e->getMessage();
        }
    }
}
