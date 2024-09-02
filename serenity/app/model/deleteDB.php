<?php 
include_once 'database.php'; // include your database connection file

$database=new Database();
$conn=$database->getConn() ;
function handleDeleteProduct($conn, $id) {
    $query = "UPDATE products SET display = 0 WHERE productID = ?";
    $stmt = $conn->prepare($query);
    $stmt->execute([$id]);
    $_SESSION['message'] = "Product marked as deleted."; 
    echo $_SESSION['message'];
    header("Location: ../../home/pages/admin.php?section=inventory"); // Redirect to the inventory page
    exit();// Redirect to refresh the page

}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
if (isset($_POST['delete_item'])) {
    $id = $_POST['id'];
    handleDeleteProduct($conn, $id);}
    

   }