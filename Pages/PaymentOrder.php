<!DOCTYPE html>
<html lang="en">
<?php
session_start();
include('config.php');
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <link rel="icon" type="image/png" href="images/icons/favicon.png" />
	<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
	<!-- <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/linearicons-v1.0.0/icon-font.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/perfect-scrollbar/perfect-scrollbar.css">
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css"> -->
     <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
  <div class="fixed w-full z-50">
    <?php include'./Navbar.php'?>
  </div>
<div class="grid sm:px-10 lg:grid-cols-2 lg:px-20 xl:px-32 py-16">
	<div>
		<div class="px-4 pt-8">
		<p class="text-xl font-medium">Order Summary</p>
		<p class="text-gray-400">Check your items. And select a suitable shipping method.</p>
		<div class="mt-8 space-y-3 rounded-lg border bg-white px-2 py-4 sm:px-6">
		<div class="flex flex-col rounded-lg bg-white sm:flex-row">
			<img class="m-2 h-24 w-28 rounded-md border object-cover object-center" src="https://images.unsplash.com/flagged/photo-1556637640-2c80d3201be8?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8M3x8c25lYWtlcnxlbnwwfHwwfHw%3D&auto=format&fit=crop&w=500&q=60" alt="" />
			<div class="flex w-full flex-col px-4 py-4">
			<span class="font-semibold">Nike Air Max Pro 8888 - Super Light</span>
			<span class="float-right text-gray-400">42EU - 8.5US</span>
			<p class="text-lg font-bold">$138.99</p>
			</div>
		</div>
		<div class="flex flex-col rounded-lg bg-white sm:flex-row">
			<img class="m-2 h-24 w-28 rounded-md border object-cover object-center" src="https://images.unsplash.com/photo-1600185365483-26d7a4cc7519?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8OHx8c25lYWtlcnxlbnwwfHwwfHw%3D&auto=format&fit=crop&w=500&q=60" alt="" />
			<div class="flex w-full flex-col px-4 py-4">
			<span class="font-semibold">Nike Air Max Pro 8888 - Super Light</span>
			<span class="float-right text-gray-400">42EU - 8.5US</span>
			<p class="mt-auto text-lg font-bold">$238.99</p>
			</div>
		</div>
		</div>
	</div>
	
  <div class="px-4 pt-8">
		<p class="text-xl font-medium">Order Summary</p>
		<p class="text-gray-400">Check your items. And select a suitable shipping method.</p>
		<div class="mt-8 space-y-3 rounded-lg border bg-white px-2 py-4 sm:px-6">
		<div class="flex flex-col rounded-lg bg-white sm:flex-row">
			<img class="m-2 h-24 w-28 rounded-md border object-cover object-center" src="https://images.unsplash.com/flagged/photo-1556637640-2c80d3201be8?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8M3x8c25lYWtlcnxlbnwwfHwwfHw%3D&auto=format&fit=crop&w=500&q=60" alt="" />
			<div class="flex w-full flex-col px-4 py-4">
			<span class="font-semibold">Nike Air Max Pro 8888 - Super Light</span>
			<span class="float-right text-gray-400">42EU - 8.5US</span>
			<p class="text-lg font-bold">$138.99</p>
			</div>
		</div>
		<div class="flex flex-col rounded-lg bg-white sm:flex-row">
			<img class="m-2 h-24 w-28 rounded-md border object-cover object-center" src="https://images.unsplash.com/photo-1600185365483-26d7a4cc7519?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8OHx8c25lYWtlcnxlbnwwfHwwfHw%3D&auto=format&fit=crop&w=500&q=60" alt="" />
			<div class="flex w-full flex-col px-4 py-4">
			<span class="font-semibold">Nike Air Max Pro 8888 - Super Light</span>
			<span class="float-right text-gray-400">42EU - 8.5US</span>
			<p class="mt-auto text-lg font-bold">$238.99</p>
			</div>
		</div>
		</div>
	</div>

	</div>
	<div class="mt-10 bg-gray-50 px-4 pt-8 lg:mt-0">
	  <p class="mt-8 text-lg font-medium">Shipping Methods</p>
	  <form class="mt-5 grid gap-4">
  <span class="block font-semibold mb-2 text-lg">Payment</span>

  <!-- Payment Options Container -->
  <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
    <!-- Card Payment Option -->
    <label class="peer-checked:border-gray-700 peer-checked:bg-gray-50 flex cursor-pointer select-none rounded-lg border border-gray-300 p-4 items-center justify-center hover:shadow-md transition-shadow duration-150 ease-in-out">
      <input type="radio" name="payment" value="card" class=" peer" id="Card" />
      <div class="flex flex-col items-center">
        <!-- Card Icon (You can use icons from Boxicons or similar libraries) -->
        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-gray-700 mb-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 8H3V6a2 2 0 012-2h14a2 2 0 012 2v2zM3 10h18v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6z" />
        </svg>
        <span class="text-sm font-medium text-gray-700">Card</span>
      </div>
    </label>

    <!-- Wallet Payment Option -->
    <label class="peer-checked:border-gray-700 peer-checked:bg-gray-50 flex cursor-pointer select-none rounded-lg border border-gray-300 p-4 items-center justify-center hover:shadow-md transition-shadow duration-150 ease-in-out">
      <input type="radio" name="payment" value="wallet" class=" peer" />
      <div class="flex flex-col items-center">
        <!-- Wallet Icon -->
        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-gray-700 mb-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 7h14a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2V9a2 2 0 012-2z" />
        </svg>
        <span class="text-sm font-medium text-gray-700">Wallet</span>
      </div>
    </label>

    <!-- Cash Payment Option -->
    <label class="peer-checked:border-gray-700 peer-checked:bg-gray-50 flex cursor-pointer select-none rounded-lg border border-gray-300 p-4 items-center justify-center hover:shadow-md transition-shadow duration-150 ease-in-out">
      <input type="radio" name="payment" value="cash" class=" peer" />
      <div class="flex flex-col items-center">
        <!-- Cash Icon -->
        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-gray-700 mb-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-3.866 0-7 1.79-7 4s3.134 4 7 4 7-1.79 7-4-3.134-4-7-4zM12 8V4m0 4v4" />
        </svg>
        <span class="text-sm font-medium text-gray-700">Cash</span>
      </div>
    </label>
  </div>
