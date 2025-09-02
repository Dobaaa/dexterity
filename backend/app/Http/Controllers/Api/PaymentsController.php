<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;

class PaymentController extends Controller
{
    protected function client()
    {
        return new Client(['base_uri' => rtrim(env('HYPERPAY_BASE_URL'), '/') . '/']);
    }

    public function createCheckout(Request $request)
    {
        $amount   = number_format($request->input('amount', 99), 2, '.', '');
        $currency = $request->input('currency', 'SAR');
        $orderId  = $request->input('order_id', 'ord_' . Str::random(8));

        $resp = $this->client()->post('v1/checkouts', [
            'headers'     => ['Authorization' => 'Bearer ' . env('HYPERPAY_AUTH_TOKEN')],
            'form_params' => [
                'entityId'              => env('HYPERPAY_ENTITY_ID'),
                'amount'                => $amount,
                'currency'              => $currency,
                'paymentType'           => 'DB', // سحب مباشر
                'merchantTransactionId' => $orderId,
                'shopperResultUrl'      => env('PAYMENT_RETURN_URL'),
            ],
            'http_errors' => false,
        ]);

        $data = json_decode($resp->getBody()->getContents(), true);
        if (empty($data['id'])) {
            Log::error('HyperPay checkout error', ['response' => $data]);
            return response()->json(['ok' => false, 'error' => $data], 422);
        }

        return response()->json([
            'ok'        => true,
            'checkoutId'=> $data['id'],
            'scriptUrl' => rtrim(env('HYPERPAY_BASE_URL'), '/') . '/v1/paymentWidgets.js?checkoutId=' . $data['id'],
            'brands'    => env('HYPERPAY_BRANDS', 'VISA MASTER MADA APPLEPAY'),
            'orderId'   => $orderId,
        ]);
    }

    public function handleReturn(Request $request)
    {
        $resourcePath = $request->query('resourcePath');
        $checkoutId   = $request->query('id') ?? $request->query('checkoutId');

        $path = $resourcePath ?: "v1/checkouts/{$checkoutId}/payment";

        $resp = $this->client()->get(ltrim($path, '/'), [
            'headers'     => ['Authorization' => 'Bearer ' . env('HYPERPAY_AUTH_TOKEN')],
            'http_errors' => false,
        ]);

        $data = json_decode($resp->getBody()->getContents(), true);
        // قاعدة عامة: أكواد النجاح في HyperPay عادة تبدأ بـ "000."
        $code = $data['result']['code'] ?? '';
        $success = str_starts_with($code, '000.');

        // TODO: سجّل الطلب Paid/Failed في DB حسب $success
        // ثم وجّهه لصفحة نجاح/فشل مناسبة في الواجهة الأمامية
        if ($success) {
            return redirect('/payment/success?order=' . ($data['merchantTransactionId'] ?? ''));
        } else {
            return redirect('/payment/failed?reason=' . urlencode($data['result']['description'] ?? ''));
        }
    }

    public function webhook(Request $request)
    {
        // اختياري: فعّل Webhooks من لوحة HyperPay للتحققات المضمونة
        Log::info('HyperPay webhook', ['payload' => $request->all(), 'headers' => $request->headers->all()]);
        return response()->json(['ok' => true]);
    }
}
