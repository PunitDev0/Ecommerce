<?php
// include('config.php');
// session_start();

// if (!isset($_SESSION['google_loggedin'])) {
//     header('Location: signup.php');
//     exit;
// }

// try {
//     $full_details = $_SESSION['full_details'];
//     $google_loggedin = $_SESSION['google_loggedin'];
//     $google_email = $_SESSION['google_email'];
//     $google_name = $_SESSION['google_name'];
//     $google_picture = $_SESSION['google_picture'];

//     $sub = $full_details['sub'];
//     $name = $full_details['name'];
//     $given = $full_details['given_name'];
//     $pic = $full_details['picture'];
//     $email = $full_details['email'];
//     $email_v = $full_details['email_verified'];

//     $check_user = $conn->prepare("SELECT * FROM google_user WHERE email = ? OR sub = ?");
//     $check_user->bind_param("ss", $email, $sub);
//     $check_user->execute();
//     $google_user_result = $check_user->get_result();

//     if (!$google_user_result->num_rows) {
//         $g_user = $conn->prepare("INSERT INTO google_user (sub, name, given_name, picture, email, email_verified) VALUES (?,?,?,?,?,?)");
//         $g_user->bind_param("ssssss", $sub, $name, $given, $pic, $email, $email_v);
//         if (!$g_user->execute()) {
//             throw new Exception("Error inserting Google user: " . $g_user->error);
//         }

//         $user = $conn->prepare("INSERT INTO user_info (name, user_img, email) VALUES (?,?,?)");
//         $user->bind_param("sss", $name, $pic, $email);
//         if (!$user->execute()) {
//             throw new Exception("Error inserting user: " . $user->error);
//         }else{
//             $user_id = mysqli_insert_id($user); // Get the inserted user's ID

//                 // Create wishlist table for the user
//                 $wishlist_table = "CREATE TABLE IF NOT EXISTS wishlist_$user_id (
//                     id INT AUTO_INCREMENT PRIMARY KEY,
//                     user_id INT NOT NULL,
//                     product_id INT NOT NULL,
//                     FOREIGN KEY (user_id) REFERENCES user_info(id) ON DELETE CASCADE
//                 )";

//                 if (!mysqli_query($conn, $wishlist_table)) {
//                     echo "Error creating wishlist table: " . mysqli_error($conn);
//                 }

//                 // Create cart table for the user
//                 $cart_table = "CREATE TABLE IF NOT EXISTS cart_$user_id (
//                     id INT AUTO_INCREMENT PRIMARY KEY,
//                     user_id INT NOT NULL,
//                     product_id INT NOT NULL,
//                     quantity INT NOT NULL,
//                     FOREIGN KEY (user_id) REFERENCES user_info(id) ON DELETE CASCADE
//                 )";

//                 if (!mysqli_query($conn, $cart_table)) {
//                     echo "Error creating cart table: " . mysqli_error($conn);
//                 }

//         }

//         $fetch_details = $conn->prepare("SELECT * FROM user_info WHERE email = ?");
//         $fetch_details->bind_param("s", $email);
//         if (!$fetch_details->execute()) {
//             throw new Exception("Error fetching user details: " . $fetch_details->error);
//         }

//         $result = $fetch_details->get_result();
//         if ($fetch = $result->fetch_array()) {
//             $_SESSION['logged_in'] =true;
//             foreach (['id', 'name', 'email', 'Mobile', 'password', 'user_img', 'office', 'username', 'wishlist', 'cart'] as $key) {
//                 $_SESSION[$key] = $fetch[$key];
//             }


//         } else {
//             throw new Exception("User details not found in the database.");
//         }

//     } else{
//         $fetch_details = $conn->prepare("SELECT * FROM user_info WHERE email = ?");
//         $fetch_details->bind_param("s", $email);
//         if (!$fetch_details->execute()) {
//             throw new Exception("Error fetching user details: " . $fetch_details->error);
//         }

//         $result = $fetch_details->get_result();
//         if ($fetch = $result->fetch_array()) {
//             $_SESSION['logged_in'] =true;
//             foreach (['id', 'name', 'email', 'Mobile', 'password', 'user_img', 'office', 'username', 'wishlist', 'cart'] as $key) {
//                 $_SESSION[$key] = $fetch[$key];
//             }
//         }
//         header('Location: home.php');

