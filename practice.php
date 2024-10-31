<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Orders</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Custom animation for expanding and collapsing */
        .expand-collapse {
            transition: max-height 0.3s ease-in-out;
        }
    </style>
</head>
<body class="bg-gray-100 font-sans antialiased">
<?php include 'Navbar.php'?>
    <!-- Container -->
    <div class="max-w-4xl mx-auto p-4">
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
        <div id="orders">
            <!-- Sample Order -->
             
            <div class="bg-white shadow-lg rounded-lg p-4 mb-4 hover:shadow-2xl transition-shadow duration-300">
                <div class="flex justify-between items-center border-b pb-3 mb-3">
                    <div>
                        <p class="text-sm font-medium text-gray-800">Order #ORD001</p>
                        <p class="text-xs text-gray-600">Ordered on 2023-05-15</p>
                    </div>
                    <div class="text-right">
                        <span class="bg-green-100 text-green-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-full">Delivered</span>
                        <p class="text-sm font-semibold text-gray-800">Total: $129.99</p>
                    </div>
                </div>

                <!-- Product Details (Initially Collapsed) -->
                <div id="order-details-1" class="max-h-0 overflow-hidden expand-collapse">
                    <!-- Product 1 -->
                    <div class="flex items-start space-x-3 border-t pt-3">
                        <!-- Product Image Placeholder -->
                        <div class="w-12 h-12 rounded-md bg-gray-300 flex items-center justify-center">
                            <svg class="w-4 h-4 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <rect x="2" y="7" width="20" height="14" rx="2" ry="2"></rect>
                                <path d="M16 2h-4v4h4V2z"></path>
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-800">Stylish Watch</p>
                            <p class="text-xs text-gray-600">Quantity: 1</p>
                            <p class="text-sm font-semibold text-gray-800">$99.99</p>
                        </div>
                    </div>

                    <!-- Additional Product Details -->
                    <div class="mt-3">
                        <p class="text-xs text-gray-600">Shipping: $5.00</p>
                        <p class="text-xs text-gray-600">Tax: $5.00</p>
                        <p class="text-sm font-semibold text-gray-800">Grand Total: $109.99</p>
                    </div>

                    <!-- Ratings -->
                    <div class="mt-3">
                        <h3 class="text-sm font-semibold text-gray-800 mb-2">Rate the Product:</h3>
                        <div class="flex space-x-1">
                            <button class="text-yellow-500 text-xs">★</button>
                            <button class="text-yellow-500 text-xs">★</button>
                            <button class="text-yellow-500 text-xs">★</button>
                            <button class="text-yellow-500 text-xs">★</button>
                            <button class="text-gray-300 text-xs">★</button>
                        </div>
                    </div>
                </div>

                <!-- Toggle Button -->
                <div class="mt-3 text-center">
                    <button onclick="toggleDetails(1)" class="text-xs text-gray-600 font-medium hover:text-gray-900 focus:outline-none flex items-center justify-center transition-all duration-300">
                        Show Details 
                        <svg class="w-3 h-3 ml-1 transition-transform duration-300" id="toggle-icon-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="6 9 12 15 18 9"></polyline>
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Additional Orders can be added similarly -->
        </div>
    </div>
    <?php include 'Footer.php'?>

    <script>
        // Toggle order details functionality
        function toggleDetails(orderId) {
            const details = document.getElementById('order-details-' + orderId);
            const icon = document.getElementById('toggle-icon-' + orderId);

            // Check if the details are currently hidden
            if (details.style.maxHeight && details.style.maxHeight !== '0px') {
                details.style.maxHeight = '0';
                icon.style.transform = 'rotate(0deg)';
            } else {
                details.style.maxHeight = details.scrollHeight + 'px';
                icon.style.transform = 'rotate(180deg)';
            }
        }
    </script>
</body>
</html>
