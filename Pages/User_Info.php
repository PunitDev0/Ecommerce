<?php
    session_start();
    include'./config.php';
    // echo $_SESSION['user_id'];
    $user_id = $_SESSION['user_id'];
    $query = mysqli_query($conn,"SELECT User_Address FROM user_info where id = $user_id");
    $query2 = mysqli_query($conn,"SELECT * FROM user_info where id = $user_id");
    $row = mysqli_fetch_array($query);
    $row2 = mysqli_fetch_array($query2);
    $user_address = json_decode($row['User_Address'], true);
    // print_r($user_address);
    // echo $row['name']
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
    <div class="min-h-screen flex flex-col md:flex-row">
        <!-- Sidebar -->
        <div class="bg-white shadow-md w-full mt-6 md:w-64 p-6">
            <div class="flex items-center space-x-4 shadow-xl mb-8">
            <div class="w-14 h-14 bg-gray-300 rounded-full overflow-hidden flex items-center justify-center">
                            <?php
                                if(isset($_SESSION['admin_image']) && !empty($_SESSION['admin_image'])) {
                                    echo '<img src="../images/user_images/' . $_SESSION['admin_image'] . '" alt="User Image" class="w-full h-full object-cover"/>';
                                } else if(isset($_SESSION['user_image']) && !empty($_SESSION['user_image'])){
                                    echo '<img src="' . $_SESSION['user_image'] . '" alt="User Image" class="w-full h-full object-cover"/>';
                                } else {
                                    echo '<img src="../images/default-user.png" alt="Default User Image" class="w-full h-full object-cover"/>';
                                }
                            ?>
                        </div>
                <div>
                    <h2 class="text-xl font-semibold">Puneet Kumar</h2>
                </div>
            </div>
            <nav>
                <ul class="space-y-4">
                    <li>
                        <a href="./MyOrders.php" class="flex items-center space-x-2 text-gray-700 hover:text-blue-600">
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
        <div class="flex-1 lg:p-6 md:p-4 p-2">
            <div class="max-w-3xl mx-auto bg-white rounded-lg shadow-md lg:p-6 md:p-4 p-2">
                <h2 class="text-2xl font-semibold mb-4">Personal Information</h2>
                <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                    <div>
                        <label class="block text-gray-700">First Name</label>
                        <input type="text" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="<?php echo $user_address['fname']?>">
                    </div>
                    <div>
                        <label class="block text-gray-700">Last Name</label>
                        <input type="text" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="<?php echo $user_address['lname']?>">
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
                        <input type="email" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="<?php echo $row2['email']?>">
                    </div>
                    <div>
                        <label class="block text-gray-700">Mobile Number</label>
                        <input type="text" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="<?php echo $user_address['phone']?>">
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
