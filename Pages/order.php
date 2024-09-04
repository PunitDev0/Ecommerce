<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Order Page</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100">
    <!-- Header -->
    <header class="bg-white shadow p-4 flex justify-between items-center">
        <a href="#" class="text-2xl font-bold text-gray-900">Stoods Styling</a>
        <nav class="space-x-4">
            <a href="#" class="text-gray-700">Home</a>
            <a href="#" class="text-gray-700">Polos</a>
            <a href="#" class="text-gray-700">Watch</a>
            <a href="#" class="text-gray-700">Shoes</a>
            <a href="#" class="text-gray-700">Accessories</a>
            <a href="#" class="text-gray-700">Contact</a>
        </nav>
        <div class="space-x-4 flex items-center">
            <a href="#" class="text-gray-700"><i class="far fa-heart"></i></a>
            <a href="#" class="text-gray-700"><i class="fas fa-shopping-cart"></i></a>
            <a href="#" class="text-gray-700"><i class="fas fa-user"></i></a>
        </div>
    </header>

    <!-- Main Content -->
    <main class="container mx-auto p-6">
        <!-- Breadcrumb -->
        <nav class="text-gray-600 mb-6">
            <a href="#" class="text-blue-600">Home</a> / 
            <a href="#" class="text-blue-600">Fashion</a> / 
            <span class="text-gray-600">NETCLICK® Mens Solid Dotted Unique Design Tshirt</span>
        </nav>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            <!-- Product Image -->
            <div class="flex justify-center">
                <img src="path_to_image.jpg" alt="T-shirt" class="rounded-lg shadow-lg max-h-96">
            </div>

            <!-- Product Details -->
            <div>
                <h1 class="text-3xl font-bold text-gray-900 mb-4">NETCLICK® Mens Solid Dotted Unique Design Tshirt for Men - Round Neck Loose Fit Drop Shoulder Mens T-Shirt</h1>
                <p class="text-red-500 text-2xl font-semibold mb-2">$320.00</p>
                <p class="text-red-500 mb-4">HURRY! ONLY 3 ITEMS LEFT IN STOCK</p>

                <div class="border p-4 rounded-lg mb-4">
                    <p><strong>Delivery:</strong> 3 Working Days</p>
                    <p><strong>Expected Delivery Date:</strong> 31st July, 2024</p>
                </div>

                <!-- Quantity Selector -->
                <div class="mb-4">
                    <label for="quantity" class="block text-gray-700">Quantity</label>
                    <input type="number" id="quantity" name="quantity" value="1" min="1"
                        class="border border-gray-300 p-2 rounded-lg w-16">
                </div>

                <!-- Add to Cart Button -->
                <button
                    class="bg-black text-white px-4 py-2 rounded-lg shadow-lg hover:bg-gray-800 transition duration-200">
                    Add to Cart
                </button>
            </div>
        </div>

        <!-- Security Policy -->
        <div class="mt-8">
            <h2 class="text-xl font-semibold mb-2">Security Policy</h2>
            <p class="text-gray-700">This is a placeholder text for security policy. Replace it with your actual content.</p>
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-white shadow p-4 mt-10">
        <p class="text-center text-gray-600">&copy; 2024 Stoods Styling. All rights reserved.</p>
    </footer>

</body>

</html>
