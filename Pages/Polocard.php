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
  <div class="containers ">
    <?php
        include './config.php';
        $item = mysqli_query($product_info, "SELECT * FROM product_item WHERE product_catg = 1");
        while ($items = mysqli_fetch_array($item)) {
      ?>
        <div href="details.php?id=<?php echo $items['product_id']; ?>" class="product-card">
          <div class="product-image relative overflow-hidden">
            <img src="../images/product_images/<?php echo $items['product_image']?>">
            <div class=" quick_view h-10 w-fit rounded-lg bg-white shadow-xl flex items-center justify-center py-2 px-4  absolute bottom-0 translate-y-10">
              <p>Quick View</p>
            </div>
          </div>
          <div class="product-info">
            <p class="product-name truncate"><?php echo $items['product_name']; ?></p>
            <p class="product-price">$<?php echo $items['product_price']; ?></p>
            <form action="details.php" method="GET">
                  <input type="hidden" name="id" value="<?php echo $items['product_id'];?>">
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
