<?php
session_start();
include './config.php'; // Include your database connection file

// Fetch user ID from session or other logic
$user_id = $_SESSION['user_id'];

// Query to get user orders and associated product details
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Orders</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <!-- Boxicons -->
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100 font-sans antialiased">
    <div>
        <?php include './Navbar.php' ?>
    </div>
    
    <div class="max-w-6xl mx-auto p-4">
        <!-- Page Title -->
        <h1 class="text-2xl font-semibold text-gray-800 mb-4">My Orders</h1>

        <!-- User Information -->
        <div class="bg-white shadow-lg rounded-lg p-4 mb-4 hover:shadow-2xl transition-shadow duration-300">
            <h2 class="text-lg font-medium text-gray-700 mb-3">User Information</h2>
            <div class="flex items-center space-x-3">
                <!-- Placeholder for Profile Image -->
                <div class="w-10 h-10 rounded-full bg-gray-300 flex items-center justify-center">
                    <svg class="w-5 h-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="12" r="10"></circle>
                        <path d="M14 14s-1.5-2-4-2-4 2-4 2"></path>
                        <line x1="12" y1="10" x2="12" y2="10"></line>
                    </svg>
                </div>
                <div>
                    <p class="text-sm font-medium text-gray-800">John Doe</p>
                    <p class="text-xs text-gray-600">john.doe@example.com</p>
                </div>
            </div>
        </div>

        <!-- Order List -->
        <?php
        $query = "SELECT * FROM product_info.user_order AS w 
                        LEFT JOIN product_info.product_item AS pr 
                        ON w.product_id = pr.product_id 
                        WHERE user_id = '$user_id'";
        $result = mysqli_query($product_info, $query);
        while ($row = mysqli_fetch_assoc($result)) {
        ?>
            <a href="./OrderDetails.php?product_id=<?php echo urlencode($row['product_id']); ?>" class="order-link">
                <!-- Order Item -->
                <div class="bg-white shadow-lg rounded-lg p-4 mb-4 hover:shadow-2xl transition-shadow duration-300">
                    <div class="flex justify-between items-center border-b pb-3 mb-3">
                        <div>
                            <p class="text-sm font-medium text-gray-800">Order: #<?php echo $row['razorpay_order_id'] ?></p>
                            <p class="text-xs text-gray-600">Ordered on <?php echo $row['created_at'] ?></p>
                        </div>
                        <div class="text-right">
                            <span class="bg-green-100 text-green-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-full">Delivered</span>
                            <p class="text-sm font-semibold text-gray-800">Total: $129.99</p>
                        </div>
                    </div>

                    <!-- Product Details (Initially Collapsed) -->
                    <div class="order-details overflow-hidden transition-all duration-300">
                        <div class="flex items-start space-x-3 border-t pt-3">
                            <!-- Product Image -->
                            <div class="w-12 h-12 rounded-md bg-gray-300 flex items-center justify-center">
                                <img src="../Images/Product_images/<?php echo $row['product_image'] ?>" alt="Product Image">
                            </div>
                            <div>
                                <p class="text-sm font-medium text-gray-800"><?php echo $row['product_name'] ?></p>
                                <p class="text-xs text-gray-600">Quantity: 1</p>
                                <p class="text-sm font-semibold text-gray-800">$<?php echo $row['product_price'] ?></p>
                            </div>
                        </div>

                        <!-- Additional Product Details -->
                        <div class="mt-3">
                            <p class="text-xs text-gray-600">Shipping: $5.00</p>
                            <p class="text-xs text-gray-600">Tax: $5.00</p>
                            <p class="text-sm font-semibold text-gray-800">Grand Total: $109.99</p>
                        </div>
        </a>
                        <!-- Ratings -->
                        <div class="mt-3 ">
                            <h3 class="text-sm font-semibold text-gray-800 mb-2">Rate the Product:</h3>
                            <div class="flex space-x-1">
                                <button class="text-yellow-500 text-xs">★</button>
                                <button class="text-yellow-500 text-xs">★</button>
                                <button class="text-yellow-500 text-xs">★</button>
                                <button class="text-yellow-500 text-xs">★</button>
                                <button class="text-gray-300 text-xs">★</button>
                            </div>
                            <div class="relative flex justify-end">
                                <?php if($row['status'] !== "Canceled"){?>
                                <button data-order-id="<?php echo $row['razorpay_order_id']; ?>" data-payment-id="<?php echo $row['razorpay_payment_id']; ?>"  class="cancel-order-btn border py-2 px-5 rounded-xl hover:bg-gray-200 ease-in-out transition">
                                    Canceled
                                </button>
                                <?php
                                }else{
                                    echo '<span class="text-gray-500">Order Canceled</span>';
                                }?>
                            </div>
                        </div>
                    </div>
                </div>
        <?php } ?>
    </div>
    <?php include 'footer.php'; ?>
</body>
<script>
    $(document).ready(function () {
        // Cancel Order
        $(".cancel-order-btn").click(function (e) {
            e.preventDefault();
            const orderId = $(this).data('order-id');
            const paymentId = $(this).data('payment-id');
            console.log(orderId);
            
            // SweetAlert confirmation dialog
            Swal.fire({
                title: 'Are you sure?',
                text: "Do you really want to cancel this order?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes, cancel it!',
                cancelButtonText: 'No, keep it'
            }).then((result) => {
                if (result.isConfirmed) {
                    // AJAX request to cancel the order if confirmed
                    $.ajax({
                        url: 'cancel_order.php', // Path to your PHP script
                        method: 'POST',
                        data: { order_id: orderId, payment_Id: paymentId },
                        dataType: 'json',
                        success: function (response) {
                            console.log(response);
                            
                            // Handle success and error responses
                            Swal.fire(
                                response.status === 'success' ? 'Canceled!' : 'Error',
                                response.message,
                                response.status === 'success' ? 'success' : 'error'
                            );

                            // Reload the page if the order is successfully canceled
                            if (response.status === 'success') {
                                setTimeout(function() {
                                    location.reload(); // Reload the page to reflect the cancellation
                                }, 1500);
                            }
                        },
                        error: function () {
                            Swal.fire('Error', 'Something went wrong. Please try again.', 'error');
                        }
                    });
                }
            });
        });
    });
</script>


</html>
