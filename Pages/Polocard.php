<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Responsive Products Grid</title>
  <link rel="stylesheet" href="../CSS/Card.css">
  <style>
    
  </style>
</head>
<body>
  <div class="container ">
    <?php
        $conn = mysqli_connect('localhost', 'root', '', 'userinfo');
        $item = mysqli_query($conn, "SELECT * FROM polo_item");
        while ($items = mysqli_fetch_array($item)) {
      ?>
        <div href="details.php?id=<?php echo $items['id']; ?>" class="product-card">
          <div class="product-image relative overflow-hidden">
            <img src="../Assests/image/WatchImage1.png">
            <div class=" quick_view h-10 w-fit rounded-lg backdrop-blur-md shadow-lg flex items-center justify-center py-2 px-4  absolute bottom-0 translate-y-10">
              <p>Quick View</p>
            </div>
          </div>
          <div class="product-info">
            <p class="product-name"><?php echo $items['product_name']; ?></p>
            <p class="product-price">$<?php echo $items['product_price']; ?></p>
            <form action="details.php" method="GET">
                  <input type="hidden" name="id" value="<?php echo $items['id'];?>">
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
</body>
</html>
