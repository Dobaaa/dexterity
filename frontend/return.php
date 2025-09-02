<?php
$resourcePath = $_GET['resourcePath'] ?? null;

if (!$resourcePath) {
    die("No resourcePath provided.");
}

$apiUrl = "https://yourdomain.com/api/payment-result?resourcePath=" . urlencode($resourcePath);

$response = file_get_contents($apiUrl);
$result = json_decode($response, true);

$success = isset($result['result']['code']) && strpos($result['result']['code'], '000.') === 0;

if ($success) {
    echo "<h1>✅ Payment Successful</h1>";
} else {
    echo "<h1>❌ Payment Failed</h1>";
    echo "<p>" . htmlspecialchars($result['result']['description'] ?? 'Unknown error') . "</p>";
}
