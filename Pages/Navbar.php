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
<body class="min-h-screen min-w-full font-poppins text-black">
    <div class="shadow-lg ">
        <div class="bg-gray-900 h-6 flex items-center justify-center">
            <h4 class="text-white text-center">Get Exclusive Discount 50%OFF</h4>
        </div>
        <nav id = "navbar" class="flex justify-between items-center h-20 px-3 md:px-12 backdrop-blur-sm relative bg-white">
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
                <a href="./Wishlist.php" class="hover:-translate-y-2 transition-transform"><i class="bx bx-heart"></i></a>
                <a href="./Cart.php" class="hover:-translate-y-2 transition-transform"><i class="bx bx-cart"></i></a>
                <a href="#" class="hover:-translate-y-2 transition-transform"><i class="bx bxs-user"></i></a>
            </div>
        </nav>
        
        <div class="sub-menu absolute z-20 right-10 max-h-0 overflow-hidden transition-all duration-700 ease-in-out rounded-lg shadow-md bg-gray-200">
            <div class="p-4">
                <div class="flex items-center gap-4">
                    <div class="w-8 h-8 bg-gray-400 rounded-full">
                        <?php
                            if(isset($_SESSION['image']) && !empty($_SESSION['image'])) {
                                echo '<img src="' . $_SESSION['image'] . '" alt="User Image" class="w-full h-full object-cover rounded-full"/>';
                            } else {
                                echo '<img src="../images/default-user.png" alt="Default User Image" class="w-full h-full rounded-full"/>';
                            }
                        ?>
                    </div>
                    <h1><?php echo $_SESSION['username'] ?? 'Guest'; ?></h1>
                </div>
                <div class="w-full bg-black h-0.5 mt-2"></div>
                <div class="mt-2">
                    <a href="" class="flex items-center justify-between">
                        <div class="flex gap-2 items-center">
                            <i class="bx bxs-user-circle"></i>
                            <p>Edit Profile</p>
                        </div>
                        <i class="bx bx-chevron-right"></i>
                    </a>
                    <!-- Repeat the above block for other links -->
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

    <script src="../JS/Navbar.js"></script>
</body>
</html>
