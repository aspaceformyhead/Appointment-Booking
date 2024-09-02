<?php
ob_start();
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
                $_SESSION['error']  = "Incorrect username or password.";
            }
        } else {
            $_SESSION['error'] = "User not found.";
        }
        echo "Redirecting to form.php...";
        header("Location: ../../home/pages/form.php");
        exit();
    }
    return null;
}

if (isset($_POST['login'])) {
    login($conn);
}


function getBestSellers($conn) {
    $query = "SELECT * FROM products ORDER BY sold DESC LIMIT 8";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function displayProduct($product, $index) {
    // Generate star rating based on the product's rating
    $rating = $product['rating'];
    $fullStars = floor($rating);
    $halfStar = ($rating - $fullStars >= 0.5) ? 1 : 0;
    $emptyStars = 5 - ($fullStars + $halfStar);

    $stars = str_repeat('⭐', $fullStars);
    if ($halfStar) {
        $stars .= '⭐'; // Add a half star
    }
    $stars .= str_repeat('☆', $emptyStars);
    $imagePath = '../../' . htmlspecialchars($product['prod_image']); // Adjust image path

    return "
        <div class='products'>
            <div id='prod" . ($index + 1) . "'>
                <img src='" . $imagePath . "' alt='" . htmlspecialchars($product['prod_Name']) . "' class='prod_image'>
            </div>
            <p>" . htmlspecialchars($product['prod_Name']) . "<br>
               Price: Rs." . htmlspecialchars($product['price']) . "<br>
            </p>
            <span class='rating'>" . $stars . "</span>
            <button class='secondary'>Add to Cart</button>
        </div>";
}

function bestSeller($conn) {
    $products = getBestSellers($conn);
    $output = '';
    $rowCount = 0;
    foreach ($products as $index => $product) {
        if ($index % 4 == 0) {
            if ($rowCount > 0) {
                $output .= '</div>'; // Close the previous row
            }
            $output .= '<div class="row1">'; // Start a new row
            $rowCount++;
        }
        $output .= displayProduct($product, $index);
    }
    $output .= '</div>'; // Close the last row

    return $output;
}



function fetchInventory($conn) {
    $query = "SELECT * FROM products WHERE display=1";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}


