<?php
// Connect to MySQL
$mysqli = new mysqli("localhost", "root", "", "details");

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Retrieve data from the form
$name = $_POST['name'];
$description = nl2br($_POST['description']); // Convert new lines to <br> for HTML display

// Insert data into the database
$stmt = $mysqli->prepare("INSERT INTO products (name, description) VALUES (?, ?)");
$stmt->bind_param("ss", $name, $description);
$stmt->execute();

// Close the connection
$stmt->close();
$mysqli->close();

// Redirect or display a success message
echo "Product details have been stored successfully!";
?>