</form>


<div class="mt-10 " >
   <p class="text-xl font-medium">Payment Details</p>
    <p class="text-gray-400">Complete your order by providing your payment details.</p>
    <div id="cardPayment">
      <label for="email" class="mt-4 mb-2 block text-sm font-medium">Email</label>
      <div class="relative">
        <input type="text" id="email" name="email" class="w-full rounded-md border border-gray-200 px-4 py-3 pl-11 text-sm shadow-sm outline-none focus:z-10 focus:border-blue-500 focus:ring-blue-500" placeholder="your.email@gmail.com" />
        <div class="pointer-events-none absolute inset-y-0 left-0 inline-flex items-center px-3">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
          </svg>
        </div>
      </div>
      <label for="card-holder" class="mt-4 mb-2 block text-sm font-medium">Card Holder</label>
      <div class="relative">
        <input type="text" id="card-holder" name="card-holder" class="w-full rounded-md border border-gray-200 px-4 py-3 pl-11 text-sm uppercase shadow-sm outline-none focus:z-10 focus:border-blue-500 focus:ring-blue-500" placeholder="Your full name here" />
        <div class="pointer-events-none absolute inset-y-0 left-0 inline-flex items-center px-3">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15 9h3.75M15 12h3.75M15 15h3.75M4.5 19.5h15a2.25 2.25 0 002.25-2.25V6.75A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25v10.5A2.25 2.25 0 004.5 19.5zm6-10.125a1.875 1.875 0 11-3.75 0 1.875 1.875 0 013.75 0zm1.294 6.336a6.721 6.721 0 01-3.17.789 6.721 6.721 0 01-3.168-.789 3.376 3.376 0 016.338 0z" />
          </svg>
        </div>
      </div>
      <label for="card-no" class="mt-4 mb-2 block text-sm font-medium">Card Details</label>
      <div class="flex">
        <div class="relative w-7/12 flex-shrink-0">
          <input type="text" id="card-no" name="card-no" class="w-full rounded-md border border-gray-200 px-2 py-3 pl-11 text-sm shadow-sm outline-none focus:z-10 focus:border-blue-500 focus:ring-blue-500" placeholder="xxxx-xxxx-xxxx-xxxx" />
          <div class="pointer-events-none absolute inset-y-0 left-0 inline-flex items-center px-3">
            <svg class="h-4 w-4 text-gray-400" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
              <path d="M11 5.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-1z" />
              <path d="M2 2a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H2zm13 2v5H1V4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1zm-1 9H2a1 1 0 0 1-1-1v-1h14v1a1 1 0 0 1-1 1z" />
            </svg>
          </div>
        </div>
        <input type="text" name="credit-expiry" class="w-full rounded-md border border-gray-200 px-2 py-3 text-sm shadow-sm outline-none focus:z-10 focus:border-blue-500 focus:ring-blue-500" placeholder="MM/YY" />
        <input type="text" name="credit-cvc" class="w-1/6 flex-shrink-0 rounded-md border border-gray-200 px-2 py-3 text-sm shadow-sm outline-none focus:z-10 focus:border-blue-500 focus:ring-blue-500" placeholder="CVC" />
      </div>
      <label for="billing-address" class="mt-4 mb-2 block text-sm font-medium">Billing Address</label>
      <div class="flex flex-col sm:flex-row">
        <div class="relative flex-shrink-0 sm:w-7/12">
          <input type="text" id="billing-address" name="billing-address" class="w-full rounded-md border border-gray-200 px-4 py-3 pl-11 text-sm shadow-sm outline-none focus:z-10 focus:border-blue-500 focus:ring-blue-500" placeholder="Street Address" />
          <div class="pointer-events-none absolute inset-y-0 left-0 inline-flex items-center px-3">
            <img class="h-4 w-4 object-contain" src="https://flagpack.xyz/_nuxt/4c829b6c0131de7162790d2f897a90fd.svg" alt="" />
          </div>
        </div>
        <select type="text" name="billing-state" class="w-full rounded-md border border-gray-200 px-4 py-3 text-sm shadow-sm outline-none focus:z-10 focus:border-blue-500 focus:ring-blue-500">
          <option value="State">State</option>
        </select>
        <input type="text" name="billing-zip" class="flex-shrink-0 rounded-md border border-gray-200 px-4 py-3 text-sm shadow-sm outline-none sm:w-1/6 focus:z-10 focus:border-blue-500 focus:ring-blue-500" placeholder="ZIP" />
      </div>

      <!-- Total -->
    </div>
	<div class="mt-6 border-t border-b py-2">
	  <div class="flex items-center justify-between">
		<p class="text-sm font-medium text-gray-900">Subtotal</p>
		<p class="font-semibold text-gray-900">$399.00</p>
	  </div>
	  <div class="flex items-center justify-between">
		<p class="text-sm font-medium text-gray-900">Shipping</p>
		<p class="font-semibold text-gray-900">$8.00</p>
	  </div>
	</div>
	<div class="mt-6 flex items-center justify-between">
	  <p class="text-sm font-medium text-gray-900">Total</p>
	  <p class="text-2xl font-semibold text-gray-900">$408.00</p>
	</div>
    <button class="mt-4 mb-8 w-full rounded-md bg-gray-900 px-6 py-3 font-medium text-white">Place Order</button>
   </div>
  </div>
