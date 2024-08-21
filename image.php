<?php
// Database connection
$conn = new mysqli('localhost', 'root', '', 'practice');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch the row containing the image names
$sql = "SELECT images_column FROM images WHERE id = 2"; // Adjust the WHERE clause as needed
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $imageNames = explode(",", $row['images_column']);

    // Display each image
    foreach ($imageNames as $imageName) {
        echo "<img src='uploads/$imageName' alt='$imageName' />";
    }
} else {
    echo "No images found.";
}

$conn->close();
?>
