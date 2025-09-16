<?php

namespace App\Http\Controllers\Api;

use App\Models\Email;
use App\Services\ImapService;
use App\Services\TestImapService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EmailController extends Controller
{
    // سحب الإيميلات من السيرفر
    public function fetch(ImapService $imapService)
    {
        return response()->json([
            'message' => $imapService->fetchEmails()
        ]);
    }

    // عرض الإيميلات المخزنة في قاعدة البيانات
    public function index()
    {
        $emails = Email::orderBy('date', 'desc')->get();
        return response()->json($emails);
    }

    // اختبار الاتصال بخادم البريد
    public function testConnection(TestImapService $testService)
    {
        return response()->json($testService->testConnection());
    }
}
