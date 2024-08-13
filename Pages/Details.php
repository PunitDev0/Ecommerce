<?php
session_start();
$conn = mysqli_connect('localhost', 'root', '', 'product_info');

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// if (isset($_SESSION['page'])) {
//     $table = $_SESSION['page'];
// } else {
//     $table = 'polo_item'; // Default table
// }
$product_id = isset($_GET['id']) ? intval($_GET['id']) : 0;
// echo $product_id;
$product_query = mysqli_query($conn, "SELECT * FROM product_item WHERE product_id = $product_id");
$product = mysqli_fetch_assoc($product_query);

// print_r($product);
// echo $product['product_id']
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Page</title>
    <link rel="stylesheet" href="../CSS/Details.css">
    <link rel="stylesheet" href="../CSS/Swiper3.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/locomotive-scroll@3.5.4/dist/locomotive-scroll.css">
    <script src="https://cdn.tailwindcss.com"></script>


</head>
<body class="font-sans antialiased">
    <div class="MainDetails">
            <div class="Navbar">
                <?php include './Navbar.php'; ?>
            </div>

            <main class="container mx-auto p-4">
                <div class="flex flex-wrap">
                    <div class="w-full md:w-1/2 p-2">
                        <div class="product-images">
                            <div class="main-image mb-4">
                                <img src="../Images/Product_images/<?php echo $product['product_image']; ?>" alt="Product Image" class="w-full h-auto object-contain rounded">
                            </div>
                            <div class="swiper mySwiper4">
                                <div class="swiper-wrapper flex justify-center gap-10">
                                    <?php
                                        $related_items = mysqli_query($conn, "SELECT * FROM product_images where pr_id = $product_id");
                                        while ($related_item = mysqli_fetch_array($related_items)) {
                                    ?>
                                        <div class="swiper-slide flex justify-center items-center">
                                            <div class="image w-24 h-24 md:w-32 md:h-32">
                                                <img src="../Images/Product_images/RF_images/<?php echo $related_item['pr_img'];?>" class="w-full h-full object-contain rounded" alt="" />
                                            </div>
                                        </div>
                                    <?php
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="w-full md:w-1/2 p-2">
                        <div class="product-details">
                            <h1 class="text-3xl font-bold mb-2"><?php echo $product['product_name']; ?></h1>
                            <p class="text-2xl text-red-600 mb-2">$<?php echo $product['product_price']; ?></p>
                            <p class="text-red-600 font-bold mb-4">HURRY! ONLY 3 ITEMS LEFT IN STOCK</p>
                            <div class="delivery-info mb-4 border-2 p-3 flex items-center gap-3">
                                <i class='bx bxs-truck text-5xl'></i>
                                <div class="div">
                                    <p class="font-bold">Delivery: 3 Working Days</p>
                                    <hr>
                                    <p class="font-bold">Expected Delivery Date is 31st July, 2024</p>
                                </div>
                            </div>
                            <form action="Cart.php" method="POST">
                                <div class="quantity mb-4">
                                    <label for="quantity" class="block mb-2">Quantity</label>
                                    <input type="number" id="quantity" name="quantity" min="1" max="10" value="1" class="border p-2 rounded w-20">
                                </div>
                                <input type="hidden" name="product_id" value="<?php echo $product['product_id']; ?>">
                                <button type="submit" name="add_to_cart" class="add-to-cart bg-black text-white py-2 px-4 rounded">ADD TO CART</button>
                            </form>
                            <div class="policies my-4 border-2 shadow-xl">
                                <div class="p-5 flex gap-3 items-center"><i class='bx bx-lock-alt text-red-500 text-3xl'></i><p>Security policy (edit with the Customer Reassurance module)</p></div>
                                <hr>
                                <div class="p-5 flex items-center gap-3"><i class='bx bxs-truck text-red-500 text-3xl'></i><p>Delivery policy (edit with the Customer Reassurance module)</p></div>
                                <hr>
                                <div class="p-5 flex items-center gap-3"><i class='bx bx-wallet-alt text-red-500 text-3xl'></i><p>Return policy (edit with the Customer Reassurance module)</p></div>
                            </div>
                            <div class="share mt-4">
                                <p class="mb-2">Share:</p>
                                <button class="bg-blue-600 text-white py-2 px-4 rounded mr-2">Facebook</button>
                                <button class="bg-blue-400 text-white py-2 px-4 rounded mr-2">Twitter</button>
                                <button class="bg-red-600 text-white py-2 px-4 rounded">Pinterest</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="product-tabs mt-8">
                    <div class="tab mb-4">
                        <button class="tablinks bg-gray-200 py-2 px-4 rounded-l" onclick="openTab(event, 'Description')">Description</button>
                        <button class="tablinks bg-gray-200 py-2 px-4" onclick="openTab(event, 'ProductDetails')">Product Details</button>
                        
                    </div>
                    <div id="Description" class="tabcontent">
                    <h3 class="text-xl font-bold mb-6">About this item</h3>
                            <ul>
                                <?php
                                $bullet_points = explode('<br />', $product['product_details']);
                                foreach ($bullet_points as $point) {
                                    echo '<li class="mb-4">' . htmlspecialchars($point) .'</li>';
                                }
                                ?>
                            </ul>
                    </div>
                    <div id="ProductDetails" class="tabcontent">
                        <p>Product details content goes here...</p>
                    </div>
                    
                </div>
                
                <div class="NewProduct mt-12 p-10">
                    <h1 class="text-center text-3xl mb-10">NEW PRODUCTS</h1>
                    <?php include '../Swipers/Swiper3.php'; ?>
                </div>
            </main>

            <div class="Footer">
                <?php include './Footer.php'; ?>
            </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script>
        function openTab(evt, tabName) {
            var i, tabcontent, tablinks;

            // Hide all tab contents
            tabcontent = document.getElementsByClassName("tabcontent");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }

            // Remove the active class from all tablinks
            tablinks = document.getElementsByClassName("tablinks");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" active", "");
            }

            // Show the current tab and add an active class to the button that opened the tab
            document.getElementById(tabName).style.display = "block";
            evt.currentTarget.className += " active";
        }

        var swiper = new Swiper(".mySwiper4", {
            slidesPerView: 4,
            spaceBetween: 30,
            grabCursor: true,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
        });

        // Default open the first tab
        document.getElementsByClassName('tablinks')[0].click();
    </script>
</body>
<script src="https://cdn.jsdelivr.net/npm/locomotive-scroll@3.5.4/dist/locomotive-scroll.js" ></script>
<script src="../JS/loco.js"></script>
</html>