//     }
// } catch (Exception $e) {
//     echo "Error: " . $e->getMessage();
// } finally {
//     $conn->close();
// }



include('config.php');
session_start();

if (!isset($_SESSION['google_loggedin'])) {
    header('Location: signup.php');
    exit;
}

try {
    $full_details = $_SESSION['full_details'];
    $google_loggedin = $_SESSION['google_loggedin'];
    $google_email = $_SESSION['google_email'];
    $google_name = $_SESSION['google_name'];
    $google_picture = $_SESSION['google_picture'];

    $sub = $full_details['sub'];
    $name = $full_details['name'];
    $given = $full_details['given_name'];
    $pic = $full_details['picture'];
    $email = $full_details['email'];
    $email_v = $full_details['email_verified'];

    $check_user = $conn->prepare("SELECT * FROM google_user WHERE email = ? OR sub = ?");
    $check_user->bind_param("ss", $email, $sub);
    $check_user->execute();
    $google_user_result = $check_user->get_result();

    if (!$google_user_result->num_rows) {
        // Prepare to insert into user_info
        $user = $conn->prepare("INSERT INTO user_info (name, user_img, email) VALUES (?, ?, ?)");
        $user->bind_param("sss", $name, $pic, $email);
        if (!$user->execute()) {
            throw new Exception("Error inserting user: " . $user->error);
        } else {
            $user_id = $conn->insert_id;
    
            // Insert into google_user
            $g_user = $conn->prepare("INSERT INTO google_user (id, sub, name, given_name, picture, email, email_verified) VALUES (?, ?, ?, ?, ?, ?, ?)");
            $g_user->bind_param("issssss", $user_id, $sub, $name, $given, $pic, $email, $email_v);
            if (!$g_user->execute()) {
                throw new Exception("Error inserting Google user: " . $g_user->error);
            }
    
            // Fetch user details
            $fetch_details = $conn->prepare("SELECT * FROM user_info WHERE email = ?");
            $fetch_details->bind_param("s", $email);
            if (!$fetch_details->execute()) {
                throw new Exception("Error fetching user details: " . $fetch_details->error);
            }
    
            $result = $fetch_details->get_result();
            if ($fetch = $result->fetch_array()) {
                $_SESSION['logged_in'] = true;
                foreach (['id', 'name', 'email', 'Mobile', 'password', 'user_img', 'office', 'username', 'wishlist', 'cart'] as $key) {
                    $_SESSION[$key] = $fetch[$key];
                }
            }
    
            // Create wishlist table
            $wishlist_table = "CREATE TABLE IF NOT EXISTS wishlist_$user_id (
                id INT AUTO_INCREMENT PRIMARY KEY,
                user_id INT NOT NULL,
                product_id INT NOT NULL
            )";
            if (!mysqli_query($wishlist, $wishlist_table)) {
                echo "Error creating wishlist table: " . mysqli_error($wishlist);
            }

            $cart_table = "CREATE TABLE IF NOT EXISTS cart_$user_id (
                id INT AUTO_INCREMENT PRIMARY KEY,
                product_id INT NOT NULL,
                quantity INT NOT NULL
            )";
            if (!mysqli_query($cart, $cart_table)) {
                echo "Error creating cart table: " . mysqli_error($cart);
            }
    
            header('Location: Home.php');
        }
    } else {
         // Fetch user details
         $fetch_details = $conn->prepare("SELECT * FROM user_info WHERE email = ?");
         $fetch_details->bind_param("s", $email);
         if (!$fetch_details->execute()) {
             throw new Exception("Error fetching user details: " . $fetch_details->error);
         }
 
         $result = $fetch_details->get_result();
         if ($fetch = $result->fetch_array()) {
             $_SESSION['logged_in'] = true;
             foreach (['id', 'name', 'email', 'Mobile', 'password', 'user_img', 'office', 'username', 'wishlist', 'cart'] as $key) {
                 $_SESSION[$key] = $fetch[$key];
             }
         }
        header('Location: Home.php');

    }
    
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
} finally {
    $conn->close();
}
?>