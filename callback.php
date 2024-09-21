<?php
$paystackSecretKey = "sk_test_61bc2ae41c705c7a7b78b119c0650ab333ab2eb1";
$reference = $_GET['reference'];

// Verify the payment with the reference ID
$verifyUrl = "https://api.paystack.co/transaction/verify/" . rawurlencode($reference);

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $verifyUrl);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// Set headers
$headers = [
    "Authorization: Bearer " . $paystackSecretKey,
];
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

// Execute the request
$response = curl_exec($ch);

// Check for errors
if (curl_errno($ch)) {
    echo 'Curl error: ' . curl_error($ch);
} else {
    $result = json_decode($response, true);

    if ($result['status'] && $result['data']['status'] === 'success') {
        // Payment successful
        echo "Payment was successful. Transaction reference: " . $reference;
        // Process the booking, save transaction details to the database, etc.
    } else {
        // Payment failed
        echo "Payment verification failed: " . $result['message'];
    }
}

// Close cURL session
curl_close($ch);
?>
