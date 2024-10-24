<?php
require_once '../razorpay/Razorpay.php';  // Include Razorpay SDK
use Razorpay\Api\Api;

session_start();
include './config.php'; // Include your database connection file

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $order_id = $_POST['order_id'];
    $payment_Id = $_POST['payment_Id'];
    $user_id = $_SESSION['id'];

    // Initialize Razorpay API
    $apiKey = 'rzp_test_kBREEooxYkKLPo'; // Replace with your Razorpay Key ID
    $apiSecret = 'P5NsdNUNPas0c0C74oCjkk1Y'; // Replace with your Razorpay Key Secret
    $api = new Api($apiKey, $apiSecret);

    // Query to check if the order exists
    $query = "SELECT * FROM product_info.user_order WHERE razorpay_order_id = ? AND user_id = ?";
    $stmt = $product_info->prepare($query); // Use prepared statements to prevent SQL injection
    $stmt->bind_param("si", $order_id, $user_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Update query to cancel the order
        $updateQuery = "UPDATE product_info.user_order SET status = 'Canceled' WHERE razorpay_order_id = ? AND user_id = ?";
        $updateStmt = $product_info->prepare($updateQuery);
        $updateStmt->bind_param("si", $order_id, $user_id);

        if ($updateStmt->execute()) {
            // Proceed with Razorpay refund (if applicable)
            try {
                // Fetch the payment associated with the order
                $payment = $api->payment->fetch($payment_Id);
                
                // Check if the payment was successful before refunding
                if ($payment->status === 'captured') {
                    $refund = $payment->refund(); // Initiate refund
                    echo json_encode(['status' => 'success', 'message' => 'Order canceled and refunded successfully']);
                } else {
                    echo json_encode(['status' => 'error', 'message' => 'Order canceled, but payment status is not captured, refund not initiated']);
                }
            } catch (Exception $e) {
                echo json_encode(['status' => 'error', 'message' => 'Order canceled, but failed to refund: ' . $e->getMessage()]);
            }
        } else {
            // Send failure response
            echo json_encode(['status' => 'error', 'message' => 'Failed to cancel the order']);
        }
    } else {
        // If order ID does not exist
        echo json_encode(['status' => 'error', 'message' => 'The id provided does not exist']);
    }
}
?>
