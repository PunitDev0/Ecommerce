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
        $order_by = 'product_id ASC';
        break;
}

  $category_id = $_SESSION['id'];
  
  $min_price = isset($_GET['min_price']) ? (int)$_GET['min_price'] : 0;
  $max_price = isset($_GET['max_price']) ? (int)$_GET['max_price'] : 1000;
  
  $query = "SELECT * FROM product_item WHERE product_catg=$category_id AND product_price BETWEEN $min_price AND $max_price order by $order_by";
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
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
  <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
  <style>
    /* .heart-icon {
        position: absolute;
        top: 0.5rem;
        right: 0.5rem;
        color: gray;
        transition: color 0.3s;
    }
    .heart-icon:hover {
        color: red;
    } */
    .buttons{
      visibility: hidden;
      transition : all ease-in-out;
    }

    .mySwiper:hover .buttons{
      visibility: visible;
    }
    
    /* Adjusting size, border, or any other styles */
    
  </style>
</head>
<body class="bg-gray-100">
  <div class="container mx-auto p-4">
    <div class="grid grid-cols-2 sm:grid-cols-2 lg:grid-cols-4 gap-4">
      <?php
        // if(isset($_GET['product_name'])){
        //   $product_id = $_GET['product_name'];
        //   $query = "Select * from product where product_name = $product_id";
        //   $qury_m=mysqli_query($product_info, $query);
        //  if($qury_m){
        //   $_SESSION['product_m']=$qury_m['product_name'];
        //  }else{
        //   echo "No product found";
        //  }
        // }
      ?>
      <?php
        while ($items = mysqli_fetch_array($item)) {
      ?>
        <div class="bg-white rounded-lg h-[480px] overflow-hidden flex flex-col relative ">
            <?php
                if(isset($_SESSION['user_logged_in'])){
                  $user_id = $_SESSION['user_id'];
                }
                $product_id = $items['product_id'];
              ?>
                 <div class="swiper mySwiper w-full">
                    <div class="item-card p-4 z-50 rounded-lg absolute right-0">
                      <form id="hidden-form" method="POST" style="display: none;">
                          <input type="hidden" name="action" id="form-action">
                          <input type="hidden" name="product_id" id="form-product_id">
                          <input type="hidden" name="user_id" id="form-user_id" value="<?php echo $user_id; ?>">
                      </form>
                      <i class="fas fa-heart heart-icon text-gray-400 cursor-pointer text-xl transition-colors duration-300" data-product-id="<?php echo $product_id; ?>"></i>
                      <!-- Other item details -->
                  </div>
                <div class="swiper-wrapper">
                  <div class="swiper-slide">
                    <!-- <img src="./images/Product_images/8110912f-4db1-4296-ad00-0cb9573851ba.jpg" alt=""> -->
                        <div class=" h-full w-full  p-2 border  flex items-center justify-center overflow-hidden">
                          <img class="object-contain h-64 " src="../Images/Product_images/<?php echo $items['product_image']; ?>" alt="<?php echo $items['product_name']; ?>">
                          
                     </div>
                  </div>
                  <?php
                      $related_items = mysqli_query($product_info, "SELECT * FROM product_images where pr_id = $product_id");

                      $image_filenames = [];

                      while ($row = mysqli_fetch_assoc($related_items)) {
                        // Decode JSON data
                        $images_json = $row['pr_img']; // Assuming 'pr_img' contains JSON data
                        $images_array = json_decode($images_json, true); // Decode JSON to PHP array
                    
                        if (is_array($images_array)) {
                            // Add the image filenames to the array
                            $image_filenames = array_merge($image_filenames, $images_array);
                        }
                    }
                    foreach ($image_filenames as $image_filename) {
                  ?>
                  <div class="swiper-slide relative !important">
                      <div class="h-full w-full  p-2 border border-gray-200 flex items-center justify-center overflow-hidden">
                          <img class="object-contain h-64" src="../images/Product_images/RF_images/<?php echo htmlspecialchars($image_filename); ?>" alt="Product Image">
                          <!--  -->
                      </div>
                  </div>
                  <?php
                      }
                  ?>
                </div>
                <div class=" z-50 absolute -translate-y-10 m-auto">
                  <button class=" buttons absolute translate-x-52 text-2xl" id="custom-prev-button"><i class='bx bxs-chevron-right'></i></button>
                  <button class=" buttons absolute custom-next-button text-2xl"><i class='bx bxs-chevron-left translate-x-5'></i></button>
                </div>
              </div>

              <div class="p-4 text-center">
                  <p class="truncate text-base md:text-base lg:text-base">
                      <?php echo $items['product_name']; ?>
                  </p>
                  <p class="text-red-500 text-lg md:text-xl lg:text-2xl mt-2">
                      $<?php echo $items['product_price']; ?>
                  </p>
                  <form action="details.php" method="GET">
                      <input type="hidden" name="id" value="<?php echo $items['product_id']; ?>">
                      <button type="submit" class="add-to-cart bg-black text-white py-2 px-4 mt-4 rounded transition duration-300 hover:bg-gray-700">
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
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const heartIcons = document.querySelectorAll('.heart-icon');
    const userIdInput = document.getElementById('form-user_id');

    heartIcons.forEach(icon => {
        const productId = icon.getAttribute('data-product-id');

        // Check localStorage to set the initial state
        if (localStorage.getItem(`wishlist-${productId}`) === 'liked') {
            icon.classList.add('text-red-500');
        } else {
            icon.classList.remove('text-red-500');
        }

        icon.addEventListener('click', function() {
            const action = this.classList.contains('text-red-500') ? 'remove' : 'add';

            // Update localStorage
            if (action === 'remove') {
                this.classList.remove('text-red-500');
                localStorage.removeItem(`wishlist-${productId}`);
            } else {
                this.classList.add('text-red-500');
                localStorage.setItem(`wishlist-${productId}`, 'liked');
            }

            // Send AJAX request
            $.ajax({
                url: 'wishlist_handler.php',
                method: 'POST',
                data: {
                    action: action,
                    product_id: productId,
                    user_id: userIdInput.value // Ensure this value is set
                },
                success: function(result) {
                    console.log('Success:', result);
                    updateWishlistSidebar();
                },
                error: function(xhr, status, error) {
                    console.error('AJAX Error:', error);
                }
            });
        });
    });
});




    const swiper = new Swiper(".mySwiper", {
      navigation: false,
    });
  

  </script>
</html>



