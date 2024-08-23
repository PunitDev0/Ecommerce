<?php
session_start();
include './config.php';
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email =  $_POST['email'];
    $password =  $_POST['password'];
    

    $user = mysqli_query($conn,"SELECT * FROM user_info WHERE email = '$email'");
    $admin = mysqli_query($conn,"SELECT * FROM admin_info WHERE email = '$email'");
    
    if($user || $admin){
        if($user_data = mysqli_fetch_assoc($user)){
                $_SESSION['logged_in'] = true;
                $_SESSION['user_id'] = $user_data['id'];
                $_SESSION['user_name'] = $user_data['name'];
                $_SESSION['user_email'] = $user_data['email'];
                $_SESSION['user_image'] = $user_data['user_img'];
                header('Location: Home.php');
            }else if($admin_data = mysqli_fetch_assoc($admin)){
                $_SESSION['logged_in'] = true;
                $_SESSION['admin_id'] = $admin_data['id'];
                $_SESSION['admin_name'] = $admin_data['name'];
                $_SESSION['admin_email'] = $admin_data['email'];
                $_SESSION['admin_image'] = $admin_data['user_img'];
                header('Location: Home.php');
            }else{
                
            }
        }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex flex-col min-h-screen">
    <div class="Navbar">
        <?php include './Navbar.php'; ?>
    </div>
    <div class="flex-grow flex justify-center items-center py-16">
        <div class="bg-white p-12 rounded-lg shadow-lg w-full max-w-md mx-4 border-2">
            <h2 class="text-2xl font-bold mb-6 text-center">Login</h2>
            <form action="#" method="POST">
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" id="email" name="email" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-black focus:border-black sm:text-sm">
                </div>
                <div class="mb-6">
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <input type="password" id="password" name="password" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-black focus:border-black sm:text-sm">
                </div>
                <button type="submit" class="w-full bg-black text-white py-2 px-4 rounded-md hover:bg-gray-800">Login</button>
                <p>Already Have Account ?<span><a href="./Signup.php" class="text-blue-800">Signup</a></span> </p>

            </form>
        </div>
    </div>
    <div class="">
        <?php include './Footer.php'; ?>
    </div>
</body>
</html>
