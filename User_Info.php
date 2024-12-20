<?php
session_start();
include './config.php'; // Replace with your database connection

// Ensure the user is logged in and session contains user_id
if (isset($_SESSION['id'])) {
    $user_id = $_SESSION['id'];

    // Fetch the current profile information
    $sql = "SELECT Personal_info FROM user_info WHERE id = ?";
    
    if ($stmt = $conn->prepare($sql)) {
        // Bind the user ID to the query
        $stmt->bind_param("i", $user_id);

        // Execute the query
        $stmt->execute();

        // Bind the result to a variable
        $stmt->bind_result($profile_info_json);

        if ($stmt->fetch()) {
            $profile_info = json_decode($profile_info_json, true);
        }

        // Close the statement
        $stmt->close();
    }

    // Check if the form was submitted
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Retrieve form data
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $gender = $_POST['gender'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];

        // Create a JSON object with the profile data
        $profile_data = json_encode([
            'first_name' => $first_name,
            'last_name' => $last_name,
            'gender' => $gender,
            'email' => $email,
            'phone' => $phone
        ]);

        // SQL query to update the user's profile info
        $sql = "UPDATE user_info SET Personal_info = ? WHERE id = ?";

        if ($stmt = $conn->prepare($sql)) {
            // Bind parameters and execute
            $stmt->bind_param("si", $profile_data, $user_id);

            if ($stmt->execute()) {
                // Success message
                echo "Profile updated successfully.";
            } else {
                // Error message
                echo "Error updating profile: " . $stmt->error;
            }

            // Close the statement
            $stmt->close();
        }

        // Close the connection
        $conn->close();
    }
} else {
    echo "User not logged in.";
}
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
        <?php include './Navbar.php' ?>
    </div>
    <div class="min-h-screen flex flex-col md:flex-row">

        <!-- Main Content -->
        <div class="flex-1 lg:p-6 md:p-4 p-2">
            <div class="max-w-3xl mx-auto bg-white rounded-lg shadow-md lg:p-6 md:p-4 p-2">
                <h2 class="text-2xl font-semibold mb-4">Personal Information</h2>
                <form method="POST">
                    <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                        <div>
                            <label class="block text-gray-700">First Name</label>
                            <input type="text" name="first_name" 
                                   value="<?php echo !empty($profile_info['first_name']) ? $profile_info['first_name'] : ''; ?>" 
                                   class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>
                        <div>
                            <label class="block text-gray-700">Last Name</label>
                            <input type="text" name="last_name" 
                                   value="<?php echo !empty($profile_info['last_name']) ? $profile_info['last_name'] : ''; ?>" 
                                   class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>
                        <div>
                            <label class="block text-gray-700">Your Gender</label>
                            <div class="flex space-x-4">
                                <label class="inline-flex items-center">
                                    <input type="radio" name="gender" value="Male" <?= (!empty($profile_info['gender']) && $profile_info['gender'] == "Male") ? "checked" : ""; ?>>
                                    <span class="ml-2">Male</span>
                                </label>
                                <label class="inline-flex items-center">
                                    <input type="radio" name="gender" value="Female" <?= (!empty($profile_info['gender']) && $profile_info['gender'] == "Female") ? "checked" : ""; ?>>
                                    <span class="ml-2">Female</span>
                                </label>
                            </div>
                        </div>
                        <div>
                            <label class="block text-gray-700">Email Address</label>
                            <input type="email" name="email" 
                                   value="<?php echo !empty($profile_info['email']) ? $profile_info['email'] : ''; ?>" 
                                   class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>
                        <div>
                            <label class="block text-gray-700">Mobile Number</label>
                            <input type="text" name="phone" 
                                   value="<?php echo !empty($profile_info['phone']) ? $profile_info['phone'] : ''; ?>" 
                                   class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>
                    </div>
                    <button type="submit" class="mt-6 px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">
                        Save Changes
                    </button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
