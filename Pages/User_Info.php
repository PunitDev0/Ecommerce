<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Information</title>
    <!-- Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <!-- Boxicons -->
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 font-sans antialiased">
    <div>
        <?php include'./Navbar.php'?>
    </div>
    <div class="min-h-screen flex">
        <!-- Sidebar -->
        <div class="bg-white shadow-md w-64 p-6  mt-6">
            <div class="flex items-center shadow-xl space-x-4 mb-8">
                <img class="w-12 h-12 rounded-full" src="https://via.placeholder.com/150" alt="User Avatar">
                <div>
                    <h2 class="text-xl font-semibold">Puneet Kumar</h2>
                </div>
            </div>
            <nav>
                <ul class="space-y-4">
                    <li>
                        <a href="#" class="flex items-center space-x-2 text-gray-700 hover:text-blue-600">
                            <i class='bx bx-home'></i>
                            <span>My Orders</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center space-x-2 text-gray-700 hover:text-blue-600">
                            <i class='bx bx-user'></i>
                            <span class="text-blue-600">Profile Information</span>
                        </a>
                    </li>
                    <li>
                        <a href="./User_Address.php" class="flex items-center space-x-2 text-gray-700 hover:text-blue-600">
                            <i class='bx bx-map'></i>
                            <span>Manage Addresses</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center space-x-2 text-gray-700 hover:text-blue-600">
                            <i class='bx bx-id-card'></i>
                            <span>PAN Card Information</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>

        <!-- Main Content -->
        <div class="flex-1 p-6">
            <div class="max-w-3xl mx-auto bg-white rounded-lg shadow-md p-6">
                <h2 class="text-2xl font-semibold mb-4">Personal Information</h2>
                <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                    <div>
                        <label class="block text-gray-700">First Name</label>
                        <input type="text" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Puneet">
                    </div>
                    <div>
                        <label class="block text-gray-700">Last Name</label>
                        <input type="text" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Kumar">
                    </div>
                    <div>
                        <label class="block text-gray-700">Your Gender</label>
                        <div class="flex space-x-4">
                            <label class="inline-flex items-center">
                                <input type="radio" class="form-radio" name="gender" value="Male">
                                <span class="ml-2">Male</span>
                            </label>
                            <label class="inline-flex items-center">
                                <input type="radio" class="form-radio" name="gender" value="Female">
                                <span class="ml-2">Female</span>
                            </label>
                        </div>
                    </div>
                    <div>
                        <label class="block text-gray-700">Email Address</label>
                        <input type="email" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="kumar.puneet@example.com">
                    </div>
                    <div>
                        <label class="block text-gray-700">Mobile Number</label>
                        <input type="text" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="+918376905677">
                    </div>
                </div>
                <button class="mt-6 px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">
                    Save Changes
                </button>
            </div>
        </div>
    </div>
</body>
</html>
