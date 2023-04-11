<?php

// Import the ShipStation API SDK
require_once("path/to/shipstation-php-sdk/autoload.php");

// Set up the API credentials
$apiKey = "1b8b5a431063458da7a06f43780552b1";
$apiSecret = "Y87b5cd85feac4bf69529077d04e780c2";
$shipstation = new ShipStation\ShipStation($apiKey, $apiSecret);

// Get the form data
$name = $_POST['name'];
$email = $_POST['email'];
$address = $_POST['address'];
$city = $_POST['city'];
$state = $_POST['state'];
$zip = $_POST['zip'];
$itemName = $_POST['itemName'];
$quantity = $_POST['quantity'];
$orderKey = $_POST['orderKey'];

// Create the shipping label
$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, "https://ssapi.shipstation.com/shipments/create_label");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);

$headers = array();
$headers[] = "Content-Type: application/json";
$headers[] = "Authorization: Basic " . base64_encode($apiKey . ":" . $apiSecret);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$data = array(
    "orderKey" => $orderKey,
    "recipient" => array(
        "name" => $name,
        "street1" => $address,
        "city" => $city,
        "state" => $state,
        "postalCode" => $zip
    ),
    "items" => array(
        array(
            "name" => $itemName,
            "quantity" => $quantity
        )
    )
);

$data_string = json_encode($data);

curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);

$result = curl_exec($ch);

if (curl_errno($ch)) {
    echo 'Error:' . curl_error($ch);
} else {
    // Redirect to the confirmation page
    header('Location: confirmation.html');
}

curl_close($ch);
?>
