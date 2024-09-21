<?php
// Paystack secret key
$paystackSecretKey = "sk_test_61bc2ae41c705c7a7b78b119c0650ab333ab2eb1";

// Set the Paystack initialization endpoint
$paystackEndpoint = "https://api.paystack.co/transaction/initialize";

// Get the form details
$email = $_POST['email']; // customer email from the form
$amount = $_POST['amount'] * 100; // amount in kobo (convert to kobo)
$description = $_POST['description']; // description of the booking
$callbackUrl = "localhost/tourism/?page=my_account"; // URL to handle callback after payment

// Prepare data for the API request
$paymentData = [
    'email' => $email,
    'amount' => $amount,
    'callback_url' => $callbackUrl,
    'metadata' => json_encode([
        'description' => $description,
    ])
];

// Initialize cURL to make the request
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $paystackEndpoint);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($paymentData));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// Set headers
$headers = [
    "Authorization: Bearer " . $paystackSecretKey,
    "Content-Type: application/x-www-form-urlencoded"
];
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

// Execute the request
$response = curl_exec($ch);

// Check for errors in the request
if (curl_errno($ch)) {
    echo 'Curl error: ' . curl_error($ch);
} else {
    $result = json_decode($response, true);
    
    if ($result['status']) {
        // Payment initialized successfully, redirect to Paystack checkout page
        $authorizationUrl = $result['data']['authorization_url'];
        header("Location: $authorizationUrl");
    } else {
        // Failed to initialize payment
        echo "Payment initialization failed: " . $result['message'];
    }
}

// Close cURL session
curl_close($ch);
?>
