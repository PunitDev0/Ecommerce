<?php
  session_start();
  if (!$_SESSION['logged_in']) {
    header("Location: ./Login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../CSS/Home.css">
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/locomotive-scroll@3.5.4/dist/locomotive-scroll.css">
  <title>Document</title>
  <style>
    .grid-div p{
      color:white;
    }
    .grid-item{
      overflow:hidden;  
      transition:all;
    }
    .grid-div{
      transition:all;
      transform: translateY(350px);

    }
    .grid-item:hover {
      scale:1.02;
    }
    .grid-item:hover .grid-div{
        transform: translateY(0);
    }

  </style>
</head>
<body class=" text-white">
  <div class="MainHome">
    <div class="Navbar">
      <?php include './Navbar.php' ?>
    </div>
    <div class="SwiperAdd relative">
      <?php include '../Swipers/Swiper.html' ?>
    </div>
    
    
    <div class="grid grid-cols-2 md:grid-cols-2 lg:grid-cols-4 gap-4 p-4 h-full w-full relative" style="grid-template-rows: repeat(2, minmax(200px, 300px))">

<!-- First item: spans two rows -->
<div class="grid-item transition-all ease-in-out lg:row-span-2 row-span-1 bg-gray-800 flex items-center justify-center relative">
  <img src="../Assests/image/perfume.jpeg" alt="Perfume" class="w-full h-full object-cover">
  <div class="grid-div absolute text-white p-4">
    <h2 class="text-lg md:text-xl font-bold">Sale Up To 30% Off</h2>
    <p class="text-sm md:text-base">Latest Perfume Collection</p>
    <a href="#" class="text-yellow-500">View Offer</a>
  </div>
</div>

<!-- Second item -->
<div class="grid-item transition-all ease-in-out col-span-1 bg-gray-800 flex items-center justify-center relative">
  <img src="../Assests/image/Ring.jpeg" alt="Ring" class="w-full h-full object-cover">
  <div class="grid-div absolute text-white p-4">
    <h2 class="text-lg md:text-xl font-bold">20% Off Rings</h2>
    <a href="#" class="text-yellow-500">Shop Now</a>
  </div>
</div>

<!-- Third item -->
<div class="grid-item transition-all ease-in-out col-span-2 bg-gray-800 flex items-center justify-center relative">
  <img src="../Assests/image/Straight Interface Manual Folding Head Layer Cowhide Strap - Silver Button Head _ 22mm.jpeg" alt="Watch Strap" class="w-full h-full object-cover">
  <div class="grid-div absolute text-white p-4">
    <p class="text-sm md:text-base">Luxury Watch Strap</p>
  </div>
</div>

<!-- Fourth item -->
<div class="grid-item transition-all ease-in-out col-span-1 lg:col-span-2 bg-gray-800 flex items-center justify-center relative">
  <img src="../Assests/image/download.jpeg" alt="Smart Speaker" class="w-full h-full object-cover">
  <div class="grid-div absolute text-white p-4">
    <p class="text-sm md:text-base">Smart Speaker</p>
  </div>
</div>

<!-- Fifth item -->
<div class="grid-item transition-all ease-in-out col-span-1 bg-gray-800 flex items-center justify-center relative">
  <img src="../Assests/image/Shoes.jpeg" alt="Shoes" class="w-full h-full object-cover">
  <div class="grid-div absolute text-white p-4">
    <p class="text-lg md:text-xl font-bold">Stylish Shoes</p>
    <a href="#" class="text-yellow-500">View More</a>
  </div>
</div>

</div>


    <section class="section min-h-screen">
          <div class="Home-image flex flex-col md:flex-row mt-20 space-y-4 md:space-y-0 md:space-x-4">
          <!-- First Box -->
          <div class="box flex flex-col md:flex-row items-center justify-between w-full md:w-[45%] bg-[#F3F3F3] p-6 text-center rounded-lg shadow-lg">
              <div class="text mb-4 md:mb-0 md:mr-4">
                  <h1 class="text-xl md:text-2xl font-bold">Discover Our Products</h1>
                  <p class="text-sm md:text-base text-gray-600">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
              </div>
              <div class="img w-full md:w-1/2 bg-[#EBEBEB] rounded-lg p-4">
                  <img class="w-[80vw] md:w-full h-auto object-contain" src="../Assests/image/WatchImage2.png" alt="Product Image">
              </div>
          </div>

          <!-- Second Box -->
          <div class="box flex flex-col md:flex-row items-center justify-between w-full md:w-[45%] bg-[#F3F3F3] p-6 text-center rounded-lg shadow-lg">
              <div class="text mb-4 md:mb-0 md:mr-4">
                  <h1 class="text-xl md:text-2xl font-bold">New Arrivals</h1>
                  <p class="text-sm md:text-base text-gray-600">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
              </div>
              <div class="img w-full md:w-1/2 bg-[#EBEBEB] rounded-lg p-4">
                  <img class="w-[80vw] md:w-full h-auto object-contain" src="../Assests/image/WatchImage2.png" alt="New Arrival Image">
              </div>
          </div>
      </div>


      <div class="FindThings flex flex-col mt-2 relative p-[50px] w-screen h-[25rem] bg-[#F3F3F3]">
        <h1 class="text-center mb-3 text-lg font-bold">Find Things You'll Love</h1>
        <?php include '../Swipers/Swiper2.php' ?>
      </div>

      <div class="Cards my-10 flex flex-col w-full items-center">
        <h1 class="text-center text-3xl">FEATURED COLLECTION'S</h1>
        <?php include './Polocard.php' ?>
      </div>

      <div class="Items">
        <div class="box">
          <div class="image">
            <img class="img" src="../Assests/image/WatchImage1.png" alt="">
          </div>
          <div class="text">
            <h1>Tempered Glass</h1>
            <p>Make Your Life Smart</p>
            <button>Shop Now</button>
          </div>
        </div>
        <div class="box">
          <div class="image">
            <img class="img" src="../Assests/image/WatchImage2.png" alt="">
          </div>
          <div class="text">
            <h1>Tempered Glass</h1>
            <p>Make Your Life Smart</p>
            <button>Shop Now</button>
          </div>
        </div>
        <div class="box">
          <div class="image">
            <img class="img" src="../Assests/image/WatchImage3.png" alt="">
          </div>
          <div class="text">
            <h1>Tempered Glass</h1>
            <p>Make Your Life Smart</p>
            <button>Shop Now</button>
          </div>
        </div>
      </div>

      <div class="NewProduct mt-12 p-10">
        <h1 class="text-center text-3xl mb-10">NEW PRODUCTS</h1>
        <?php include '../Swipers/Swiper3.php' ?>
      </div>
    </section>

    <div class="">
      <?php include './Footer.php'; ?>
    </div>
  </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/locomotive-scroll@3.5.4/dist/locomotive-scroll.js"></script>
</html>
