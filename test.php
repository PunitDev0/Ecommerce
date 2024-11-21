<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login / Signup</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.0.0/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gradient-to-br from-indigo-100 via-purple-100 to-pink-100 flex items-center justify-center min-h-screen">
  <div class="w-full max-w-md p-8 space-y-8 bg-white shadow-2xl rounded-2xl md:p-10">
    <!-- Logo/Header -->
    <div class="text-center">
      <img src="./Assests/Logo.png" alt="Company Logo" class="mx-auto w-32 mb-4">
      <h2 class="text-3xl font-bold text-gray-800">Welcome Back!</h2>
      <p class="text-gray-600">Please log in or sign up to continue.</p>
    </div>

    <!-- Form Tabs -->
    <div class="flex justify-center space-x-6 mb-6">
      <button id="loginTab" onclick="switchTab('login')" class="text-indigo-600 font-semibold focus:outline-none border-b-2 border-indigo-600 pb-1 transition duration-300 hover:text-indigo-700">Login</button>
      <button id="signupTab" onclick="switchTab('signup')" class="text-gray-500 hover:text-indigo-600 font-semibold focus:outline-none transition duration-300">Signup</button>
    </div>

    <!-- Login Form -->
    <form id="loginForm" class="space-y-6">
      <div class="space-y-4">
        <div>
          <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
          <input type="email" id="email" name="email" required
            class="w-full px-4 py-2 mt-1 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500" placeholder="you@example.com">
        </div>
        <div>
          <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
          <input type="password" id="password" name="password" required
            class="w-full px-4 py-2 mt-1 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500" placeholder="********">
        </div>
      </div>

      <!-- Social Login Buttons -->
      <div class="flex items-center justify-between space-x-4 mt-6">
        <button type="button" class="flex-1 py-2 px-4 border border-gray-300 rounded-lg text-gray-700 hover:bg-indigo-100 transition duration-300 transform hover:-translate-y-1 flex items-center justify-center space-x-2">
          <img src="https://img.icons8.com/color/28/000000/google-logo.png" class="rounded-full" alt="Google Logo">
          <span class="font-semibold">Google</span>
        </button>
        <button type="button" class="flex-1 py-2 px-4 border border-gray-300 rounded-lg text-gray-700 hover:bg-indigo-100 transition duration-300 transform hover:-translate-y-1 flex items-center justify-center space-x-2">
          <img src="https://img.icons8.com/color/28/000000/linkedin.png" class="rounded-full" alt="LinkedIn Logo">
          <span class="font-semibold">LinkedIn</span>
        </button>
        <button type="button" class="flex-1 py-2 px-4 border border-gray-300 rounded-lg text-gray-700 hover:bg-indigo-100 transition duration-300 transform hover:-translate-y-1 flex items-center justify-center space-x-2">
          <img src="https://img.icons8.com/fluency/28/000000/facebook-new.png" class="rounded-full" alt="Facebook Logo">
          <span class="font-semibold">Facebook</span>
        </button>
      </div>

      <!-- Login Button -->
      <button type="submit"
        class="w-full py-3 px-4 mt-8 border border-transparent rounded-lg shadow-lg text-white font-bold bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition duration-300 transform hover:-translate-y-1">
        Sign in
      </button>
    </form>

    <!-- Signup Form -->
    <form id="signupForm" class="space-y-6 hidden">
      <div class="space-y-4">
        <div>
          <label for="signupEmail" class="block text-sm font-medium text-gray-700">Email</label>
          <input type="email" id="signupEmail" name="email" required
            class="w-full px-4 py-2 mt-1 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500" placeholder="you@example.com">
        </div>
        <div>
          <label for="signupPassword" class="block text-sm font-medium text-gray-700">Password</label>
          <input type="password" id="signupPassword" name="password" required
            class="w-full px-4 py-2 mt-1 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500" placeholder="********">
        </div>
        <div>
          <label for="confirmPassword" class="block text-sm font-medium text-gray-700">Confirm Password</label>
          <input type="password" id="confirmPassword" name="confirmPassword" required
            class="w-full px-4 py-2 mt-1 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500" placeholder="********">
        </div>
      </div>
      <div class="flex items-center justify-center space-x-4 mt-6">
      
          <img src="https://img.icons8.com/color/28/000000/google-logo.png" class="rounded-full" alt="Google Logo">
        
          <img src="https://img.icons8.com/color/28/000000/linkedin.png" class="rounded-full" alt="LinkedIn Logo">
        
          <img src="https://img.icons8.com/fluency/28/000000/facebook-new.png" class="rounded-full" alt="Facebook Logo">
          
      </div>

      <!-- Signup Button -->
      <button type="submit"
        class="w-full py-3 px-4 mt-8 border border-transparent rounded-lg shadow-lg text-white font-bold bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition duration-300 transform hover:-translate-y-1">
        Create Account
      </button>
    </form>
  </div>

  <script>
    function switchTab(tab) {
      const loginForm = document.getElementById('loginForm');
      const signupForm = document.getElementById('signupForm');
      const loginTab = document.getElementById('loginTab');
      const signupTab = document.getElementById('signupTab');

      if (tab === 'login') {
        loginForm.classList.remove('hidden');
        signupForm.classList.add('hidden');
        loginTab.classList.add('border-indigo-600', 'text-indigo-600');
        signupTab.classList.remove('border-indigo-600', 'text-indigo-600');
      } else {
        signupForm.classList.remove('hidden');
        loginForm.classList.add('hidden');
        signupTab.classList.add('border-indigo-600', 'text-indigo-600');
        loginTab.classList.remove('border-indigo-600', 'text-indigo-600');
      }
    }
  </script>
</body>
</html>
