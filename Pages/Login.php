<?php
session_start();
include './config.php';
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email =  $_POST['email'];
    $password =  $_POST['password'];


    $user = mysqli_query($conn, "SELECT * FROM user_info WHERE email = '$email'");
    $admin = mysqli_query($conn, "SELECT * FROM admin_info WHERE email = '$email'");

    if ($user || $admin) {
        if ($user_data = mysqli_fetch_assoc($user)) {
            $_SESSION['logged_in'] = true;
            // $_SESSION['user_id'] = $user_data['id'];
            // $_SESSION['user_name'] = $user_data['name'];
            // $_SESSION['user_email'] = $user_data['email'];
            // $_SESSION['user_image'] = $user_data['user_img'];
            foreach (['id', 'name', 'email', 'Mobile', 'password', 'user_img', 'office', 'username', 'wishlist', 'cart'] as $key) {
                $_SESSION[$key] = $user_data[$key];
            }
            header('Location: Home.php');
        } else if ($admin_data = mysqli_fetch_assoc($admin)) {
            $_SESSION['logged_in'] = true;
            $_SESSION['admin_id'] = $admin_data['id'];
            $_SESSION['admin_name'] = $admin_data['name'];
            $_SESSION['admin_email'] = $admin_data['email'];
            $_SESSION['admin_image'] = $admin_data['user_img'];
            header('Location: Home.php');
        } else {
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body class="bg-gray-100">
    <!-- <img src="../Assests/image/download.jpg" class=" h-full w-full absolute z-[-10]"> -->
    <div class="min-h-screen flex items-center shadow-2xl justify-center">
        <div class="bg-white shadow-lg rounded-lg overflow-hidden flex flex-col md:flex-row w-full max-w-4xl">
            <!-- Left Image Section -->
            <div class="hidden md:flex w-full md:w-1/2 bg-indigo-50 justify-center items-center">
                <img src="../Assests/image/pexels-mikhail-nilov-6893329.jpg" alt="Login " class="object-cover h-full w-full ">
            </div>
            <!-- Right Form Section -->
            <div class="w-full md:w-1/2 p-8">
                <div class="text-right">
                    <a href="./Signup.php" class="text-sm text-gray-500 hover:text-indigo-600">Don't you have an account? <span class="font-semibold">Sign up</span></a>
                </div>
                <h2 class="text-3xl font-bold text-gray-800 mb-6">Welcome Back</h2>
                <p class="text-sm text-gray-600 mb-8">Login to your account</p>
                <form action="#" method="POST">
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700" for="Email">Email</label>
                        <input id="username" name="email" type="email" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" placeholder="Your email" required>
                    </div>
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700" for="password">Password</label>
                        <input id="password" name="password" type="password" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" placeholder="Your password" required>
                        <a href="#" class="text-sm text-indigo-600 hover:text-indigo-800 mt-2 block">Forgot password?</a>
                    </div>
                    <button type="submit" class="w-full py-2 px-4 bg-indigo-600 text-white font-semibold rounded-md shadow hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Login</button>
                </form>
                <div class="mt-8">
                    <p class="text-sm text-gray-500 text-center">Login with</p>
                    <div class="flex justify-center space-x-4 mt-2">
                        <a href="google_auth.php" class="text-blue-600 hover:text-blue-800"> <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="20" height="20" viewBox="0 0 48 48">
                                <path fill="#fbc02d" d="M43.611,20.083H42V20H24v8h11.303c-1.649,4.657-6.08,8-11.303,8c-6.627,0-12-5.373-12-12	s5.373-12,12-12c3.059,0,5.842,1.154,7.961,3.039l5.657-5.657C34.046,6.053,29.268,4,24,4C12.955,4,4,12.955,4,24s8.955,20,20,20	s20-8.955,20-20C44,22.659,43.862,21.35,43.611,20.083z"></path>
                                <path fill="#e53935" d="M6.306,14.691l6.571,4.819C14.655,15.108,18.961,12,24,12c3.059,0,5.842,1.154,7.961,3.039	l5.657-5.657C34.046,6.053,29.268,4,24,4C16.318,4,9.656,8.337,6.306,14.691z"></path>
                                <path fill="#4caf50" d="M24,44c5.166,0,9.86-1.977,13.409-5.192l-6.19-5.238C29.211,35.091,26.715,36,24,36	c-5.202,0-9.619-3.317-11.283-7.946l-6.522,5.025C9.505,39.556,16.227,44,24,44z"></path>
                                <path fill="#1565c0" d="M43.611,20.083L43.595,20L42,20H24v8h11.303c-0.792,2.237-2.231,4.166-4.087,5.571	c0.001-0.001,0.002-0.001,0.003-0.002l6.19,5.238C36.971,39.205,44,34,44,24C44,22.659,43.862,21.35,43.611,20.083z"></path>
                            </svg>
                        </a>
                        <a href="#" class="text-blue-400 hover:text-blue-600"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="20" height="20" viewBox="0 0 48 48">
                                <linearGradient id="Ld6sqrtcxMyckEl6xeDdMa_uLWV5A9vXIPu_gr1" x1="9.993" x2="40.615" y1="9.993" y2="40.615" gradientUnits="userSpaceOnUse">
                                    <stop offset="0" stop-color="#2aa4f4"></stop>
                                    <stop offset="1" stop-color="#007ad9"></stop>
                                </linearGradient>
                                <path fill="url(#Ld6sqrtcxMyckEl6xeDdMa_uLWV5A9vXIPu_gr1)" d="M24,4C12.954,4,4,12.954,4,24s8.954,20,20,20s20-8.954,20-20S35.046,4,24,4z"></path>
                                <path fill="#fff" d="M26.707,29.301h5.176l0.813-5.258h-5.989v-2.874c0-2.184,0.714-4.121,2.757-4.121h3.283V12.46 c-0.577-0.078-1.797-0.248-4.102-0.248c-4.814,0-7.636,2.542-7.636,8.334v3.498H16.06v5.258h4.948v14.452 C21.988,43.9,22.981,44,24,44c0.921,0,1.82-0.084,2.707-0.204V29.301z"></path>
                            </svg></a>
                        <a href="#" class="text-red-500 hover:text-red-700"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="20" height="20" viewBox="0 0 50 50">
                                <path d="M 11 4 C 7.1456661 4 4 7.1456661 4 11 L 4 39 C 4 42.854334 7.1456661 46 11 46 L 39 46 C 42.854334 46 46 42.854334 46 39 L 46 11 C 46 7.1456661 42.854334 4 39 4 L 11 4 z M 11 6 L 39 6 C 41.773666 6 44 8.2263339 44 11 L 44 39 C 44 41.773666 41.773666 44 39 44 L 11 44 C 8.2263339 44 6 41.773666 6 39 L 6 11 C 6 8.2263339 8.2263339 6 11 6 z M 13.085938 13 L 22.308594 26.103516 L 13 37 L 15.5 37 L 23.4375 27.707031 L 29.976562 37 L 37.914062 37 L 27.789062 22.613281 L 36 13 L 33.5 13 L 26.660156 21.009766 L 21.023438 13 L 13.085938 13 z M 16.914062 15 L 19.978516 15 L 34.085938 35 L 31.021484 35 L 16.914062 15 z"></path>
                            </svg></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>