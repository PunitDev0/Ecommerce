<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
session_start();

$mail = new PHPMailer(true);

$conn = mysqli_connect('localhost', 'root', '', 'user');
$wishlistConn = mysqli_connect('localhost', 'root', '', 'user_wishlist');
$CartConn = mysqli_connect('localhost', 'root', '', 'user_cart');

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // Handle file upload
    // $target_dir = "../Images/user_images/";
    // $target_file = $target_dir . basename($_FILES["image"]["name"]);
    // $check = getimagesize($_FILES["image"]["tmp_name"]);

    // if ($check !== false) {
    //     if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
    //         $image = $target_file;
    //     } else {
    //         echo "Sorry, there was an error uploading your file.";
    //         exit;
    //     }
    // } else {
    //     echo "File is not an image.";
    //     exit;
    // }

    // Check if the email already exists
    $check_email_query = "SELECT * FROM user_info WHERE email = '$email'";
    $result = mysqli_query($conn, $check_email_query);

    if (mysqli_num_rows($result) > 0) {
        echo "Email already exists!";
    } else {
        // Insert user info into the database
        $query = "INSERT INTO user_info (name, email, password) VALUES ('$username', '$email', '$password')";
        if (mysqli_query($conn, $query)) {
            $user_id = mysqli_insert_id($conn);

            // Create wishlist and cart tables
            $wishlist_table = "CREATE TABLE IF NOT EXISTS wishlist_$user_id (
                id INT AUTO_INCREMENT PRIMARY KEY,
                user_id INT NOT NULL,
                product_id INT NOT NULL
            )";
            mysqli_query($wishlistConn, $wishlist_table);

            $cart_table = "CREATE TABLE IF NOT EXISTS cart_$user_id (
                id INT AUTO_INCREMENT PRIMARY KEY,
                product_id INT NOT NULL,
                quantity INT NOT NULL,
            )";
            mysqli_query($CartConn, $cart_table);

            // Generate OTP
            $otp = rand(100000, 999999);
            $_SESSION['otp'] = $otp;
            $_SESSION['otp_expiration'] = time() + 300;

            $to = $email;
            $subject = "Your OTP Code";
            $message = "Your OTP code is $otp. It will expire in 5 minutes.";
            $headers = "From: no-reply@example.com";

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                try {
                    // eyzm wyiz cfpx ymis
                    // SMTP configuration
                    $mail->isSMTP();
                    $mail->Host = 'smtp.gmail.com'; 
                    $mail->SMTPAuth = true;
                    $mail->Username = 'punitdeveloper1@gmail.com'; // Your Gmail address
                    $mail->Password = 'eyzmwyizcfpxymis'; // Your Gmail password (or app password)
                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
                    $mail->Port = 465;
                
                    // Recipients
                    $mail->setFrom('punitdeveloper1@gmail.com', 'Stoods Styling'); // Sender's email and name
                    $mail->addAddress($email); // Add a recipient
                
                    // Content
                    $mail->isHTML(true);
                    $mail->Subject = 'Your OTP Code';
                    $mail->Body = "Your OTP code is $otp. It will expire in 5 minutes.";
                    
                    // Send the email
                    $mail->send();
                    echo 'OTP sent to your email. Please verify to complete the registration.';
                    header("Location: VerifyOTP.php"); // Redirect to OTP verification page
                    exit;
                } catch (Exception $e) {
                    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                }
            } else {
                echo "Failed to send OTP. Please try again.";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="">
    <div class="min-h-screen flex items-center shadow-2xl justify-center">
        <div class="bg-white shadow-lg rounded-lg overflow-hidden flex flex-col md:flex-row w-full max-w-4xl">
            <!-- Left Image Section -->
            <div class="hidden md:flex w-full md:w-1/2 bg-indigo-50 justify-center items-center">
                <img src="../Assests/image/pexels-mikhail-nilov-6893329.jpg" alt="Login " class="object-cover h-full w-full ">
            </div>
            <!-- Right Form Section -->
            <div class="w-full md:w-1/2 p-8">
                <div class="text-right">
                    <a href="./Login.php"text-sm text-gray-500 hover:text-indigo-600">Don't you have an account? <span class="font-semibold">Login</span></a>
                </div>
                <h2 class="text-3xl font-bold text-gray-800 mb-6">Welcome Back</h2>
                <p class="text-sm text-gray-600 mb-8">Login to your account</p>
                <form action="#" method="POST">
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700" for="Email">Username</label>
                        <input id="username" name="username" type="username" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" placeholder="Your email" required>
                    </div>
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
                        <a href="#" class="text-blue-600 hover:text-blue-800"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="text-blue-400 hover:text-blue-600"><i class="fab fa-linkedin-in"></i></a>
                        <a href="#" class="text-red-500 hover:text-red-700"><i class="fab fa-google"></i></a>
                    </div>
                </div>
            </div>
        </div>
</body>
<script>
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
</script>
</html>
