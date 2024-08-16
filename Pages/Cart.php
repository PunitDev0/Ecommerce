<?php
session_start();
$conn = mysqli_connect('localhost', 'root', '', 'userinfo');

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Initialize cart session if not already set
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Function to add product to cart
function addToCart($product_id, $quantity) {
    global $conn;
    
    // Assuming $table is available in session or you need to set a default table
    $table = isset($_SESSION['page']) ? $_SESSION['page'] : 'polo_item'; // Default table if not set
    
    // Use backticks to properly format the table name
    $product_query = mysqli_query($conn, "SELECT * FROM `$table` WHERE id = $product_id");
    
    if (!$product_query) {
        die("Query failed: " . mysqli_error($conn));
    }

    $product = mysqli_fetch_assoc($product_query);

    if ($product) {
        $cart_item = [
            'id' => $product['id'],
            'name' => $product['product_name'],
            'price' => $product['product_price'],
            'image' => $product['product_image'],
            'quantity' => $quantity,
        ];

        // Add or update cart item
        $_SESSION['cart'][$product_id] = $cart_item;
    }
}

// Function to remove product from cart
function removeFromCart($product_id) {
    if (isset($_SESSION['cart'][$product_id])) {
        unset($_SESSION['cart'][$product_id]);
    }
}

// Handle add to cart request
if (isset($_POST['add_to_cart'])) {
    $product_id = $_POST['product_id'];
    $quantity = $_POST['quantity'];
    addToCart($product_id, $quantity);
}

// Handle remove from cart request
if (isset($_POST['remove_from_cart'])) {
    $product_id = $_POST['product_id'];
    removeFromCart($product_id);
}

// Calculate total
$total = 0;
foreach ($_SESSION['cart'] as $item) {
    $total += $item['price'] * $item['quantity'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <link rel="stylesheet" href="../CSS/Details.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/locomotive-scroll@3.5.4/dist/locomotive-scroll.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
</head>
<body class="font-sans antialiased">

   <div class="MainCart">
    <div class="Navbar">
            <?php include './Navbar.php'; ?>
        </div>

        <main class="container mx-auto p-4">
            <div class="flex flex-wrap">
                <hr>
                <div class="w-full p-2 flex flex-col md:flex-row gap-10">
                    <div class="border-2 border-gray-200 shadow-lg p-4 flex-1">
                        <h1 class="text-2xl font-bold mb-4 opacity-60">Shopping Cart</h1>
                        <div class="cart-items">
                            <?php foreach ($_SESSION['cart'] as $item) { ?>
                                <div class="cart-item flex flex-col md:flex-row items-center mb-2 border-2 p-2">
                                    <div class="w-full md:w-2/12 bg-gray-200">
                                        <img src="../Admin/<?php echo $item['image']; ?>" alt="Product Image" class="w-full object-contain rounded h-full">
                                    </div>
                                    <div class="w-full md:w-2/4 pl-4 mt-2 md:mt-0">
                                        <h2 class="text-md font-bold"><?php echo $item['name']; ?></h2>
                                        <p class="text-lg text-red-600">$<?php echo $item['price']; ?></p>
                                    </div>
                                    <div class="w-full md:w-1/4 flex items-center mt-2 md:mt-0">
                                        <input type="number" value="<?php echo $item['quantity']; ?>" min="1" max="10" class="border p-2 rounded w-20 mr-4">
                                        <form method="POST" action="">
                                            <input type="hidden" name="product_id" value="<?php echo $item['id']; ?>">
                                            <button type="submit" name="remove_from_cart" class="remove-item bg-red-600 text-white py-2 px-4 rounded hover:bg-red-700 transition-all duration-300">Remove</button>
                                        </form>
                                    </div>
                                </div>
                            <?php } ?>
                            <a href="./Home.php">
                            <div class="flex items-center mt-4">
                                <i class='bx bx-chevron-left'></i>
                                <h1>Continue Shopping</h1>
                            </div>
                            </a>
                        </div>
                    </div>

                    <div class="max-w-sm w-full md:w-3/6 h-fit mx-auto p-4 bg-white border border-gray-200 rounded-lg shadow">
                        <div class="border-2 border-gray-200 rounded-lg shadow p-4">
                            <div class="flex justify-between mb-4">
                                <span>6 items</span>
                                <span>$<?php echo $total; ?></span>
                            </div>
                            <div class="flex justify-between mb-4">
                                <span>Shipping</span>
                                <span>$7.00</span>
                            </div>
                            <div class="flex justify-between mb-4 font-bold">
                                <span>Total (tax excl.)</span>
                                <span>$1,091.00</span>
                            </div>
                            <div class="flex justify-between mb-6">
                                <span>Taxes</span>
                                <span>$0.00</span>
                            </div>
                            <button class="w-full bg-black text-white py-2 rounded hover:bg-gray-800">
                                PROCEED TO CHECKOUT
                            </button>
                        </div>
                        
                        <div class="policies my-4 border-2 shadow-xl">
                            <div class="p-5 flex gap-3 items-center"><i class='bx bx-lock-alt text-red-500 text-3xl'></i><p>Security policy (edit with the Customer Reassurance module)</p></div>
                            <hr>
                            <div class="p-5 flex items-center gap-3"><i class='bx bxs-truck text-red-500 text-3xl'></i><p>Delivery policy (edit with the Customer Reassurance module)</p></div>
                            <hr>
                            <div class="p-5 flex items-center gap-3"><i class='bx bx-wallet-alt text-red-500 text-3xl'></i><p>Return policy (edit with the Customer Reassurance module)</p></div>
                        </div>
                    </div>
                </div>
            </div>
        </main>

        <div class="Footer">
            <?php include './Footer.html'; ?>
        </div>

   </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/locomotive-scroll@3.5.4/dist/locomotive-scroll.js" ></script>
<script src="../JS/loco.js"></script>
</html>
