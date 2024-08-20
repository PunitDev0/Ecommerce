<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" rel="stylesheet" />
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.2/gsap.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <title>Document</title>

</head>
    <style>
        .cart{
            scrollbar-width: none;
        }
    </style>
<body class="min-h-screen min-w-full font-poppins text-black">
    <div class="shadow-lg ">
        <div class="bg-gray-900 h-6 flex items-center justify-center">
            <h4 class="text-white text-center">Get Exclusive Discount 50%OFF</h4>
        </div>
        <nav id = "navbar" class="flex justify-between items-center h-20 px-3 md:px-12 relative bg-white">
            <div class="flex items-center" id="menu">
                <i class="bx bx-menu text-lg cursor-pointer md:hidden"></i>
                <div class="ml-4">
                    <a href="./Home.php"><img src="../Assests/image/logo.png" alt="Logo" class="h-12 opacity-60" /></a>
                </div>
            </div>
            <form id="nav-form" action="Product.php" method="GET">
                <input type="hidden" name="page" id="page-input" />
                <div class="hidden md:flex gap-6 text-sm font-medium" id="nav">
                    <a href="./Home.php">Home</a>
                    <a href="#"  onclick="submitForm('1')">Polos</a>
                    <a href="#" onclick="submitForm('2')">Watch</a>
                    <a href="#" onclick="submitForm('3')">Shoes</a>
                    <a href="#" onclick="submitForm('4')">Accessories</a>
                    <a href="#" onclick="submitForm('')">Contact</a>
                </div>
            </form>
            <div class="flex gap-5 text-2xl">
                <a href="#" class="hover:-translate-y-2 transition-transform"><i class="bx bx-heart"></i></a>
                <a href="#" class="hover:-translate-y-2 transition-transform"><i class="bx bx-cart"></i></a>
                <a href="#" class="hover:-translate-y-2 transition-transform"><i class="bx bxs-user"></i></a>
            </div>
        </nav>
        
        <div class="sub-menu absolute z-30 right-10 w-52 max-h-0 overflow-hidden transition-[max-height] duration-700 ease-in-out rounded-lg shadow-lg bg-white border border-gray-200">
            <div class="p-4">
                <!-- User Info -->
                <div class="flex items-center gap-4">
                    <div class="w-10 h-10 bg-gray-300 rounded-full overflow-hidden flex items-center justify-center">
                        <?php
                            if(isset($_SESSION['image']) && !empty($_SESSION['image'])) {
                                echo '<img src="' . $_SESSION['image'] . '" alt="User Image" class="w-full h-full object-cover"/>';
                            } else {
                                echo '<img src="../images/default-user.png" alt="Default User Image" class="w-full h-full object-cover"/>';
                            }
                        ?>
                    </div>
                    <h1 class="text-gray-900 font-medium"><?php echo $_SESSION['username'] ?? 'Guest'; ?></h1>
                </div>

                <!-- Divider -->
                <div class="w-full bg-gray-300 h-0.5 mt-4"></div>

                <!-- Menu Links -->
                <div class="mt-4 space-y-3">
                    <a href="./Personal_info.php" class="flex items-center gap-4 justify-between text-gray-700 hover:text-blue-500 transition-colors duration-300">
                        <div class="flex gap-2 items-center">
                            <i class="bx bxs-user-circle text-xl"></i>
                            <p>Edit Profile</p>
                        </div>
                        <i class="bx bx-chevron-right text-xl"></i>
                    </a>
                    <a href="./userAddress.php" class="flex items-center justify-between text-gray-700 hover:text-blue-500 transition-colors duration-300">
                        <div class="flex gap-2 items-center">
                            <i class="bx bx-map text-xl"></i>
                            <p>Address</p>
                        </div>
                        <i class="bx bx-chevron-right text-xl"></i>
                    </a>
                    <!-- Add more links as needed -->
                </div>

                <!-- Divider -->
                <div class="w-full bg-gray-300 h-0.5 mt-4"></div>

                <!-- Sign Out -->
                <div class="mt-4">
                    <a href="" class="flex gap-4 items-center text-red-500 hover:text-red-600 transition-colors duration-300">
                        <i class="bx bx-power-off text-xl"></i>
                        <p>Sign Out</p>
                    </a>
                </div>
            </div>
        </div>

    </div>
    <div class="sidebar fixed top-0 left-0 h-screen w-52 backdrop-blur-lg p-5 transform -translate-x-52 transition-transform duration-300 ease-in-out z-10 flex flex-col gap-4 md:hidden" id="sidebar">
        <div class="absolute right-3 top-3 cursor-pointer bx-close">
            <i class="bx bx-x"></i>
        </div>
        <a class="sideEle" href="#">Home</a>
        <a class="sideEle" href="#" onclick="submitForm('polo_item')">Polos</a>
        <a class="sideEle" href="#" onclick="submitForm('shirt_item')">Shirts</a>
        <a class="sideEle" href="#" onclick="submitForm('Accessories_item')">Accessories</a>
        <a class="sideEle" href="#" onclick="submitForm('shoes_item')">Shoes</a>
        <a class="sideEle" href="#" onclick="submitForm('contact')">Contact</a>
        <i class="bx bx-home-heart sideEle"></i>
        <i class="bx bx-cart sideEle"></i>
        <i class="bx bxs-user sideEle"></i>
    </div>
    <div class="cart overflow-auto h-[100vh] fixed backdrop-blur-2xl w-[300px] translate-x-[300px] bg-gray-100 z-50 top-0 right-0 transition-transform duration-300 ease-in-out" id="cart">
                <div class="p-4 flex justify-between items-center">
                    <h1 class="text-black text-xl font-bold">Cart</h1>
                    <i class='bx bx-x text-2xl text-black cursor-pointer' id="bx-x"></i>
                </div>
                
                <!-- Cart Items -->
                <div class="p-4">
                    <div class="flex items-center gap-4 mb-4">
                    <img src="../images/product_1.jpg" alt="Product Image" class="w-12 h-12 object-cover rounded-full" />
                    <div class="flex-1">
                        <h2 class="text-black text-sm">Product Name</h2>
                        <p class="text-black text-xs">$99.99</p>
                    </div>
                    <input type="number" value="1" min="1" max="10" class="w-12 text-sm text-black rounded-md" />
                    </div>
                    <!-- Repeat this block for each item in the cart -->
                </div>

                <!-- Cart Summary -->
                <div class="bg-white rounded-lg shadow-lg p-4 mx-4 mb-4">
                    <div class="flex justify-between mb-4">
                    <span class="text-gray-700">6 items</span>
                    <!-- <span class="text-gray-700">$<?php echo $total; ?></span> -->
                    </div>
                    <div class="flex justify-between mb-4">
                    <span class="text-gray-700">Shipping</span>
                    <span class="text-gray-700">$7.00</span>
                    </div>
                    <div class="flex justify-between mb-4 font-bold">
                    <span class="text-gray-900">Total (tax excl.)</span>
                    <span class="text-gray-900">$1,091.00</span>
                    </div>
                    <div class="flex justify-between mb-6">
                    <span class="text-gray-700">Taxes</span>
                    <span class="text-gray-700">$0.00</span>
                    </div>
                    <a href="./Cart.php">
                        <button class="w-full bg-black text-white py-2 rounded-lg hover:bg-gray-800">
                        Go to Cart
                        </button>
                    </a>
                </div>
    </div>
    <div class="wishlist overflow-auto h-[100vh] fixed backdrop-blur-2xl w-[300px] translate-x-[300px] bg-gray-100 z-50 top-0 right-0 transition-transform duration-300 ease-in-out" id="wishlist">
                <div class="p-4 flex justify-between items-center">
                    <h1 class="text-black text-xl font-bold">Wishlist</h1>
                    <i class='bx bx-x text-2xl text-black cursor-pointer' id="bx-wish"></i>
                </div>
                <?php
                    include './config.php';
                    $user_id = $_SESSION['user_id'];
                    $id = $_SESSION['product_id'];
                    if($id){
                        $query = "SELECT * FROM user_wishlist.wishlist_$user_id AS w LEFT JOIN product_info.product_item AS pr ON w.product_id = pr.product_id WHERE w.product_id = $id";
                        $result = mysqli_query($wishlist, $query);
                    }
                    while($item = mysqli_fetch_array($result)){
                    
                ?>
                <!-- Cart Items -->
                <div class="p-4">
                    <div class="flex items-center gap-4 mb-4">
                    <img src="../images/Product_images/<?php echo $item['product_image']?>" alt="Product Image" class="w-12 h-12 object-cover rounded-full" />
                    <div class="flex-1">
                        <h2 class="text-black text-sm"><?php echo $item['product_name']?></h2>
                        <p class="text-black text-xs">$99.99</p>
                    </div>
                    <input type="number" value="1" min="1" max="10" class="w-12 text-sm text-black rounded-md" />
                    </div>
                    <!-- Repeat this block for each item in the cart -->
                </div>
                  <?php
                    }
                  ?>
                <!-- Cart Summary -->
                <div class="bg-white rounded-lg shadow-lg p-4 mx-4 mb-4">
                    <div class="flex justify-between mb-4">
                    <span class="text-gray-700">6 items</span>
                    <!-- <span class="text-gray-700">$<?php echo $total; ?></span> -->
                    </div>
                    <div class="flex justify-between mb-4">
                    <span class="text-gray-700">Shipping</span>
                    <span class="text-gray-700">$7.00</span>
                    </div>
                    <div class="flex justify-between mb-4 font-bold">
                    <span class="text-gray-900">Total (tax excl.)</span>
                    <span class="text-gray-900">$1,091.00</span>
                    </div>
                    <div class="flex justify-between mb-6">
                    <span class="text-gray-700">Taxes</span>
                    <span class="text-gray-700">$0.00</span>
                    </div>
                    <a href="./Wishlist.php">
                        <button class="w-full bg-black text-white py-2 rounded-lg hover:bg-gray-800">
                        Go to Wishlist
                        </button>
                    </a>
                </div>
               
    </div>

    <script src="../JS/Navbar.js"></script>
</body>
</html>
