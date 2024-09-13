<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>About Us - Stoods Styling</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.2/gsap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/ScrollTrigger/1.0.5/ScrollTrigger.min.js"></script>
  <style>
    body {
      font-family: 'Roboto', sans-serif;
    }
  </style>
</head>
<body class="bg-gray-100">
  <!-- Navbar -->
  <?php include './Navbar.php'?>

  <!-- Stoods Styling Section -->
  <section class="bg-gray-50 py-20 px-4 md:px-20" id="stoods-styling">
    <div class="max-w-7xl mx-auto text-center">
      <h2 class="text-4xl font-bold text-gray-800 mb-10">Stoods Styling: Redefining Fashion</h2>
      <p class="text-lg text-gray-600 mb-8">
        At Stoods Styling, we believe fashion is not just about wearing clothes; it’s about self-expression. Our unique designs, coupled with exceptional quality, bring out the best in every individual, making them stand out in any crowd.
      </p>

      <!-- Expanded Content with Visual Appeal -->
      <div class="grid grid-cols-1 md:grid-cols-2 gap-12 mb-10">
        <div class="flex flex-col justify-center">
          <h3 class="text-2xl font-semibold text-gray-700 mb-3">Our Unique Approach</h3>
          <p class="text-gray-700 mb-5">
            We don’t just follow trends; we set them. Our designers work tirelessly to bring fresh, innovative styles that blend the latest in global fashion with timeless classics. Our collections range from modern streetwear to formal attire, ensuring that you can find something perfect for every occasion.
          </p>
          <p class="text-gray-700">
            Whether it’s chic everyday outfits, elegant evening wear, or bold statement pieces, Stoods Styling covers all fashion bases. With us, you are not just following the crowd—you’re making a statement.
          </p>
        </div>
        <div>
          <img src="https://images.pexels.com/photos/5702321/pexels-photo-5702321.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="Stoods Styling Approach" class="rounded-lg shadow-lg">
        </div>
      </div>

      <!-- Styling Philosophy Section -->
      <div class="grid grid-cols-1 md:grid-cols-2 gap-12 mb-10">
        <div>
          <img src="https://images.pexels.com/photos/3054982/pexels-photo-3054982.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="Our Styling Philosophy" class="rounded-lg shadow-lg">
        </div>
        <div class="flex flex-col justify-center">
          <h3 class="text-2xl font-semibold text-gray-700 mb-3">Our Styling Philosophy</h3>
          <p class="text-gray-700 mb-5">
            At Stoods Styling, we are firm believers in personal style. We understand that fashion is a powerful way to communicate who you are. That’s why we focus on creating collections that allow every individual to express their personality, taste, and creativity.
          </p>
          <p class="text-gray-700">
            Our philosophy is to ensure that each customer finds their unique style while staying true to modern fashion sensibilities. Our team constantly seeks inspiration from art, culture, and technology to craft the finest pieces, designed to elevate your style.
          </p>
        </div>
      </div>

      <!-- Product Range Section -->
      <div class="py-16 bg-white rounded-lg shadow-lg">
        <h3 class="text-3xl font-bold mb-6 text-gray-800">Our Product Range</h3>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
          <!-- Product 1 -->
          <div class="bg-gray-200 p-6 rounded-lg text-center hover:bg-gray-300 transform hover:-translate-y-1 hover:shadow-xl transition">
            <img src="https://images.pexels.com/photos/1666818/pexels-photo-1666818.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="Women's Wear" class="h-64 w-full object-cover mb-4 rounded-lg">
            <h4 class="text-xl font-semibold mb-2">Women's Wear</h4>
            <p class="text-gray-600">
              Bold, elegant, and trendy outfits designed to enhance your confidence and flair.
            </p>
          </div>
          <!-- Product 2 -->
          <div class="bg-gray-200 p-6 rounded-lg text-center hover:bg-gray-300 transform hover:-translate-y-1 hover:shadow-xl transition">
            <img src="https://images.pexels.com/photos/326555/pexels-photo-326555.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="Men's Wear" class="h-64 w-full object-cover mb-4 rounded-lg">
            <h4 class="text-xl font-semibold mb-2">Men's Wear</h4>
            <p class="text-gray-600">
              Sharp and sophisticated designs for the modern gentleman.
            </p>
          </div>
          <!-- Product 3 -->
          <div class="bg-gray-200 p-6 rounded-lg text-center hover:bg-gray-300 transform hover:-translate-y-1 hover:shadow-xl transition">
            <img src="https://images.pexels.com/photos/1449674/pexels-photo-1449674.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="Accessories" class="h-64 w-full object-cover mb-4 rounded-lg">
            <h4 class="text-xl font-semibold mb-2">Accessories</h4>
            <p class="text-gray-600">
              Unique accessories that perfectly complement your look.
            </p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <?php include './Footer.php'?>

  <script>
    // GSAP Animations for the Stoods Styling Section
    gsap.registerPlugin(ScrollTrigger);

    gsap.from("#stoods-styling h2", {
      scrollTrigger: "#stoods-styling h2",
      opacity: 0,
      y: -50,
      duration: 1.2
    });

    gsap.from("#stoods-styling .grid div", {
      scrollTrigger: "#stoods-styling .grid div",
      opacity: 0,
      scale: 0.8,
      stagger: 0.3,
      duration: 1
    });

    gsap.from("#stoods-styling .bg-white", {
      scrollTrigger: "#stoods-styling .bg-white",
      opacity: 0,
      y: 50,
      duration: 1.5
    });
  </script>
</body>
</html>
