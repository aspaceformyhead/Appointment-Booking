<?php
session_start(); // Ensure the session is started
include_once 'database.php'; // Include your database connection file

$database = new Database();
$conn = $database->getConn();

function handleUpdateProduct($conn, $data) {
    $query = "UPDATE products SET prod_Name = ?, category = ?, stock = ?, price = ?, prod_image = ? WHERE productID = ?";
    $stmt = $conn->prepare($query);
    $stmt->execute([
        $data['name'],
        $data['category'],
        $data['quantity'],
        $data['price'],
        $data['img_url'],
        $data['id']
    ]);

    $_SESSION['message'] = "Product updated successfully.";
    header("Location: ../../home/pages/admin.php?section=inventory");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['update_item'])) {
        handleUpdateProduct($conn, $_POST);
    }
}
?>
