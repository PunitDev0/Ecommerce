<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <title>Swiper demo</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1" />
  <!-- Link Swiper's CSS -->
   <link rel="stylesheet" href="../CSS/Swiper2.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

</head>

<body>
  <!-- Swiper -->
  <div class="swiper mySwiper2">
    <div class="swiper-wrapper">
   
        <div class="swiper-slide">
          <div class="image">
            <img src="../Assests/image/Shoe1.png" alt="" />
          </div>
        </div>
        <div class="swiper-slide">
          <div class="image">
            <img src="../Assests/image/Shoe1.png" alt="" />
          </div>
        </div>
        <div class="swiper-slide">
          <div class="image">
            <img src="../Assests/image/Shoe1.png" alt="" />
          </div>
        </div>
        <div class="swiper-slide">
          <div class="image">
            <img src="../Assests/image/Shoe1.png" alt="" />
          </div>
        </div>
        <div class="swiper-slide">
          <div class="image">
            <img src="../Assests/image/Shoe1.png" alt="" />
          </div>
        </div>
        <div class="swiper-slide">
          <div class="image">
            <img src="../Assests/image/Shoe1.png" alt="" />
          </div>
        </div>
        <div class="swiper-slide">
          <div class="image">
            <img src="../Assests/image/Shoe1.png" alt="" />
          </div>
        </div>
        <div class="swiper-slide">
          <div class="image">
            <img src="../Assests/image/Shoe1.png" alt="" />
          </div>
        </div>
        <div class="swiper-slide">
          <div class="image">
            <img src="../Assests/image/Shoe1.png" alt="" />
          </div>
        </div>
        <div class="swiper-slide">
          <div class="image">
            <img src="../Assests/image/Shoe1.png" alt="" />
          </div>
        </div>
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