</div>

</div>

    <div class="btn-back-to-top" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="zmdi zmdi-chevron-up"></i>
		</span>
	</div>

    <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
	<script src="vendor/animsition/js/animsition.min.js"></script>
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="vendor/select2/select2.min.js"></script>
	<script>
		$(".js-select2").each(function () {
			$(this).select2({
				minimumResultsForSearch: 20,
				dropdownParent: $(this).next('.dropDownSelect2')
			});
		})
	</script>
	<script src="vendor/MagnificPopup/jquery.magnific-popup.min.js"></script>
	<script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
	<script>
		$('.js-pscroll').each(function () {
			$(this).css('position', 'relative');
			$(this).css('overflow', 'hidden');
			var ps = new PerfectScrollbar(this, {
				wheelSpeed: 1,
				scrollingThreshold: 1000,
				wheelPropagation: false,
			});

			$(window).on('resize', function () {
				ps.update();
			})
		});

		$(document).ready(function() {
			$("#cardPayment").slideUp(10);
		// Listen for changes on payment method radio buttons
			$(".peer").on("change", function() {
				if ($("#Card").is(':checked')) {
				$("#cardPayment").slideDown();
			}else{
				$("#cardPayment").slideDown();
				
				}
	});
});

		
	</script>
	<script src="js/main.js"></script>
</body>