<?php

// Safaricom M-Pesa API credentials
$consumerKey = 'hnkxD4vO5AvuSNdkNYcTXQpxNi0dDi4zDlZgglg9LAVClasD';
$consumerSecret = '8jlJPWahu635jrYmjQngd8tRlUfEAfL9L4UGKhkzhKqol4acLhGAGq8iC51uGdHJ';
$lipaNaMpesaOnlinePasskey = 'bfb279f9aa9bdbcf158e97dd71a467cd2e0c893059b10f78e6b72ada1ed2c919';
$lipaNaMpesaOnlineShortcode = '174379'; // This is your M-Pesa Till Number
$lipaNaMpesaOnlineCallbackURL = 'https://mydomain.com/path';

// User input
$phoneNumber = 'user_phone_number'; // Get this from the user input
$amount = 'user_amount'; // Get this from the user input

// Generate a token for authentication
$credentials = base64_encode($consumerKey . ':' . $consumerSecret);

// Construct the payload for STK push
$payload = [
    'BusinessShortCode' => $lipaNaMpesaOnlineShortcode,
    'Password' => base64_encode($lipaNaMpesaOnlineShortcode . $lipaNaMpesaOnlinePasskey . date('YmdHis')),
    'Timestamp' => date('YmdHis'),
    'TransactionType' => 'CustomerPayBillOnline',
    'Amount' => $amount,
    'PartyA' => $phoneNumber,
    'PartyB' => $lipaNaMpesaOnlineShortcode,
    'PhoneNumber' => $phoneNumber,
    'CallBackURL' => $lipaNaMpesaOnlineCallbackURL,
    'AccountReference' => 'your_reference',
    'TransactionDesc' => 'your_description',
];

// Convert the payload to JSON format
$payloadJson = json_encode($payload);

// M-Pesa API endpoint (sandbox environment)
$apiEndpoint = 'https://sandbox.safaricom.co.ke/mpesa/stkpush/v1/processrequest';

// Initialize cURL session
$ch = curl_init($apiEndpoint);

// Set cURL options
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Authorization: Basic ' . $credentials,
    'Content-Type: application/json',
]);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $payloadJson);

// Execute cURL session
$response = curl_exec($ch);

// Check for errors
if (curl_errno($ch)) {
    echo 'Error: ' . curl_error($ch);
} else {
    // Handle the response from Safaricom (e.g., store transaction details)
    echo 'STK push sent successfully!';
}

// Close cURL session
curl_close($ch);

// Your provided code snippet
$ch = curl_init('https://sandbox.safaricom.co.ke/mpesa/stkpush/v1/processrequest');
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Authorization: Bearer cFmW0lUAdclSPQLWTVSUQGCHIQNy',
    'Content-Type: application/json'
]);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, [
    "BusinessShortCode" => 174379,
    "Password" =>
    "MTc0Mzc5YmZiMjc5ZjlhYTliZGJjZjE1OGU5N2RkNzFhNDY3Y2QyZTBjODkzMDU5YjEwZjc4ZTZiNzJhZGExZWQyYzkxOTIwMjQwMTMxMTA0MjA3",
    "Timestamp" => "20240131104207",
    "TransactionType" => "CustomerPayBillOnline",
    "Amount" => 1,
    "PartyA" => 254708374149,
    "PartyB" => 174379,
    "PhoneNumber" => 254708374149,
    "CallBackURL" => "https://mydomain.com/path",
    "AccountReference" => "CompanyXLTD",
    "TransactionDesc" => "Payment of X"
]);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$response = curl_exec($ch);
curl_close($ch);
echo $response;
