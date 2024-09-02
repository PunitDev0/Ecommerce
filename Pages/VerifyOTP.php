<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $entered_otp = $_POST['otp'];

    if (isset($_SESSION['otp']) && isset($_SESSION['otp_expiration'])) {
        if ($entered_otp == $_SESSION['otp'] && time() <= $_SESSION['otp_expiration']) {
            // OTP is valid
            unset($_SESSION['otp']); // Clear OTP from session
            unset($_SESSION['otp_expiration']);
            header("Location: Login.php"); // Redirect to login page
            exit;
        } else {
            echo "Invalid OTP or OTP has expired.";
        }
    } else {
        echo "No OTP session found.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify OTP</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex flex-col min-h-screen">
    <div class="flex-grow flex justify-center items-center py-16">
        <div class="bg-white p-12 rounded-lg shadow-lg w-full max-w-md mx-4 border-2">
            <h2 class="text-2xl font-bold mb-6 text-center">Verify OTP</h2>
            <form action="" method="POST">
                <div class="mb-6">
                    <label for="otp" class="block text-sm font-medium text-gray-700">Enter OTP</label>
                    <input type="text" id="otp" name="otp" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-black focus:border-black sm:text-sm">
                </div>
                <button type="submit" class="w-full bg-black text-white py-2 px-4 rounded-md hover:bg-gray-800">Verify OTP</button>
            </form>
        </div>
    </div>
</body>
</html>
