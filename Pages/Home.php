<?php
  session_start();

//   if (!$_SESSION['user_id'] || $_SESSION['admin_id']) {
//     // If not logged in, redirect to login page
//     header("Location: ./Login.php");
//     exit();
// }

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
</head>

<body>
  <div class="MainHome">
    <div class="Navbar">
      <?php include './Navbar.php' ?>
    </div>
    <div class="SwiperAdd relative">
      <?php include '../Swipers/Swiper.html' ?>
    </div>

    <section class="section min-h-screen">
    
      <div class="Home-image flex mt-[5rem  ]">
        <div class="box flex items-center justify-center w-[45%] h-full bg-[#F3F3F3] m-4 p-[20px] text-center rounded-lg ">
          <div class="text">
            <h1>Discover Our Products</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
          </div>
          <div class="img w-full h-auto bg-[#EBEBEB] m-auto">
            <img
             class="w-full h-full object-contain"
             src="../Assests/image/WatchImage2.png" 
             alt="">
          </div>
        </div>
        <div class="box flex items-center justify-center w-[45%] h-full bg-[#F3F3F3] m-4 p-[20px] text-center rounded-lg">
          <div class="text">
            <h1>New Arrivals</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
          </div>
          <div class="img w-full h-auto bg-[#EBEBEB] m-auto">
            <img 
             class="w-full h-full object-contain"
            src="../Assests/image/WatchImage2.png" alt="">
          </div>
        </div>
      </div>
      <div class="FindThings flex flex-col mt-2 relative p-[50px] w-screen h-[25rem] bg-[#F3F3F3]">
        <h1 class="text-center mb-3 text-lg font-bold">Find Things You'll Love</h1>
        <?php include '../Swipers/Swiper2.php' ?>
      </div>

      <div class="Cards my-10 flex flex-col w-full items-center">
        <h1 class ="text-center text-3xl">FEATURED COLLECTION'S</h1>
       <?php include './Polocard.php' ?>
      </div>

      <div class="Items">
        <div class="box">
          <div class="image">
            <img 
            class="img"
            src="../Assests/image/WatchImage1.png" alt="">
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
<script src="https://cdn.jsdelivr.net/npm/locomotive-scroll@3.5.4/dist/locomotive-scroll.js" ></script>
<script src="../JS/loco.js"></script>

</html>
