<?php
session_start();
include('config.php');
require_once '../razorpay/Razorpay.php';

use Razorpay\Api\Api;

$keyId = 'rzp_test_kBREEooxYkKLPo';
$keySecret = 'P5NsdNUNPas0c0C74oCjkk1Y';

$api = new Api($keyId, $keySecret);

if (isset($_POST['payment_id']) && isset($_POST['order_id']) && isset($_POST['signature'])) {
    $payment_id = $_POST['payment_id'];
    $order_id = $_POST['order_id'];
    $signature = $_POST['signature'];

    try {
        // Verify the payment signature
        $attributes = array(
            'razorpay_order_id' => $order_id,
            'razorpay_payment_id' => $payment_id,
            'razorpay_signature' => $signature
        );

        $api->utility->verifyPaymentSignature($attributes);
        
        // If signature verification is successful, you can update the order status in your database
        // For example: update the payment status for the order in your database
        $user_id = $_SESSION['user_id'];
        $query = "UPDATE orders SET payment_status = 'Paid' WHERE user_id = $user_id AND order_id = '$order_id'";
        mysqli_query($conn, $query);

        echo json_encode(['status' => 'success', 'message' => 'Payment verified successfully!']);
    } catch (Exception $e) {
        echo json_encode(['status' => 'error', 'message' => 'Payment verification failed!']);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request!']);
}
