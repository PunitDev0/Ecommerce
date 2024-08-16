<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <title>Swiper demo</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1" />
  <!-- Link Swiper's CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
  <!-- Link Tailwind CSS -->
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.3.1/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="font-sans text-base text-black m-0 p-0">

  <!-- Swiper -->
  <div class="swiper mySwiper2 w-full h-full">
    <div class="swiper-wrapper">
      <div class="swiper-slide flex justify-center items-center p-5 bg-white h-36 w-36">
        <div class="relative w-4/5 h-4/5 rounded-md bg-black bg-opacity-80 shadow-lg">
          <img src="../Assests/image/Shoe1.png" alt="" class="h-full w-full object-contain" />
        </div>
      </div>
      <!-- Repeat swiper-slide div for other slides -->
    </div>
  </div>

  <!-- Swiper JS -->
  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

  <!-- Initialize Swiper -->
  <script>
    var swiper = new Swiper(".mySwiper2", {
      slidesPerView: 6,
      spaceBetween: 30,
      freeMode: true,
      loop: true,
      autoplay: {
        delay: 0,
        disableOnInteraction: false,
      },
      speed: 4000,
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
      },
      breakpoints: {
        430: {
          slidesPerView: 2,
          spaceBetween: 10,
        },
        500: {
          slidesPerView: 3,
          spaceBetween: 20,
        },
        768: {
          slidesPerView: 4,
          spaceBetween: 30,
        },
        1024: {
          slidesPerView: 5,
          spaceBetween: 40,
        },
      },
    });
  </script>
</body>

</html>
