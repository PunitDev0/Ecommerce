<div class="overflow-x-hidden h-[100vh] fixed backdrop-blur-2xl w-[300px] translate-x-[300px] bg-gray-100 z-50 top-0 right-0 transition-transform duration-300 ease-in-out"     id="wishlist">
                    <div class="p-4 flex justify-between items-center">
                        <h1 class="text-black text-xl font-bold">Wishlist</h1>
                        <i class='bx bx-x text-2xl text-black cursor-pointer' id="bx-wish"></i>
                    </div>
                    <?php
                        include './config.php';
                        if(isset($_SESSION['user_id'])){
                            $user_id = $_SESSION['user_id'];
                        }else{
                            $user_id = $_GET['userID'];
                        }
                        // $user_id = $_SESSION['user_id'] ?  $_SESSION['user_id'] : $_GET['user_id'];

                            $query = "SELECT * FROM user_wishlist.wishlist_$user_id AS w 
                                    LEFT JOIN product_info.product_item AS pr 
                                    ON w.product_id = pr.product_id";

                            $result = mysqli_query($wishlist, $query);

                            $wishlistItems = [];
                            $totalPrice = 0;
                            $numrows = $result->num_rows;
                            
                                    if ($result && $result->num_rows > 0) {
                                        while ($row = $result->fetch_assoc()) {
                                            $wishlistItems[] = $row;
                                            $totalPrice += $row['product_price'];

                                        }
                                    }

                                    foreach ($wishlistItems as $item) {
                                        ?>
                                        <!-- Cart Items -->
                                        <div class="p-4">
                                            <div class="flex gap-4 mb-4">
                                                <img src="../images/Product_images/<?php echo htmlspecialchars($item['product_image']); ?>" alt="Product Image" class="w-12 h-12 object-cover rounded-full" />
                                                <div class="flex-1">
                                                    <h2 class="truncate text-black text-sm"><?php echo htmlspecialchars($item['product_name']); ?></h2>
                                                    <p class="text-black text-xs">$99.99</p>
                                                </div>
                                                <input type="number" value="1" min="1" max="10" class="w-12 text-sm text-black rounded-md" />
                                            </div>
                                        </div>
                                        <?php
                                    }
                        ?>


                    <!-- Cart Summary -->
                    <div class="bg-white rounded-lg shadow-lg p-4 mx-4 mb-4">
                        <div class="flex justify-between mb-4">
                        <span class="text-gray-700"><php echo $numrows> items</span>
                        <span class="text-gray-700">$<?php echo $totalPrice; ?></span>
                        </div>
                        <div class="flex justify-between mb-4">
                        <span class="text-gray-700">Shipping</span>
                        <span class="text-gray-700">$7.00</span>
                        </div>
                        <div class="flex justify-between mb-4 font-bold">
                        <span class="text-gray-900">Total (tax excl.)</span>
                        <span class="text-gray-900">$1,091.00</span>
                        </div>
                        <div class="flex justify-between mb-6">
                        <span class="text-gray-700">Taxes</span>
                        <span class="text-gray-700">$0.00</span>
                        </div>
                        <form action="./Wishlist.php"method="GET">
                            <input type="hidden" name="userID" value="<?php echo $_SESSION['user_id']?>">
                            <button class="w-full bg-black text-white py-2 rounded-lg hover:bg-gray-800">
                            Go to Wishlist
                            </button>
                        
                        </form>
                    </div>
                
        </div>
