<?php
session_start();
include 'database.php'; // include your database connection file

$database=new Database();
$conn=$database->getConn() ;

function login($conn) {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Get the email and password from the form
        $email = $_POST['logEmail'];
        $password = $_POST['password'];

        // Query the database for the user
        $query = "SELECT * FROM customers WHERE c_email = ?";
        $stmt = $conn->prepare($query);
        $stmt->execute([$email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            // Verify the password
            if (password_verify($password, $user['password']))  { 
                // Set session variables
                $_SESSION['user_id'] = $user['c_id'];
                $_SESSION['role'] = $user['role'];

                // Redirect based on role
                if ($user['role'] == 'admin') {
                    header("Location: ../../home/pages/admin.php");
                } else {
                    header("Location: ../../home/homepg.php");
                }
                exit();
            } else {
                $_SESSION['error'] = "Incorrect username or password.";
            }
        } else {
            $_SESSION['error'] = "User not found.";
        }

        header("Location: ../../home/pages/form.php");
        exit();
    }
    return null;
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login'])) {
    $message = login($conn);
    if ($message) {
        echo $message;
    }
}

function bestSeller($conn) {
    $query = "SELECT * FROM products ORDER BY sold DESC LIMIT 8";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo '<div class="sellers">';
    $rowCount = 0;
    foreach ($products as $index => $product) {
        if ($index % 4 == 0) {
            if ($rowCount > 0) {
                echo '</div>'; // Close the previous row
            }
            echo '<div class="row1">'; // Start a new row
            $rowCount++;
        }

        // Generate star rating based on the product's rating
        $rating = $product['rating']; // Assuming the 'rating' field exists in the database
        $fullStars = floor($rating); // Number of full stars
        $halfStar = ($rating - $fullStars >= 0.5) ? 1 : 0; // Half star if the decimal part is >= 0.5
        $emptyStars = 5 - ($fullStars + $halfStar); // Remaining empty stars

        $stars = str_repeat('⭐', $fullStars); // Full stars
        if ($halfStar) {
            $stars .= '⭐'; // Add a half star (using a full star for simplicity, can be customized)
        }
        $stars .= str_repeat('☆', $emptyStars); // Empty stars

        // Display each product
        echo '<div class="products">';
        echo '<div id="prod' . ($index + 1) . '">';
        echo '<img src="' . $product['prod_image'] . '" alt="' . $product['prod_Name'] . '">';
        echo '</div>';
        echo '<p>' . $product['prod_Name'] . '<br>';
        echo 'Price: Rs.' . $product['price'] . '<br>';
        echo '</p>';
        echo '<span class="rating">' . $stars . '</span>'; // Display the star rating
        echo '<button class="secondary"> Add to Cart</button>';
        echo '</div>';
    }
    echo '</div>'; // Close the last row
    echo '</div>'; // Close the seller's div
}


