<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

header("Content-Type: application/json");

// Capture raw input
$stkCallbackResponse = file_get_contents('php://input');

if (!$stkCallbackResponse) {
    file_put_contents("CallbackFailure.log", "No JSON data received\n", FILE_APPEND);
    echo json_encode(["error" => "Invalid JSON received."]);
    exit;
}

// Save raw payload for debugging
file_put_contents("Mpesastkresponse.json", $stkCallbackResponse . PHP_EOL, FILE_APPEND);

// Try to decode
$response = json_decode($stkCallbackResponse, true);
if (!$response || !isset($response['Body']['stkCallback'])) {
    file_put_contents("CallbackFailure.log", "Invalid JSON structure\n", FILE_APPEND);
    echo json_encode(["error" => "Invalid callback structure."]);
    exit;
}

$stkCallback = $response['Body']['stkCallback'];
$ResultCode = $stkCallback['ResultCode'] ?? null;
$ResultDesc = $stkCallback['ResultDesc'] ?? null;
$CheckoutRequestID = $stkCallback['CheckoutRequestID'] ?? null;

$Amount = null;
$MpesaCode = null;
$PhoneNumber = null;

// Extract metadata
if (isset($stkCallback['CallbackMetadata']['Item'])) {
    foreach ($stkCallback['CallbackMetadata']['Item'] as $item) {
        if ($item['Name'] === 'Amount') $Amount = $item['Value'];
        if ($item['Name'] === 'MpesaReceiptNumber') $MpesaCode = $item['Value'];
        if ($item['Name'] === 'PhoneNumber') $PhoneNumber = $item['Value'];
    }
}

// Log full callback
file_put_contents("CallbackLog.json", json_encode($stkCallback, JSON_PRETTY_PRINT) . PHP_EOL, FILE_APPEND);

// ✅ Fetch customer details from DB using CheckoutRequestID
require_once '../admin/databases/db_connect.php';
$customer_name = '';
$customer_email = '';
if ($CheckoutRequestID) {
    $stmt = $conn->prepare("SELECT customer_name, customer_email FROM payments WHERE checkout_request_id = ?");
    $stmt->bind_param("s", $CheckoutRequestID);
    $stmt->execute();
    $stmt->bind_result($customer_name, $customer_email);
    $stmt->fetch();
    $stmt->close();
}

if ($ResultCode === 0) {
    // Payment successful
    file_put_contents("CallbackSuccess.log", "Payment Success: $MpesaCode | $PhoneNumber | $Amount\n", FILE_APPEND);

    // Update DB record
    $stmt = $conn->prepare("UPDATE payments SET mpesa_code=?, payment_status='confirmed' WHERE checkout_request_id=?");
    $stmt->bind_param("ss", $MpesaCode, $CheckoutRequestID);
    $stmt->execute();
    $stmt->close();

    // Email sending block (optional)
    $adminEmail = "customercare@favornjebrands.co.ke";
    $subject = "Payment Successful";
    $message = "Dear $customer_name,\n\nYour payment of KES $Amount has been successfully processed.\n\nThank you.";
    $headers = "From: customercare@favornjebrands.co.ke";

    if (!empty($customer_email)) {
        mail($customer_email, $subject, $message, $headers);
    }

    mail($adminEmail, "New Payment Received", "Payment by $customer_name ($PhoneNumber) of KES $Amount.\nMPESA Code: $MpesaCode", $headers);

    echo json_encode(["result" => "Payment processed successfully."]);
} else {
    // Payment failed
    file_put_contents("CallbackFailure.log", "STK Push failed: ResultCode $ResultCode - $ResultDesc\n", FILE_APPEND);
    echo json_encode(["error" => "STK Push failed."]);
}
?>
