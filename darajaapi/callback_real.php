<?php
session_start();
date_default_timezone_set('Africa/Nairobi');
ini_set('display_errors', 1);
error_reporting(E_ALL);

header("Content-Type: application/json");

require_once '../admin/databases/db_connect.php'; // adjust path if needed

$raw_data = file_get_contents('php://input');

// Save full payload for debugging
file_put_contents("callback_debug.log", "Callback hit at " . date('Y-m-d H:i:s') . PHP_EOL, FILE_APPEND);
file_put_contents("callback_payload.json", $raw_data . PHP_EOL, FILE_APPEND);

if (!$raw_data) {
    echo json_encode(["error" => "No data received"]);
    exit;
}

$data = json_decode($raw_data, true);
if (!$data || !isset($data['Body']['stkCallback'])) {
    echo json_encode(["error" => "Invalid data"]);
    exit;
}

$stkCallback = $data['Body']['stkCallback'];
$ResultCode = $stkCallback['ResultCode'] ?? null;
$ResultDesc = $stkCallback['ResultDesc'] ?? '';
$CheckoutRequestID = $stkCallback['CheckoutRequestID'] ?? '';
$Amount = null;
$MpesaCode = null;
$PhoneNumber = null;

if (isset($stkCallback['CallbackMetadata']['Item'])) {
    foreach ($stkCallback['CallbackMetadata']['Item'] as $item) {
        if ($item['Name'] === 'Amount') $Amount = $item['Value'];
        if ($item['Name'] === 'MpesaReceiptNumber') $MpesaCode = $item['Value'];
        if ($item['Name'] === 'PhoneNumber') $PhoneNumber = $item['Value'];
    }
}

// Save the transaction only if successful
if ($ResultCode == 0 && $MpesaCode && $CheckoutRequestID) {
    $stmt = $conn->prepare("UPDATE payments SET mpesa_code = ?, payment_status = 'confirmed' WHERE checkout_request_id = ?");
    $stmt->bind_param("ss", $MpesaCode, $CheckoutRequestID);
    $stmt->execute();
    $stmt->close();

    file_put_contents("CallbackSuccess.log", "✅ Payment confirmed: $MpesaCode | $PhoneNumber | $Amount\n", FILE_APPEND);
    echo json_encode(["status" => "Payment confirmed"]);
} else {
    file_put_contents("CallbackFailure.log", "❌ STK Push failed: $ResultDesc (Code $ResultCode)\n", FILE_APPEND);
    echo json_encode(["status" => "Payment failed or not successful"]);
}
