<?php
session_start();
include('config.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Checkout</title>
	<link rel="icon" type="image/png" href="images/icons/favicon.png" />
	<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
	<script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
	<div class="fixed w-full z-50">
		<?php include './Navbar.php' ?>
	</div>
	<div class="grid sm:px-10 lg:grid-cols-2 gap-5 lg:px-20 xl:px-32 py-16">
		<div>
			<?php
			// Fetch and store user addresses in session
			$user_id = $_SESSION['user_id'];
			$query = mysqli_query($conn, "SELECT User_Address FROM user_info WHERE id = $user_id");
			$row = mysqli_fetch_array($query);
			$_SESSION['address'] = $row['User_Address'];
			$user_addresses = json_decode($row['User_Address'], true);
			echo "get value";
			

			?>

			<div class="p-4 pt-8 mt-5 rounded-lg border bg-white">
				<p class="text-xl font-medium">Address</p>
				<div class="mt-8 space-y-4 rounded-lg border bg-white px-4 py-6 sm:px-6">
					<form method="POST" action="#" class="dettol">
						<?php foreach ($user_addresses as $index => $address) { ?>
							<div class="flex flex-col sm:flex-row items-start mb-4">
								<!-- Use radio buttons for selecting the address -->
								<input type="radio" name="index" class="address" id="address_<?php echo $index; ?>" value="<?php echo $index; ?>" class="mr-4" <?php if ($index == 0) echo 'checked'; ?>>
								<label for="address_<?php echo $index; ?>" class="flex w-full flex-col px-4 py-2">
									<span class="font-semibold text-lg"><?php echo $address['fname'] . " " . $address['lname']; ?></span>
									<p class="text-gray-600"><?php echo $address['address'] . ", " . $address['address2']; ?></p>
									<p class="text-gray-600"><?php echo $address['city'] . ", " . $address['state'] . " " . $address['zip_code']; ?></p>
									<p class="text-gray-600"><?php echo $address['country']; ?></p>
								</label>
							</div>
						<?php } ?>
						<!-- Submit button -->
						<!-- <button type="submit" class="mt-4 px-4 py-2 bg-blue-500 text-white rounded">Save Address</button> -->
				</div>
			</div>

			<div class="px-4 pt-8 border rounded-lg shadow-xl mt-5">
				<p class="text-xl font-medium">Order Summary</p>
				<p class="text-gray-400">Check your items. And select a suitable shipping method.</p>
				<div class="mt-8 space-y-3  bg-white px-2 py-4 sm:px-6 max-h-[300px] overflow-y-auto">
					<?php
					$product_id = $_GET['product_id'];
					$_SESSION['product_id'] = $product_id;

					$related_items = mysqli_query($product_info, "SELECT * FROM product_item WHERE product_id = $product_id");

					$item = mysqli_fetch_assoc($related_items);
					echo $item['product_name'];
					?>
					<div class="flex flex-col rounded-lg bg-white sm:flex-row border ">
						<img class="m-2 h-24 w-28 rounded-md border object-cover object-center" src="../Images/Product_images/<?php echo $item['product_image'] ?>" alt="" />
						<div class="flex w-full flex-col px-4 py-4">
							<span class="font-semibold"><?php echo $item['product_name'] ?></span>
							<p class="text-lg font-bold">$<?php echo $item['product_price'] ?></p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class=" bg-gray-50 px-4 pt-8 lg:mt-5 rounded-lg border h-fit ">
			<p class="mt-8 text-lg font-medium">Shipping Methods</p>
			<form class="mt-5 grid gap-4">
				<span class="block font-semibold mb-2 text-lg">Payment</span>

				<!-- Payment Options Container -->
				<div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mt-10">
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


			<div class="mt-10 ">
				<p class="text-xl font-medium">Payment Details</p>
				<p class="text-gray-400">Complete your order by providing your payment details.</p>

				<div class="mt-6 border-t border-b py-2">
					<div class="flex items-center justify-between">
						<p class="text-sm font-medium text-gray-900">Subtotal</p>
						<p class="font-semibold text-gray-900">$<?php echo $item['product_price'] ?></p>
					</div>
					<div class="flex items-center justify-between">
						<p class="text-sm font-medium text-gray-900">Shipping</p>
						<p class="font-semibold text-gray-900">$<?php echo $Total = $item['product_price'] + 40 ?></p>
					</div>
				</div>
				<div class="mt-6 flex items-center justify-between">
					<p class="text-sm font-medium text-gray-900">Total</p>
					<p class="text-2xl font-semibold text-gray-900">$<?php echo $Total ?></p>
				</div>
					<?php
						if ($_SERVER['REQUEST_METHOD'] == 'POST') {
							echo "get value";
							echo $_POST['index'];
							// $_SESSION['selected_address_index'] = $_POST['index'];
							// echo $_SESSION['selected_address_index'];
						}
					?>
				<input type="hidden" name="product_id" value="<?php echo $_SESSION['product_id'] ?>">
				<button type="submit" id="button" class="mt-4 mb-8 w-full rounded-md bg-gray-900 px-6 py-3 font-medium text-white">Place Order</button>
				</form>

			</div>
		</div>
	</div>
	</div>
	<?php
	include('config.php'); // Ensure this contains database connection setup
	require_once '../razorpay/Razorpay.php';

	use Razorpay\Api\Api;

	// Ensure the user is logged in
	if (!isset($_SESSION['user_id'])) {
		die(json_encode(['status' => 'failure', 'error' => 'User not logged in.']));
	}

	$user_id = $_SESSION['user_id'];
	$_SESSION['total'] = $Total;
	// Razorpay API credentials
	$keyId = 'rzp_test_kBREEooxYkKLPo';
	$keySecret = 'P5NsdNUNPas0c0C74oCjkk1Y';

	$api = new Api($keyId, $keySecret);
	// Create a new Razorpay order
	try {
		$order = $api->order->create([
			'amount' => $Total * 100,  // Amount in paise (1 INR = 100 paise)
			'currency' => 'INR',
			'receipt' => 'order_rcptid_' . $user_id,
			'payment_capture' => 1 // Auto-capture
		]);

		$orderId = $order['id'];
		// echo json_encode(['status' => 'success', 'order_id' => $orderId]);

	} catch (Exception $e) {
		die(json_encode(['status' => 'failure', 'error' => $e->getMessage()]));
	}

	?>
	<script src="../JS/Main.js"></script>
	<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
	<script>
			// Use AJAX to get the selected address details from the database and populate the form fields
			$('.address').on('click',function(){
				$.ajax({
				    url: "get-address.php",
				    type: "POST",
					data: {
						index: $(this).val(),
					},
				    dataType: "json",
				    success: function(data) {
				        alert(data);
				    },
				    error: function(err) {
				        console.error('THis is error' + err);
				    }
				});
			})
		document.getElementById('button').onclick = function(e) {
			e.preventDefault();

			var options = {
				"key": "<?php echo $keyId; ?>", // Razorpay Key ID
				"amount": "<?php echo $Total * 100; ?>", // Amount in paise
				"currency": "INR",
				"name": "Your Website Name",
				"description": "Purchase Description",
				"image": "../Assests/image/logo.png", // Company logo
				"order_id": "<?php echo $orderId; ?>", // Razorpay Order ID
				"handler": function(response) {
					// Simulate successful payment in test mode
					console.log("Simulating successful payment in test mode");
					$.ajax({
						url: "verify_payment.php",
						type: "POST",
						data: {
							payment_id: response.razorpay_payment_id,
							order_id: response.razorpay_order_id,
							signature: response.razorpay_signature,
						},
						success: function(data) {
							alert('Payment verified successfully!' + data);
						},
						error: function(err) {
							alert('Payment verification failed!');
						}
					});
				},
				"theme": {
					"color": "#3399cc"
				}
			};

			var rzp = new Razorpay(options);
			rzp.open();
		}
	</script>

</body>

</html>