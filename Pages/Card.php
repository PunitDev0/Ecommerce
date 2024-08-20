<?php
include './config.php';

if (!$product_info) {
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
// echo $category_id;

$min_price = isset($_GET['min_price']) ? (int)$_GET['min_price'] : 0;
$max_price = isset($_GET['max_price']) ? (int)$_GET['max_price'] : 1000;

$query = "SELECT * FROM product_item WHERE product_catg=$category_id AND product_price BETWEEN $min_price AND $max_price ";
$item = mysqli_query($product_info, $query);
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
    <div class="grid grid-cols-2 sm:grid-cols-2 lg:grid-cols-4 gap-4">
      <?php
        if(isset($_GET['product_name'])){
          $product_id = $_GET['product_name'];
          $query = "Select * from product where product_name = $product_id";
          $qury_m=mysqli_query($product_info, $query);
         if($qury_m){
          $_SESSION['product_m']=$qury_m['product_name'];
         }else{
          echo "No product found";
         }
        }
      ?>
      <?php
        while ($items = mysqli_fetch_array($item)) {
      ?>
        <div class="bg-white rounded-lg overflow-hidden flex flex-col items-center relative ">
          <div class="relative w-full bg-gray-100 p-2 border border-gray-200 flex items-center justify-center overflow-hidden">
            <img class="object-contain h-64 w-full" src="../Images/Product_images/<?php echo $items['product_image']; ?>" alt="<?php echo $items['product_name']; ?>">
            <?php
            $wishlist = mysqli_connect('localhost', 'root', '', 'user_wishlist');

              // Assume $product_info is your MySQL connection
              $user_id = $_SESSION['user_id'];
              $product_id = $items['product_id'];

              // Check if the product is already in the wishlist
              $query = "SELECT * FROM wishlist_$user_id WHERE product_id = $product_id";
              $result = mysqli_query($wishlist, $query);
              $isInWishlist = mysqli_num_rows($result) > 0;
              ?>

            <form action="./Wishlist.php" method="POST">
                <input type="hidden" name="product_id" value="<?php echo $product_id; ?>">
                <input type="hidden" name="action" value="<?php echo $isInWishlist ? 'remove' : 'add'; ?>">
                <button type="submit" class="heart-icon">
                    <i class="<?php echo $isInWishlist ? 'fas fa-heart text-red-500' : 'far fa-heart text-xl'; ?>"></i>
                </button>
            </form>
            <div class = "h-8 w-full bg-red-900 absolute bottom-0 translate-y-10 "></div>
          </div>
          <div class="p-4 text-center">
            <p class="font-bold text-lg"><?php echo $items['product_name']; ?></p>
            <p class="text-red-500 text-xl mt-2">$<?php echo $items['product_price']; ?></p>
            <form action="details.php" method="GET">
                  <input type="hidden" name="id" value="<?php echo $items['product_id']; ?>">
                  <button type="submit" class="add-to-cart bg-black text-white py-2 px-4 mt-4 rounded transition duration-300 hover:bg-gray-700">
                  <?php echo $items['product_id']; ?>
                      Add to Cart
                  </button>
              </form>

          </div>
        </div>
        
      <?php
          } 
      ?>
    </div>
  </div>

</body>
</html>



