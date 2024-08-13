<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Details Form</title>
</head>

<body>
    <h2>Enter Product Details</h2>
    <form action="store_product.php" method="POST">
        <label for="name">Product Name:</label><br>
        <input type="text" id="name" name="name" required><br><br>

        <label for="description">Product Description:</label><br>
        <textarea id="description" name="description" rows="10" cols="50" placeholder="Enter bullet points here, each on a new line" required></textarea><br><br>

        <input type="submit" value="Submit">
    </form>
</body>

</html>
