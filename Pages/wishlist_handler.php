<?php
include './config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $action = $_POST['action'];
    $product_id = $_POST['product_id'];
    $user_id = $_POST['user_id'];

    // Connect to the database
    if ($wishlist->connect_error) {
        die("Connection failed: " . $wishlist->connect_error);
    }

    if ($action == 'add') {
        $sql = "INSERT INTO wishlist_$user_id (product_id) VALUES ($product_id)";
    } elseif ($action == 'remove') {
        $sql = "DELETE FROM wishlist_$user_id WHERE product_id = $product_id";
    }

    if ($wishlist->query($sql) === TRUE) {
        echo "Success";
    } else {
        echo "Error: " . $sql . "<br>" . $wishlist->error;
    }

    $wishlist->close();
}
?>
