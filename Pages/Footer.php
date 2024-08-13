<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Responsive Footer with Tailwind CSS</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <style>
    .hover-grow:hover {
      margin-left: 10px;
    }
    * {
      color: black;
    }
    @media (max-width: 500px) {
      ul {
        max-height: 0;
        overflow: hidden;
        transition: max-height 0.3s ease;
      }
    }
  </style>
</head>
<body>
  <!-- Other content -->

  <footer class="bg-gray-100 text-white py-8 w-full">
    <div class="w-full px-8">
      <div class="flex flex-wrap -mx-4">
        <div class="w-full md:w-1/4 px-4 mb-8 md:mb-0 leading-8">
          <h3 class="text-lg font-bold mb-4 hover-grow cursor-pointer" onclick="toggleList(this)">Contact</h3>
          <ul>
            <li>Address</li>
            <li>130 Street, Arizona</li>
            <li>85002, United States</li>
            <li>Mail Us: <a href="mailto:admin@info.com" class="text-blue-400 hover:underline hover-grow">admin@info.com</a></li>
            <li>Phone: (123) 456 7890</li>
          </ul>
        </div>
        <div class="w-full md:w-1/4 px-4 mb-8 md:mb-0">
          <h3 class="text-lg font-bold mb-4 hover-grow cursor-pointer" onclick="toggleList(this)">Your Account</h3>
          <ul class="leading-8">
            <li><a href="#" class="hover:text-blue-400 transition-all hover-grow">Personal info</a></li>
            <li><a href="#" class="hover:text-blue-400 hover-grow transition-all">Orders</a></li>
            <li><a href="#" class="hover:text-blue-400 hover-grow transition-all">Credit slips</a></li>
            <li><a href="#" class="hover:text-blue-400 hover-grow transition-all">Addresses</a></li>
          </ul>
        </div>
        <div class="w-full md:w-1/4 px-4 mb-8 md:mb-0">
          <h3 class="text-lg font-bold mb-4 hover-grow cursor-pointer" onclick="toggleList(this)">Products</h3>
          <ul class="leading-8">
            <li><a href="#" class="hover:text-blue-400 hover-grow transition-all">Prices drop</a></li>
            <li><a href="#" class="hover:text-blue-400 hover-grow transition-all">New products</a></li>
            <li><a href="#" class="hover:text-blue-400 hover-grow transition-all">Best sales</a></li>
            <li><a href="#" class="hover:text-blue-400 hover-grow transition-all">Sitemap</a></li>
            <li><a href="#" class="hover:text-blue-400 hover-grow transition-all">Stores</a></li>
          </ul>
        </div>
        <div class="w-full md:w-1/4 px-4 mb-8 md:mb-0">
          <h3 class="text-lg font-bold mb-4 hover-grow cursor-pointer" onclick="toggleList(this)">Our Company</h3>
          <ul class="leading-8">
            <li><a href="#" class="hover:text-blue-400 hover-grow transition-all">Delivery</a></li>
            <li><a href="#" class="hover:text-blue-400 hover-grow transition-all">Legal Notice</a></li>
            <li><a href="#" class="hover:text-blue-400 hover-grow transition-all">Terms and conditions of use</a></li>
            <li><a href="#" class="hover:text-blue-400 hover-grow transition-all">About us</a></li>
            <li><a href="#" class="hover:text-blue-400 hover-grow transition-all">Secure payment</a></li>
            <li><a href="#" class="hover:text-blue-400 hover-grow transition-all">Contact us</a></li>
          </ul>
        </div>
      </div>
      <div class="flex flex-wrap justify-between items-center mt-8 border-t border-gray-700 pt-4">
        <p class="text-gray-400 text-sm">© 2024 - Ecommerce software by PrestaShop™</p>
        <div class="flex space-x-4">
          <img src="visa.png" alt="Visa" class="w-10 h-10">
          <img src="paypal.png" alt="PayPal" class="w-10 h-10">
          <img src="discover.png" alt="Discover" class="w-10 h-10">
          <img src="american-express.png" alt="American Express" class="w-10 h-10">
          <img src="mastercard.png" alt="Mastercard" class="w-10 h-10">
        </div>
      </div>
    </div>
  </footer>

  <script>
    function toggleList(header) {
      const ul = header.nextElementSibling;
      if (ul.style.maxHeight) {
        ul.style.maxHeight = null;
      } else {
        ul.style.maxHeight = ul.scrollHeight + "px";
      }
    }
  </script>

</body>
</html>
