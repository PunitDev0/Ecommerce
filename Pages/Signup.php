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
    $target_dir = "../Images/user_images/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    $check = getimagesize($_FILES["image"]["tmp_name"]);

    if ($check !== false) {
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            $image = $target_file;
        } else {
            echo "Sorry, there was an error uploading your file.";
            exit;
        }
    } else {
        echo "File is not an image.";
        exit;
    }

    // Check if the email already exists
    $check_email_query = "SELECT * FROM user_info WHERE email = '$email'";
    $result = mysqli_query($conn, $check_email_query);

    if (mysqli_num_rows($result) > 0) {
        echo "Email already exists!";
    } else {
        // Insert user info into the database
        $query = "INSERT INTO user_info (name, email, password, user_img) VALUES ('$username', '$email', '$password', '$image')";
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
<body class="flex flex-col min-h-screen">
    <div class="Navbar">
        <?php include './Navbar.php'; ?>
    </div>
    <div class="flex-grow flex justify-center items-center py-16">
        <div class="bg-white p-12 rounded-lg shadow-lg w-full max-w-md mx-4 border-2">
            <h2 class="text-2xl font-bold mb-6 text-center">Signup</h2>
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="mb-4">
                    <label for="username" class="block text-sm font-medium text-gray-700">Username</label>
                    <input type="text" id="username" name="username" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-black focus:border-black sm:text-sm">
                </div>
                <div class="mb-6">
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" id="email" name="email" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-black focus:border-black sm:text-sm">
                </div>
                <div class="mb-6">
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <input type="password" id="password" name="password" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-black focus:border-black sm:text-sm">
                </div>
                <div class="mb-6">
                    <label for="image" class="block text-sm font-medium text-gray-700">Profile Image</label>
                    <input type="file" id="image" name="image" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-black focus:border-black sm:text-sm">
                </div>
                <button type="submit" class="w-full bg-black text-white py-2 px-4 rounded-md hover:bg-gray-800">Signup</button>
                <p>Already Have Account ? <span><a href="./Login.php" class="text-blue-800">Login</a></span></p>
            </form>
        </div>
    </div>
    <div class="">
        <?php include './Footer.php'; ?>
    </div>
</body>
<script>
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
</script>
</html>
