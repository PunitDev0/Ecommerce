<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <title>Swiper demo</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1" />
  <!-- Link Swiper's CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <!-- Tailwind CSS -->
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <!-- Custom CSS -->
  <style>
    .mySwiper3 .swiper-slide {
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .mySwiper3 .product-card {
      width: 100%;
      height: 100%;
      background-color: #fff;
      border-radius: 10px;
      overflow: hidden;
      display: flex;
      flex-direction: column;
      align-items: center;
    }

    .mySwiper3 .product-image {
      width: 100%;
      /* padding: 10px; */
      display: flex;
      justify-content: center;
      align-items: center;
      border: 1px solid #e1e1e1;
    }

    
  </style>
</head>

<body class="bg-gray-100">
  <!-- Swiper -->
  <div class="swiper mySwiper3 w-full h-full">
    <div class="swiper-wrapper">
      <?php
        $conn = mysqli_connect('localhost', 'root', '', 'userinfo');
        $item = mysqli_query($conn, "SELECT * FROM polo_item LIMIT 8");
        while ($items = mysqli_fetch_array($item)) {
      ?>
      <div class="swiper-slide flex justify-center items-center bg-white rounded-lg shadow-md ">
        <div class="product-card flex flex-col items-center w-full h-fit">
          <div class="product-image w-full flex justify-center items-center border border-gray-300 rounded-lg ">
            <img src="../Assests/image/Model1.png" alt="Product Image" class="w-full h-full object-contain rounded-lg">
          </div>
          <div class="product-info text-center">
            <p class="product-name text-md font-bold"><?php echo $items['product_name']?></p>
            <p class="product-price text-red-500 text-lg my-2">$<?php echo $items['product_price']?></p>
            <button class="add-to-cart bg-#373738 text-white py-2 px-4 rounded hover:bg-gray-700">Add to Cart</button>
          </div>
        </div>
      </div>
      <?php
        }
      ?>
    </div>
    <div class="custom-button-next absolute right-10 top-1/2 transform -translate-y-1/2  bg-gray-100 opacity-55 text-white p-2  cursor-pointer z-10 border border-black">
      <i class='bx bx-chevron-right text-3xl'></i>
    </div>
    <div class="custom-button-prev absolute left-10 top-1/2 transform -translate-y-1/2 bg-gray-100 opacity-55 text-white p-2  cursor-pointer z-10 border border-black">
      <i class='bx bx-chevron-left text-3xl'></i>
    </div>
  </div>

  <!-- Swiper JS -->
  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

  <!-- Initialize Swiper -->
  <script>
    var swiper = new Swiper(".mySwiper3", {
      slidesPerView: 6,
      spaceBetween: 30,
      navigation: {
        nextEl: '.custom-button-next',
        prevEl: '.custom-button-prev',
      },
      breakpoints: {
        430: {
          slidesPerView: 2,
          spaceBetween: 10,
        },
        550: {
          slidesPerView: 3,
          spaceBetween: 20,
        },
        768: {
          slidesPerView: 4,
          spaceBetween: 30,
        },
        1024: {
          slidesPerView: 4,
          spaceBetween: 40,
        },
      },
    });
  </script>
</body>

</html>
