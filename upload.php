<?php
if (isset($_POST['submit'])) {
    $uploadDir = "uploads/"; // Folder to store images
    $imageNames = []; // Array to store image names

    // Database connection
    $conn = new mysqli('localhost', 'root', '', 'practice');

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Loop through each file
    foreach ($_FILES['images']['tmp_name'] as $key => $tmp_name) {
        $fileName = basename($_FILES['images']['name'][$key]);
        $targetFilePath = $uploadDir . $fileName;

        // Move the file to the server
        if (move_uploaded_file($tmp_name, $targetFilePath)) {
            // Escape the filename to prevent SQL injection or syntax errors
            $safeFileName = $conn->real_escape_string($fileName);
            $imageNames[] = $safeFileName;
        }
    }

    // Convert the array of image names to a comma-separated string
    $imageNamesString = implode(",", $imageNames);

    // Insert the image names into the database
    $sql = "INSERT INTO images (images_column) VALUES ('$imageNamesString')";

    if ($conn->query($sql) === TRUE) {
        echo "Images uploaded and stored successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
