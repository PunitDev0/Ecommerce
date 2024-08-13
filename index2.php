<?php
// Connect to MySQL
$mysqli = new mysqli("localhost", "root", "", "details");

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Retrieve data from the database
$result = $mysqli->query("SELECT name, description FROM products WHERE id = 1");

// Fetch the result
$row = $result->fetch_assoc();
$name = $row['name'];
$description = $row['description'];

// Close the connection
$mysqli->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Details</title>
</head>

<body>
    <h2><?php echo htmlspecialchars($name); ?></h2>
    <div>
        <h3>About this item</h3>
        <ul>
            <?php
            // Split the description by line breaks and display each as a list item
            $bullet_points = explode('<br />', $description);
            foreach ($bullet_points as $point) {
                echo '<li>' . htmlspecialchars($point) . '</li>';
            }
            ?>
        </ul>
    </div>
</body>

</html>
