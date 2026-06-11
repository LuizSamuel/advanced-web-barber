<?php
session_start();
date_default_timezone_set('Africa/Nairobi');
ini_set('display_errors', 1);
error_reporting(E_ALL);

// ✅ INCLUDE ACCESS TOKEN & DB
require_once 'accesstoken.php'; // Your file that sets $access_token
require_once 'admin/databases/db_connect.php';

// ✅ SET STATIC TEST PHONE
$phone_number = '254708374149'; // Safaricom Sandbox Test Number
$BusinessShortCode = '174379';
$passkey = 'bfb279f9aa9bdbcf158e97dd71a467cd2e0c893059b10f78e6b72ada1ed2c919';

// ✅ SET TIMESTAMP & PASSWORD
$Timestamp = date('YmdHis');
$Password = base64_encode($BusinessShortCode . $passkey . $Timestamp);

// ✅ DARAJA CALLBACK URL (replace with your active ngrok URL)
$CallbackURL = "https://588f-102-219-210-90.ngrok-free.app/favorbrands/darajaapi/callback.php";
// ✅ CAPTURE CUSTOMER INFO
$customer_name = $_POST['customer_name'] ?? 'Sandbox User';
$customer_email = $_POST['customer_email'] ?? 'sandbox@example.com';
$amount = $_POST['amount'] ?? 1;

// ✅ SAVE INFO TO SESSION
$_SESSION['customer_name'] = $customer_name;
$_SESSION['customer_phone'] = $phone_number;
$_SESSION['customer_email'] = $customer_email;
$_SESSION['amount'] = $amount;

// ✅ PREPARE STK PUSH REQUEST
$stkpushheader = [
    'Content-Type: application/json',
    'Authorization: Bearer ' . $access_token
];

$curl_post_data = [
    'BusinessShortCode' => $BusinessShortCode,
    'Password' => $Password,
    'Timestamp' => $Timestamp,
    'TransactionType' => 'CustomerPayBillOnline',
    'Amount' => $amount,
    'PartyA' => $phone_number,
    'PartyB' => $BusinessShortCode,
    'PhoneNumber' => $phone_number,
    'CallBackURL' => $CallbackURL,
    'AccountReference' => 'FavorBrands',
    'TransactionDesc' => 'Favor Brands Sandbox Payment'
];

// ✅ MAKE API CALL
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, 'https://sandbox.safaricom.co.ke/mpesa/stkpush/v1/processrequest');
curl_setopt($curl, CURLOPT_HTTPHEADER, $stkpushheader);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($curl_post_data));
$response = curl_exec($curl);
curl_close($curl);

// ✅ DECODE RESPONSE
$response_data = json_decode($response, true);

// ✅ HANDLE RESPONSE
if (isset($response_data['ResponseCode']) && $response_data['ResponseCode'] == '0') {
    $checkout_id = $response_data['CheckoutRequestID'];
    $_SESSION['checkout_request_id'] = $checkout_id;
    $_SESSION['transaction_status'] = 'initiated';

    // Save to DB
    
    $stmt = $conn->prepare("INSERT INTO payments (customer_name, customer_phone, customer_email, amount, checkout_request_id, payment_status) VALUES (?, ?, ?, ?, ?, 'pending')");
    $stmt->bind_param("sssss", $customer_name, $phone_number, $customer_email, $amount, $checkout_id);

    //$stmt->bind_param("ssssd", $customer_name, $phone_number, $customer_email, $amount, $checkout_id);
    $stmt->execute();
    $stmt->close();

    // ✅ Show the CheckoutRequestID for simulator
    $message = "Payment initiated. Use this CheckoutRequestID to simulate:\n\n$checkout_id\n\nEnter it in Safaricom's Mpesa Express simulator.";
} else {
    $_SESSION['transaction_status'] = 'failed';
    $message = "Payment failed. Reason: " . ($response_data['errorMessage'] ?? 'Unknown error');
}

// ✅ REDIRECT OR SHOW MESSAGE
echo "<script>alert(`$message`); window.location.href = 'index.php';</script>";
