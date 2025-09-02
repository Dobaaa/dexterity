<?php
// تستدعي Laravel Endpoint
$apiUrl = "https://yourdomain.com/api/checkout"; // Laravel route
$response = file_get_contents($apiUrl);
$data = json_decode($response, true);
$checkoutId = $data['id'] ?? null;
?>
<!DOCTYPE html>
<html>
<head>
  <title>Checkout</title>
</head>
<body>
<?php if ($checkoutId): ?>
  <script src="https://eu-test.oppwa.com/v1/paymentWidgets.js?checkoutId=<?= $checkoutId ?>"></script>
  <form action="return.php" class="paymentWidgets" data-brands="VISA MASTER MADA"></form>
<?php else: ?>
  <p>خطأ: مش قادر أجيب CheckoutId.</p>
<?php endif; ?>
</body>
</html>
