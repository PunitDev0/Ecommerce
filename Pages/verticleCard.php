<?php
$conn = mysqli_connect('localhost', 'root', '', 'product_info');

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sort_by = isset($_GET['sort']) ? $_GET['sort'] : 'relevance';

switch ($sort_by) {
    case 'price-asc':
        $order_by = 'product_price ASC';
        break;
    case 'price-desc':
        $order_by = 'product_price DESC';
        break;
    default:
        $order_by = 'id ASC';
        break;
}

$category_id = isset($_GET['page']) ? intval($_GET['page']) : 0;
echo $category_id;

$min_price = isset($_GET['min_price']) ? (int)$_GET['min_price'] : 0;
$max_price = isset($_GET['max_price']) ? (int)$_GET['max_price'] : 1000;

$query = "SELECT * FROM product_item WHERE product_catg=$category_id AND product_price BETWEEN $min_price AND $max_price ";
$item = mysqli_query($conn, $query);
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Responsive Products Grid</title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <style>
    .heart-icon {
        position: absolute;
        top: 0.5rem;
        right: 0.5rem;
        color: gray;
        transition: color 0.3s;
    }
    .heart-icon:hover {
        color: red;
    }
  </style>
</head>
<body class="bg-gray-100">
  <div class="container mx-auto p-4">
    <div class="grid grid-cols-1 gap-4">
      <?php
        while ($items = mysqli_fetch_array($item)) {
      ?>
        <div class="bg-white rounded-lg overflow-hidden flex flex-col items-center sm:flex-row sm:items-start relative">
          <div class="relative w-full sm:w-1/3 bg-gray-100 p-2 border border-gray-200 flex items-center justify-center">
            <img class="object-contain h-64 w-full" src="../Images/Product_images/<?php echo $items['product_image']; ?>" alt="<?php echo $items['product_name']; ?>">
            <a href="" class="heart-icon" data-product-id="<?php echo $items['product_id']; ?>">
              <i class="far fa-heart text-xl"></i>
            </a>
          </div>
          <div class="p-4 w-full sm:w-2/3">
            <p class="font-bold text-lg"><?php echo $items['product_name']; ?></p>
            <p class="text-gray-600 mt-2"><?php echo $items['product_details']; ?></p>
            <p class="text-red-500 text-xl mt-2">$<?php echo $items['product_price']; ?></p>
            <a href="details.php?id=<?php echo $items['product_id']; ?>"><button class="add-to-cart bg-black text-white py-2 px-4 mt-4 rounded transition duration-300 hover:bg-gray-700">Add to Cart</button></a>
          </div>
        </div>
      <?php } ?>
    </div>
  </div>
  <script>
    // document.addEventListener('DOMContentLoaded', function() {
    //     const heartIcons = document.querySelectorAll('.heart-icon');

    //     heartIcons.forEach(icon => {
    //         const productId = icon.getAttribute('data-product-id');
    //         const liked = localStorage.getItem('liked_' + productId);

    //         if (liked === 'true') {
    //             const heartIcon = icon.querySelector('i');
    //             heartIcon.classList.remove('far');
    //             heartIcon.classList.add('fas', 'text-red-500');
    //         }

    //         icon.addEventListener('click', function(event) {
    //             event.preventDefault();
    //             const heartIcon = this.querySelector('i');
    //             const productId = this.getAttribute('data-product-id');

    //             const action = heartIcon.classList.contains('far') ? 'add' : 'remove';

    //             fetch('wishlist_handler.php', {
    //                 method: 'POST',
    //                 headers: {
    //                     'Content-Type': 'application/json',
    //                 },
    //                 body: JSON.stringify({ action: action, product_id: productId }),
    //             })
    //             .then(response => response.json())
    //             .then(data => {
    //                 if (data.success) {
    //                     if (heartIcon.classList.contains('far')) {
    //                         heartIcon.classList.remove('far');
    //                         heartIcon.classList.add('fas', 'text-red-500');
    //                         localStorage.setItem('liked_' + productId, 'true');
    //                     } else {
    //                         heartIcon.classList.remove('fas', 'text-red-500');
    //                         heartIcon.classList.add('far');
    //                         localStorage.setItem('liked_' + productId, 'false');
    //                     }
    //                 } else {
    //                     alert('Error updating wishlist.');
    //                 }
    //             })
    //             .catch(error => console.error('Error:', error));
    //         });
    //     });
    // });
  </script>
</body>
</html>