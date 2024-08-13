<?php
    session_start();
    $conn = mysqli_connect('localhost', 'root', '', 'user');

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
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
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
            $query = "INSERT INTO user_info (name, email, password, user_img) VALUES ('$username', '$email', '$password', '$image')";

            mysqli_query($conn, $query);
            header("Location: Login.php");

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

