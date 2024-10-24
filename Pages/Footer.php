<style>
  /* General Styles */
  .hover-grow:hover {
    margin-left: 10px;
  }
  * {
    color: black;
  }

  footer {
    background-color: #f7f7f7; /* Light gray */
  }

  /* Responsive Styles */
  @media (max-width: 768px) {
    .w-full.md\:w-1\/4 {
      width: 100%; /* Make columns stack vertically */
    }
    .px-4 {
      padding: 0 1rem; /* Adjust padding for smaller screens */
    }
    h3 {
      font-size: 1rem; /* Smaller headings */
    }
    .ul {
      max-height: 0;
      overflow: hidden;
      transition: max-height 0.3s ease;
    }
    .leading-8 {
      line-height: 1.6; /* Adjust line spacing */
    }
    .text-lg {
      font-size: 1rem;
    }
    .text-sm {
      font-size: 0.875rem;
    }
    .w-10 {
      width: 2.5rem; /* Resize payment icons */
    }
    .w-15 {
      width: 3rem; /* Resize payment icons */
    }
  }

  /* Mobile Styles */
  @media (max-width: 500px) {
    .ul {
      max-height: 0;
      overflow: hidden;
      transition: max-height 0.3s ease;
    }
    .px-4 {
      padding: 0 0.5rem; /* Reduce padding more on mobile */
    }
    footer .flex {
      flex-direction: column; /* Stack flex items */
      align-items: center;
    }
    .text-sm {
      font-size: 0.75rem; /* Smaller footer text */
    }
    .leading-8 {
      line-height: 1.4; /* Adjust list spacing */
    }
    .ul li {
      font-size: 0.85rem; /* Smaller list items */
    }
    .hover-grow:hover {
      margin-left: 5px; /* Less grow on smaller screens */
    }
    .w-10 {
      width: 2rem; /* Smaller payment icons */
    }
    .w-15 {
      width: 2.5rem;
    }
  }
</style>

<!-- Footer Section -->
<footer class="bg-zinc-900 text-white py-6 w-full">
  <div class="w-full px-8">
    <div class="flex flex-wrap -mx-4">
      <div class="w-full md:w-1/4 px-4 mb-6 leading-6">
        <h3 class=" text-gray-700 text-lg font-bold mb-4 hover-grow cursor-pointer" onclick="toggleList(this)">Contact</h3>
        <ul class="ul">
          <li class="text-gray-300">Address</li>
          <li class="text-gray-300">130 Street, Arizona</li>
          <li class="text-gray-300">85002, United States</li>
          <li class="text-gray-300">Mail Us: <a href="mailto:admin@info.com" class="text-blue-400 hover:underline hover-grow">admin@info.com</a></li>
          <li class=" text-gray-300">Phone: (123) 456 7890</li>
        </ul>
      </div>
      <div class="w-full md:w-1/4 px-4 mb-6">
        <h3 class=" text-gray-700 text-lg font-bold mb-4 hover-grow cursor-pointer" onclick="toggleList(this)">Your Account</h3>
        <ul class="leading-6 ul">
          <li><a href="#" class="text-gray-300 hover:text-blue-400 transition-all hover-grow">Personal info</a></li>
          <li><a href="#" class="text-gray-300 hover:text-blue-400 hover-grow transition-all">Orders</a></li>
          <li><a href="#" class="text-gray-300 hover:text-blue-400 hover-grow transition-all">Credit slips</a></li>
          <li><a href="#" class="text-gray-300 hover:text-blue-400 hover-grow transition-all">Addresses</a></li>
        </ul>
      </div>
      <div class="w-full md:w-1/4 px-4 mb-6">
        <h3 class=" text-gray-700 text-lg font-bold mb-4 hover-grow cursor-pointer" onclick="toggleList(this)">Products</h3>
        <ul class="leading-6 ul">
          <li><a href="#" class="text-gray-300 hover:text-blue-400 hover-grow transition-all">Prices drop</a></li>
          <li><a href="#" class="text-gray-300 hover:text-blue-400 hover-grow transition-all">New products</a></li>
          <li><a href="#" class="text-gray-300 hover:text-blue-400 hover-grow transition-all">Best sales</a></li>
          <li><a href="#" class="text-gray-300 hover:text-blue-400 hover-grow transition-all">Sitemap</a></li>
          <li><a href="#" class="text-gray-300 hover:text-blue-400 hover-grow transition-all">Stores</a></li>
        </ul>
      </div>
      <div class="w-full md:w-1/4 px-4 mb-6">
        <h3 class=" text-gray-700 text-lg font-bold mb-4 hover-grow cursor-pointer" onclick="toggleList(this)">Our Company</h3>
        <ul class="leading-6 ul">
          <li><a href="#" class="text-gray-300 hover:text-blue-400 hover-grow transition-all">Delivery</a></li>
          <li><a href="#" class="text-gray-300 hover:text-blue-400 hover-grow transition-all">Legal Notice</a></li>
          <li><a href="#" class="text-gray-300 hover:text-blue-400 hover-grow transition-all">Terms and conditions of use</a></li>
          <li><a href="#" class="text-gray-300 hover:text-blue-400 hover-grow transition-all">About us</a></li>
          <li><a href="#" class="text-gray-300 hover:text-blue-400 hover-grow transition-all">Secure payment</a></li>
          <li><a href="#" class="text-gray-300 hover:text-blue-400 hover-grow transition-all">Contact us</a></li>
        </ul>
      </div>
    </div>
    <div class="flex flex-wrap justify-between items-center mt-6 border-t border-gray-700 pt-4">
      <p class="text-gray-400 text-smtext-gray-300 ">© 2024 - Ecommerce software by PrestaShop™</p>
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
